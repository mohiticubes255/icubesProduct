<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAuthModel extends CI_Model {
    
    public function getUserInfo(string $userEmail, string $userPassword): array {
        
        $results = $this->getUserdetails($userEmail);
        
        if(empty($results)) {
            return array(
                'statusCode' => 404,
                'result' => array(
                    'status' => 'fail', 
                    'msg' => 'User doest not exists!'
                    )
            );
        }
        
        if(isset($results[0]->userPassword)) {
            
            if($results[0]->userStatus != 'active') {
                return array(
                    'statusCode' => 403,
                    'result' => array(
                        'status' => 'fail', 
                        'msg' => 'You have been ' . $results[0]->userStatus . '. Please contact administrator!'
                    )
                );  
            }
            
            if($results[0]->userPassword == md5($userPassword)) { 
                
                if($results[0]->userLoginAttempts > 0) {
                    $this->updateUserLoginInfo($results[0]->userId, array('userStatus'=>'active','userLoginAttempts' => 0));
                }
                
                $accessToken =  md5(md5(time().$results[0]->userId.$results[0]->userLoginIp).mt_rand(10, 1000)); 
                $startDate = date('Y-m-d H:i:s');                
                $expiryDate = date('Y-m-d H:i:s' ,strtotime('+1 day', strtotime($startDate)));
                
                $this->genrateAccessToken($results[0]->userId, $accessToken, $startDate, $expiryDate);
                
                $this->common->renderResponse(array('status' => 'success', 'msg' => 'Please verify using auth','data'=>array('accessToken' => $accessToken)), 200);
                
                //No use beacuse of auth
//                $results[0]->userPassword = '';
//                $results[0]->useLoginIp = $this->input->ip_address();
//                $results[0]->userAgent = $this->agent->agent;
//                $results[0]->userLastLoginTime = date('Y-m-d H:i:s');
//                $userRole = explode(',',$results[0]->userRole); 
//                $results[0]->userRole = '';
//                $returnArray['status'] = 'success';
//                $returnArray['msg'] = 'You have logged in successfully.';
//                $returnArray['userRoles']['roles'] = $userRole;
//                $returnArray['userRoles']['isMultiple'] = false;
//                
//                if(count($userRole)>1) {
//                    $returnArray['userRoles']['isMultiple'] = true;
//                    $returnArray['userRoles']['msg'] = 'Please select a role to continue!';
//                }
//                
//                $startDate = date('Y-m-d H:i:s');                
//                $expiryDate = date('Y-m-d H:i:s' ,strtotime('+1 day', strtotime($startDate)));
//                $accessToken =  md5(md5(time().$results[0]->userId.$results[0]->useLoginIp).mt_rand(10, 1000));                
//                $returnArray['accessTokenInfo'] =  array(
//                    'accessToken' => $accessToken
//                );                        
//                $results[0]->isUserLoggedIn = "1";
//                
//                $userCompany = $this->getUserCompany($results[0]->userCompanyId);
//                
//                $returnArray['userCompanyInfo'] = $userCompany[0];
//                
//                $userBillingInfo = $this->getUserBillingInfo($results[0]->userId);
//                
//                $returnArray['userBillingInfo'] = isset($userBillingInfo[0])?$userBillingInfo[0]:$userBillingInfo;
//                
//                $returnArray['userMappingIds'] = $this->getUserMappingIds($results[0]->userId);
//                
//                $returnArray['data'] = $results[0];
//                
//                $this->genrateAccessToken($results[0]->userId, $accessToken, $startDate, $expiryDate);
//                
//                $updateArray = array('userLoginIp' => $results[0]->useLoginIp,'userAgent' => $results[0]->userAgent,'userLastLoginTime' => $results[0]->userLastLoginTime,'isUserLoggedIn' => 1);
//                
//                $this->updateUserLoginInfo($results[0]->userId, $updateArray);
//                
//                $userPerms = $this->getUserPermissions($results[0]->userId);
//                
//                $returnArray['userRoles']['permissions'] = $userPerms;
//                
//                return array(
//                    'statusCode' => 200,
//                    'result' => $returnArray
//                );
                // \\auth 
            }
            
            $attempts = $results[0]->userLoginAttempts + 1;
            $status = ($attempts == 5)?'blocked':'active';
            $leftAttempts = 5 - $attempts;
            
            $this->updateUserLoginInfo($results[0]->userId,array('userStatus'=>$status,'userLoginAttempts' => $attempts));
            
            if($status == 'blocked') {
                return array(
                    'statusCode' => 403,
                    'result' => array(
                        'status' => 'fail', 
                        'msg' => 'You have been blocked for too many failed attempts!'
                    )
                );
            }
            
            return array(
                'statusCode' => 401,
                'result' => array(
                    'status' => 'fail', 
                    'msg' => 'Invalid credentials! You have '. $leftAttempts.' attempts before your account is blocked'
                )
            );
        } 
        
        return array(
            'statusCode' => 500,
            'result' => array(
                'status' => 'fail', 
                'msg' => 'Something went wrong! Please try after sometime!'
            )
        );
    }
    
    public function userLoginData(int $userId, string $accessToken): array {
        $results = $this->getUserdetails(false , false, false, $userId);
        
        if(empty($results)) {
            $this->common->renderResponse(
                array(
                    'status' => 'fail', 
                    'msg' => 'Something went wrong. Please try aftersometime.'
                ), 403
            );
        }
        
        $results[0]->userPassword = '';
        $results[0]->useLoginIp = $this->input->ip_address();
        $results[0]->userAgent = $this->agent->agent;
        $results[0]->userLastLoginTime = date('Y-m-d H:i:s');
        $userRole = explode(',',$results[0]->userRole); 
        $results[0]->userRole = '';
        $returnArray['status'] = 'success';
        $returnArray['msg'] = 'You have logged in successfully.';
        $returnArray['userRoles']['roles'] = $userRole;
        $returnArray['userRoles']['isMultiple'] = false;

        if(count($userRole)>1) {
            $returnArray['userRoles']['isMultiple'] = true;
            $returnArray['userRoles']['msg'] = 'Please select a role to continue!';
        }

        $startDate = date('Y-m-d H:i:s');                
        $expiryDate = date('Y-m-d H:i:s' ,strtotime('+1 day', strtotime($startDate)));
//        $accessToken =  md5(md5(time().$results[0]->userId.$results[0]->useLoginIp).mt_rand(10, 1000));                
        $returnArray['accessTokenInfo'] =  array(
            'accessToken' => $accessToken
        );                        
        $results[0]->isUserLoggedIn = "1";

        $userCompany = $this->getUserCompany($results[0]->userCompanyId);

        $returnArray['userCompanyInfo'] = $userCompany[0];

        $userBillingInfo = $this->getUserBillingInfo($results[0]->userId);

        $returnArray['userBillingInfo'] = isset($userBillingInfo[0])?$userBillingInfo[0]:$userBillingInfo;

        $returnArray['userMappingIds'] = $this->getUserMappingIds($results[0]->userId);

        $returnArray['data'] = $results[0];

//        $this->genrateAccessToken($results[0]->userId, $accessToken, $startDate, $expiryDate);

        $updateArray = array('userLoginIp' => $results[0]->useLoginIp,'userAgent' => $results[0]->userAgent,'userLastLoginTime' => $results[0]->userLastLoginTime,'isUserLoggedIn' => 1);

        $this->updateUserLoginInfo($results[0]->userId, $updateArray);

        $userPerms = $this->getUserPermissions($results[0]->userId);

        $returnArray['userRoles']['permissions'] = $userPerms;

        return array(
            'statusCode' => 200,
            'result' => $returnArray
        );
    }


    public function getUsersList(array $data):array {
        $orderByKey = array_keys($data['order_by'])[0];
        $orderByVal = array_values($data['order_by'])[0];
//        $totalRows = $this->getToatlUserCount($data, $orderByKey, $orderByVal);
        
        $key = md5("{$data['table']}{$orderByKey}{$orderByVal}{$data['length']}{$data['start']}getUsersList");
        $datas = $this->common->getCacheData($key); // Get cached data if exists
            
//        if($totalRows  >= 1) {
            
            if(!$datas) {
                error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
                $this->db->select($data['select']);
                $this->db->from($data['table']);
                $this->db->limit($data['length'],$data['start']);
                $this->db->order_by($orderByKey, $orderByVal);
                $datas = $this->db->get()->result();
                
                $this->common->setCacheData($key, $datas, DEFAULT_CACHE_TIME); //Set cache data                
            }
            
//            return array('count' => $totalRows, 'result' => $datas);
            return array('count' => count($datas), 'result' => $datas);
            
//        } else {
//            return array('count' => $totalRows, 'result' => array());
//        }        
    }
    
    private function getToatlUserCount(array $data, $orderByKey, $orderByVal):int {
        $key = md5("{$data['table']}{$orderByKey}{$orderByVal}getToatlUserCount");
        $datas = $this->common->getCacheData($key); // Get cached data if exists
        
        if(!isset($datas['row'])) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select($data['select']);
            $this->db->from($data['table']);
            $this->db->order_by($orderByKey, $orderByVal);
            $datas['row'] = $this->db->get()->num_rows();
            
            $this->common->setCacheData($key, $datas, DEFAULT_CACHE_TIME); //Set cache data 
        }
        
        return $datas['row'];
    }


    public function getUserCompany(int $companyId, $searchString = null): array {
        $key = md5("companyInfo{$companyId}{$searchString}getUserCompany");

        $data = $this->common->getCacheData($key); // Get cached data if exists
        
        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('companyId as id,companyName,companyGstn,companyCin,companyPan,companyMobile,companyCountryCode,companyAddress,companyStatus,companyWebSite');
            $this->db->from('companyInfo');
            
            if(!$searchString) {
                $this->db->where('companyId', $companyId);
            } else {
                $this->db->like('companyName', $searchString);
            }

            $data = $this->db->get()->result();

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data 
        }
        
        return $data;
    }
    
    public function getUserBillingInfo(int $userId): array {
        $key = md5("userBillingInfo{$userId}getUserBillingInfo");

        $data = $this->common->getCacheData($key); // Get cached data if exists
        
        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('userName,userPanNumber,userAadharNumber,userGstn,userBankName,userBankAddress,userBankIfsc,userSwiftNumber');
            $this->db->from('userBillingInfo');
            $this->db->where('userId', $userId);
            $data = $this->db->get()->result();

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data 
        }

        return $data;
    }
    
    public function getUserMappingIds(int $userId): array {
        $key = md5("userMappingIds{$userId}getUserMappingIds");

        $data = $this->common->getCacheData($key); // Get cached data if exists

        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('userMappingId,status');
            $this->db->from('userMappingIds');
            $this->db->where('userId', $userId);
            $data = $this->db->get()->result();

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data 
        }

        return $data;
    }

    public function getUserPermissions(int $userId): array {
        $key = md5("userPermissions{$userId}getUserPermissions");

        $data = $this->common->getCacheData($key); // Get cached data if exists
        
        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('userRole, userPermission');
            $this->db->from('userPermissions');
            $this->db->where('userId', $userId);
            $results = $this->db->get()->result();
            $data = array();
            
            foreach ($results as $userVal) :
                $data[$userVal->userRole] = json_decode($userVal->userPermission);
            endforeach;

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data 
        }

        return $data;
    }

    public function getUserdetails(string $userEmail = null, string $userName = null, string $userRole = null, int $userId = 0 ) {
        $key = md5("users$userEmail}{$userRole}{$userName}{$userId}getUserdetails");

        $data = $this->common->getCacheData($key); // Get cached data if exists

        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('userId,userName,userFullName,userEmail,userMobile,userType,userCountryCode,userPassword,isUserLoggedIn,userLoginAttempts,userLoginIp,userSignUpIp,userSignUpAgent,userLastLoginTime,userAgent,userCompanyId,userCountry,userState,userCity,userZipCode,userWebsite,userRole,userStatus,isUserVerfied,created,updated');
            $this->db->from('users');
            
            if($userEmail):
                $this->db->where('userEmail', $userEmail);
            endif;
            
            if($userRole):
                $this->db->where('userRole', $useRole);            
            endif;
            
            if($userName):
                $this->db->where('userName', $userName);
            endif;
            
            if($userId) :
                $this->db->where('userId', $userId);
            endif;
            
            $data = $this->db->get()->result();

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data 
        }

        return $data;
    }

    public function genrateAccessToken(int $userId, string $accessToken, string $created, string $vaildTill):bool {
        
        $ip = $this->input->ip_address();
        
        $query = "INSERT INTO userAccessToken "
                    . "(userId, userAccessToken, created, vaildTill, ipAddress) "
                . "VALUES "
                    . "($userId,'$accessToken','$created','$vaildTill', '$ip') "
                        . "ON DUPLICATE KEY UPDATE "
                        . "userAccessToken = '$accessToken', created = '$created', "
                        . "vaildTill = '$vaildTill', ipAddress = '$ip'";
        
        $this->db->query($query);
        
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    public function updateUserLoginInfo(int $userId, Array $value) {
        $this->db->set($value);
        $this->db->where('userId',$userId);
        $this->db->update('users');   
    }
    
    public function createUser(Array $userData, Array $premData):bool {
        $this->db->insert('users',$userData);
        $isCreated = ($this->db->affected_rows() != 1) ? false : true;
        
        if($isCreated) {
            $userId = $this->db->insert_id();
            
            foreach ($premData as $role => $prems) :
                $rolePerm = json_encode($prems);
                $query = "INSERT INTO userPermissions (userId, userRole, userPermission) VALUES ($userId,'$role','$rolePerm') ON DUPLICATE KEY UPDATE userPermission = '$rolePerm'";
                $this->db->query($query);
                
                if(IS_NEED_DUPLICATE_MAPPING) {
                    
                    if(in_array($role, DUPLICATE_KEY_FOR)) {
                        $this->createMultipalDuplicateIds(array('userId' => $userId));
                    }
                }
                
            endforeach;
        }
        
        return $isCreated;
    }
    
    private function createMultipalDuplicateIds(array $data):bool {        
        $isSuccess = true;
        
        for($i = 1; $i<= DEFAULT_AFF_MAPPING_KEY; $i++) {
            
            $this->db->insert('userMappingIds', $data);
            
            $isSuccess = ($this->db->affected_rows() != 1) ? false : true;
            
            if(!$isSuccess) {
                return $isSuccess;
            }
        }
        
        return $isSuccess;
    }

    public function updateUserInfo(array $infoArray, string $userName, Array $oldData, int $userId): bool {   
        $this->db->set($infoArray);
        $this->db->where('userName', $userName);
        $this->db->update('users');
        
        $status = $this->db->affected_rows() >= 1 ? true : false;
        
        if($status) {
            $logData = json_encode(array('previousData' => $oldData[0], 'currentData' => $infoArray)); 
            $activityLogsArray = array('tableName' => 'users', 'logAgainstId' => $userId, 'logData' => $logData,'createdBy' => $userName);
            $this->db->insert('activityLogs', $activityLogsArray);
        }
        
        return $status;
    }  
    
    public function updateUserPermInfo(string $userRoles, array $permData, string $fields, int $userId) {
        $this->db->trans_start();
            
        $this->db->set('userRole',$userRoles);
        $this->db->where('userId',$userId);
        $this->db->update('users');

        $deleteQuery = "DELETE FROM userPermissions WHERE userID = {$userId}";
        error_log("\n\n last query is :: {$this->db->last_query()}",3,LOG_PATH);
        $this->db->query($deleteQuery);

        $query = "INSERT INTO userPermissions $fields VALUES ". implode(',',$permData);
        $this->db->query($query);
        error_log("\n\n last query is :: {$this->db->last_query()}",3,LOG_PATH);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Something went wrong! Please try after sometime.'), 403);
        } else {
            $this->common->renderResponse(array('status' => 'success', 'msg' => 'Permision saved successfully!'), 200);
        }
    }
    
    public function updateCompanyInfo(array $data, int $userId):bool {
        $isValidCompanyId = $this->isValidCompanyData($data['companyId']);
        
        if($isValidCompanyId) {
            
            $this->db->trans_start();
            
            $this->db->set($data);
            $this->db->where('companyId',$data['companyId']);
            $this->db->update('companyInfo');
            
            $this->db->set('userCompanyId',$data['companyId']);
            $this->db->where('userId', $userId);
            $this->db->update('users');
            
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE) {
                $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Something went wrong! Please try after sometime.'), 403);
            }
            
            $this->common->renderResponse(array('status' => 'success', 'msg' => 'Company information updated successfully!'), 200);
                    
        }
            
        $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Invalid company info!'), 403);
        
    }
    
    private function isValidCompanyData(int $id):bool {
        $key = md5("companyInfo{$id}isValidCompanyData"); // Caching key

        $data = $this->common->getCacheData($key); // Get cached data if exists

        if(!isset($data['status'])) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('1');
            $this->db->from('companyInfo');
            $this->db->where('companyId',$id);
            
            $data['status'] =  ($this->db->get()->num_rows() == 1)?true:false;

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME);
        }

        return $data['status'];
    }
    
    public function AddCompanyInfo(array $data):bool {
        $this->db->insert('companyInfo',$data);
        
        if($this->db->insert_id()) {
            $this->common->renderResponse(array('status' => 'success', 'msg' => 'Company information saved successfully!'), 200);
        }
        
        $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Something went wrong. Please try after sometime!'), 404);
    }
    
    public function setUserBillingInfo(array $data) :bool {
        
        $query = $this->getUserBillingQuery($data);
        
        $this->db->query($query);
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'User billing information saved successfully!'), 200);
    }
    
    public function createUserBillingInfo(array $data) :bool {
        
        if($this->isBillingInfoExists($data['userId'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'User billing information already exists!'), 200);
        }
        
        $this->db->insert('userBillingInfo',$data);
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'User billing information saved successfully!'), 200);        
    }
    
    private function isBillingInfoExists(int $userId): bool {
        $key = md5("companyInfo{$id}isValidCompanyData"); // Caching key

        $data = $this->common->getCacheData($key); // Get cached data if exists

        if(!isset($data['status'])) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('1');
            $this->db->from('userBillingInfo');
            $this->db->where('userId',$userId);

            $data['status'] =  ($this->db->get()->num_rows())?true:false;

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME);
        }

        return $data['status'];
    }

    private function getUserBillingQuery(array $data) :string {        
        $fields = '';
        $vals = '';
        $up = '';
        
        foreach ($data as $field => $val) {
            $fields .= $field.',';
            $vals .= "'$val'".',';
            $up .= $field .'='."'$val',";
        }
        
        return 'INSERT INTO userBillingInfo ('.rtrim($fields, ',').') VALUES ('.rtrim($vals, ',').') ON DUPLICATE KEY UPDATE '.rtrim($up, ',');
    }
    
    public function getOtpAuthData(int $userId, string $method = null):array {
        $this->db->select('userAuthOtpId,userId,userAuthOtp,userAuthOtpMethod,otpAttempts,created');
        $this->db->from('userAuthOtps');
        $this->db->where('userId',$userId);
        
        if($method) {
            $this->db->where('userAuthOtpMethod',$method);
        }
        
        return $this->db->get()->result();
    }
    
    public function getUserStatus(int $userId): array {
        $this->db->select('userStatus');
        $this->db->from('users');
        $this->db->where('userId',$userId);
        return $this->db->get()->result();
    }


    public function logUserAuthOtp(int $userId, string $method):int {
        
        $otpData = $this->getOtpAuthData($userId, $method);
        
        $needInsert = false;
        
        if(empty($otpData)) {
            $needInsert = true;
        } else {
            
            if((strtotime(date('Y-m-d H:i:s')))-(strtotime($otpData[0]->created)) > 1) {
                $needInsert = true;
            } else {
                return $otpData[0]->userAuthOtp;
            }
        }
        
        if($needInsert) {
            $created = date('Y-m-d H:i:s');
            
            $otp = mt_rand(100000, 999999);
            
            $query = "INSERT INTO userAuthOtps (userId, userAuthOtp, userAuthOtpMethod,created) VALUES ("
                    . "{$userId},{$otp},'{$method}','{$created}') ON DUPLICATE KEY UPDATE "
                    . "userAuthOtp = VALUES(userAuthOtp), otpAttempts = VALUES(otpAttempts), created = VALUES(created)";
            $this->db->query($query);
            return $otp;
        }
    }  
    
    public function updateOtpAuth(int $userId, string $method, int $attempts) {
        $this->db->set('otpAttempts',$attempts);
        $this->db->where('userId',$userId);
        $this->db->where('userAuthOtpMethod',$method);
        $this->db->update('userAuthOtps');
    }
    
    private function isSamePass(int $userId, string $userPassworrd):int {
        $this->db->select('1');
        $this->db->from('users');
        $this->db->where('userId',$userId);
        $this->db->where('userPassword',$userPassworrd);
        return $this->db->get()->num_rows();
    }


    public function updateUserPass(int $userId, string $userPassworrd) {
        $same = $this->isSamePass($userId, md5($userPassworrd));
//        print_r($this->db->last_query());
//        exit();
        if(!$same) {
            $this->db->set('userPassword',md5($userPassworrd));
            $this->db->where('userId',$userId);
            $this->db->update('users');
            
            if($this->db->affected_rows()){
                $this->common->renderResponse(array('status' => 'success', 'msg' => 'Password changed successfully!'), 200);
            }
            
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Something went wrong. Please try after sometime!'), 403);
        }
        
        $this->common->renderResponse(array('status' => 'fail', 'msg' => 'You can not enter same password. Please enter a different password!'), 403);
    }
}


