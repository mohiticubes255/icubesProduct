<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAuth extends CI_Controller {    
    private $userPerms = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('userAuthModel','auth');
        $this->load->model('activityLogModel','common');
        
        $action = $this->router->fetch_method();
        $exludeValidationMethods = array('getMaxRoles','verifyUsingAuth','sendAuthToUser','passwordPreLoginRecovery','updatePreLoginPassword');
        
        if(!in_array($action, $exludeValidationMethods)) {
            $this->action = $action;
            
            if($action == 'userLogin' || $action == 'userRegistration') {            
                $this->common->validateRequest(false);    
            } else {
                $this->userPerms = $this->common->validateRequest(true);
            }
        }
    }
    
    public function index() { 
        exit();
    }
    
    private function isValidToken():array {
        $this->form_validation->set_rules('accessToken', 'Access Token', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $tokenData = $this->common->accessTokenValidation($this->input->post('accessToken'));
        
        if(empty($tokenData)) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => "Please enter a valid token!"), 403);
        }
        
        return $tokenData;
    }
    
    public function sendAuthToUser() {
        $tokenData = $this->isValidToken();
        
        $validMethods = array('mail','googleAuth');
        $method = $this->uri->segments[2];
        
        if(!in_array($method, $validMethods)) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => "Please enter a vaild method"), 403);
        }
        
        $userStatus = $this->auth->getUserStatus($tokenData[0]->userId);
        
        if($userStatus[0]->userStatus != 'active') {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => "You account is in {$userStatus[0]->userStatus} state.Please contact admin."), 403);
        }
        
        $otp = $this->auth->logUserAuthOtp($tokenData[0]->userId, $method);
        
        
        // need to enable for login purpose
//        $userEmail = $this->common->getUserEmail($tokenData[0]->userId); //Get email
        
//        $this->common->sendEmail($otp, $userEmail); // Send email
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => "OTP sent. Please enter a valid otp!"), 200);
    }
    
    public function verifyUsingAuth($userId = null, $method = null, $isPassRecovery = false, $otp = null, $password = null) {
        $validMethods = array('mail','googleAuth');
        $tokenData = array();
        $method = ($method)?$method:$this->uri->segments[2];
        
        if(!in_array($method, $validMethods)) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => "Please enter a vaild method"), 403);
        }
        
        if(!$isPassRecovery) {
            $tokenData = $this->isValidToken();
            $userId = $tokenData[0]->userId;
            $otp = $this->input->post('otp');
        }
        
        $this->form_validation->set_rules('otp', 'Otp', 'trim|required|integer|min_length[6]');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $otpData = $this->auth->getOtpAuthData($userId, $method);
        
        $this->authCommon($userId, $otpData, $isPassRecovery, $tokenData, $otp, $password, $method);
    }
    
    private function authCommon(int $userId, $otpData, $isPassRecovery, $tokenData, $otp, $password, $method) {
        
        if(empty($otpData)) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => "Something went wrong. Please try after sometime!"), 403);
        } else {
            
            if((strtotime(date('Y-m-d H:i:s')))-(strtotime($otpData[0]->created)) >= 300) {
                $this->common->renderResponse(array('status' => 'fail', 'msg' => "Otp has beeb expired!"), 403);
            }
        }
        
        $userStatus = $this->auth->getUserStatus($otpData[0]->userId);
        
        if($userStatus[0]->userStatus != 'active') {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => "You account is in {$userStatus[0]->userStatus} state.Please contact admin."), 403);
        }
        
//        if($this->input->post('otp') == $otpData[0]->userAuthOtp) { 
        if($otp == '123456') {
            
            if($isPassRecovery) {
                $this->auth->updateUserPass($userId, $password);
            } else {
                $loginInfo = $this->auth->userLoginData($tokenData[0]->userId, $this->input->post('accessToken'));
                $this->common->renderResponse($loginInfo['result'], $loginInfo['statusCode']);
            }
            
        } else {
            $attempts = $otpData[0]->otpAttempts + 1;
            $leftAttempts = 5 - $attempts;
            
            if($attempts == 5) {                  
                $status = ($attempts == 5)?'blocked':'active';                
                $this->auth->updateUserLoginInfo($userId, array('userStatus'=>$status,'userLoginAttempts' => $attempts));                
            } else {
                $this->auth->updateOtpAuth($userId, $method, $attempts);
            }            
            
            $this->common->renderResponse(array('status' => 'fail', 'msg' => "Wrong otp! {$leftAttempts} attempts left!"), 403);
        }      
        
    }
    
    public function userLogin() {        
        $this->form_validation->set_rules('userEmail', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('userPassword', 'Password', 'trim|required|min_length[8]'); 
        
        if ($this->form_validation->run() == FALSE) {
            $resultArray = array('status' => 'fail','msg' => str_replace('</p>','',str_replace('<p>','',validation_errors())));
            
            $this->common->renderResponse($resultArray, 400);            
        }        
        
        $loginInfo = $this->auth->getUserInfo($this->input->post('userEmail'), $this->input->post('userPassword'));

        $this->common->renderResponse($loginInfo['result'], $loginInfo['statusCode']);        
    }
    
    public function userValidation($validationType = 'signup'): array {
        $validationArray = array();
        
        if($validationType == 'signup') {
            $_POST['userRole'] = 'affiliate';
            
            $this->form_validation->set_rules('userEmail', 'Email', 'trim|required|valid_email|is_unique[users.userEmail]');
            $this->form_validation->set_rules('userPassword', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('userMobile', 'Mobile', 'trim|required|is_numeric|min_length[10]|is_unique[users.userMobile]');
            $this->form_validation->set_rules('userRole', 'Role', 'callback_validateUserRole');
        }       
        
        $this->form_validation->set_rules('userType', 'User Type', 'in_list[individual,company]');
        $this->form_validation->set_rules('userCountryCode', 'Country Code', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('userFullName', 'Full Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('userCountry', 'Country', 'trim|min_length[3]');
        $this->form_validation->set_rules('userState', 'State', 'trim|min_length[3]');
        $this->form_validation->set_rules('userCity', 'City', 'trim|min_length[3]');
        $this->form_validation->set_rules('userZipCode', 'Zip Code', 'trim|min_length[3]');
        $this->form_validation->set_rules('userWebsite', 'Website', 'trim|min_length[5]');        
        $this->form_validation->set_rules('isUserVerfied', 'User Verify', 'trim|min_length[1]');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        if($validationType == 'signup') {
            $validationArray['userName'] = $this->genrateUserName($this->input->post('userFullName'));
            $validationArray['userEmail'] = trim(strtolower($this->input->post('userEmail')));
            $validationArray['userMobile'] = $this->input->post('userMobile');
            $validationArray['userPassword'] = $this->input->post('userPassword');
            $validationArray['userSignUpIp'] = $this->input->ip_address();
            $validationArray['userSignUpAgent'] = $this->agent->agent;
            $validationArray['createdBy'] = $this->input->post('createdBy')!=''?$this->input->post('createdBy'):1;            
            $validationArray['userRole'] = trim(strtolower($this->input->post('userRole')));
//            $validationArray['userRole'] = '';
            $validationArray['updatedBy'] = $this->input->post('updatedBy')!=''?$this->input->post('updatedBy'):1;
        } else {
            $validationArray['updatedBy'] = (isset($this->userPerms['currentUserId']) && $this->userPerms['currentUserId'])?$this->userPerms['currentUserId']:1;
        }
        
        $validationArray['userType'] = trim(strtolower($this->input->post('userType')));
        $validationArray['userFullName'] = trim(strtolower($this->input->post('userFullName')));
        $validationArray['userCountryCode'] = $this->input->post('userCountryCode');
        $validationArray['userCountry'] = trim(strtolower($this->input->post('userCountry')));
        $validationArray['userState'] = trim(strtolower($this->input->post('userState')));
        $validationArray['userCity'] = trim(strtolower($this->input->post('userCity')));
        $validationArray['userZipCode'] = $this->input->post('userZipCode');
        $validationArray['userWebsite'] = trim($this->input->post('userWebsite'));
//        $validationArray['userRole'] = trim(strtolower($this->input->post('userRole')));     
//        $validationArray['updatedBy'] = $this->input->post('updatedBy')!=''?$this->input->post('updatedBy'):1;
        return $validationArray;
    }

    public function userRegistration() {
        
        $isValid = $this->userValidation('signup');
        
        $userSignupArray = array(
            'userName' => $isValid['userName'],'userFullName' => $isValid['userFullName'],'userEmail' => $isValid['userEmail'],
            'userMobile' => $isValid['userMobile'],'userType'=>$isValid['userType'],'userCountryCode' => $isValid['userCountryCode'],'userPassword' => md5($isValid['userPassword']),
            'userSignUpIp' => $isValid['userSignUpIp'],'userSignUpAgent' => $isValid['userSignUpAgent'],'userCountry' => $isValid['userCountry'],
            'userState' => $isValid['userState'],'userCity' => $isValid['userCity'],'userZipCode' => $isValid['userZipCode'],
            'userWebsite' => $isValid['userWebsite'],'userRole' => $isValid['userRole'],
            'createdBy' => $isValid['createdBy'],'updatedBy' => $isValid['updatedBy']
        );
        
        if($this->auth->createUser($userSignupArray, $this->userPerms)) {  
            $this->common->renderResponse(array('status' => 'success', 'msg' => 'You have successfully created your account!'), 200);
        }
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'Something went wrong! Please try after sometime!'), 500);
    }
    
    public function validateUserRole($type) :bool {        
        $validUserRoles = $this->config->config['userRoles'];
        $perms = $this->config->config['userMaxRolePermissions'];
        $userPermissions = json_decode($this->input->post('userPermissions'),true);
        
        $permissions = array();
        
        $typeArray = explode(',',trim($type));
        
        foreach($typeArray as $type) {  
            $permType = lcfirst(str_replace(" ",'',ucwords($type))).'Perms';
            
            if(isset($userPermissions[$type])) {
                $permissions[$type] = $userPermissions[$type];
            } else {
                $permissions[$type] = $perms[$permType];
            }
            
            if(!in_array($type, $validUserRoles)) {
                $this->form_validation->set_message('validateUserRole', 'The {field} field does not have a valid value.');
                return false;
            } 
        }
        
        $this->userPerms = $permissions;
                
        return true;
    }
    
    public function isUserNameExists($value):array {
        $key = md5("users{$value}isUserNameExists");

        $data = $this->common->getCacheData($key); // Get cached data if exists
        
        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n\n #######################################################",3,LOG_PATH);
            $this->db->select('userId');
            $this->db->from('users');
            $this->db->where('userName',$value);
            $data = $this->db->get()->result();

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data
        }

        return $data;
    }
    
    public function genrateUserName(string $stringName): string { 
        $stringName = strtolower($stringName);
        $randNo = 200;
        
        if(empty($this->isUserNameExists(str_replace(" ", "", $stringName)))) :
            return str_replace(" ", "", $stringName);
        endif;
        
	while(true) :
            $usernameParts = array_filter(explode(" ", strtolower($stringName)));
            $usernameParts = array_slice($usernameParts, 0, 2);

            $part1 = (!empty($usernameParts[0]))?substr($usernameParts[0], 0,8):"";
            $part2 = (!empty($usernameParts[1]))?substr($usernameParts[1], 0,5):"";
            $part3 = ($randNo)?rand(0, $randNo):"";

            $username = $part1. str_shuffle($part2). $part3;

            $usernameExistInDb = $this->isUserNameExists('userName', $username);
            
            if(empty($usernameExistInDb)) :
                return $username;
            endif;
            
        endwhile;
    }
    
    public function editUserBasicInfo() {
        
        $userName = isset($this->uri->segments[2])?$this->uri->segments[2]:'';
        
        if(!is_string($userName)){
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'User name can not be empty!'), 403);
        }
        
        if(!isset($this->userPerms['hasUserEdit'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to edit profile'), 403);
        }
        
        $endUserId = $this->common->isValidUserName($userName, $this->userPerms['currentUserId'], isset($this->userPerms['isSuperAdmin']) ?? $this->userPerms['isSuperAdmin']);

        $isValid = $this->userValidation('edit');
        
        $fields = 'userId, userFullName, userType, userCountry, userState, userCity, ';
//            $fields .= 'userZipCode, userWebsite, userRole, userStatus, ';
        $fields .= 'userZipCode, userWebsite, userStatus, ';
        $fields .= 'isUserVerfied, updated, updatedBy';

        $oldData = $this->common->getUsersCurrentData($userName, $fields, 'users', "userName = '$userName'");
        
        if(empty($oldData)) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'User name does not exists!'), 401);
        }

        $userId = $oldData[0]->userId;

        $isUpdated = $this->auth->updateUserInfo($isValid, $userName, $oldData, $userId);

        if($isUpdated) {
            $this->common->renderResponse(array('status' => 'success', 'msg' => "Dear {$userName}, Your data has been updated successfully!"),200);
        }

        $this->common->renderResponse(array('status' => 'success', 'msg' => "Dear {$userName}, Something went wrong. Please try after sometime!!"),500);
    }

    public function getUserInfo() {
        
        $userName = isset($this->uri->segments[2])?$this->uri->segments[2]:'';
        
        if(!isset($this->userPerms['hasUserView'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to view profile'), 403);
        }
        
        $endUserId = $this->common->isValidUserName($userName, $this->userPerms['currentUserId'], isset($this->userPerms['isSuperAdmin'])??$this->userPerms['isSuperAdmin']);
        
        $data['userBasicInfo'] = $this->auth->getUserdetails('',$userName);
        
        if(empty($data['userBasicInfo'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'User name does not exists!'), 401);
        }
        
        $data['userBasicInfo'] = isset($data['userBasicInfo'][0])?$data['userBasicInfo'][0]:$data['userBasicInfo'];
        $data['userBasicInfo']->userPassword = '';
        
        if(isset($this->userPerms['hasCompanyView'])) {
            
            if(isset($data['userBasicInfo']->userCompanyId)) {
                $data['userCompanyInfo'] = $this->auth->getUserCompany($data['userBasicInfo']->userCompanyId);
                $data['userCompanyInfo'] = isset($data['userCompanyInfo'][0])?$data['userCompanyInfo'][0]:$data['userCompanyInfo'];
            }            
        }
        
        if(isset($this->userPerms['hasPermissionsView'])) {
            $data['userPermissionsInfo'] = $this->auth->getUserPermissions($endUserId);
        }
        
        if(isset($this->userPerms['hasBillingView'])) {
            $data['userBillingInfo'] = $this->auth->getUserBillingInfo($endUserId);
            $data['userBillingInfo'] = isset($data['userBillingInfo'][0])?$data['userBillingInfo'][0]:$data['userBillingInfo'];
        }
        
        if(isset($this->userPerms['hasUserMappingView'])) {
            $data['userMappingInfo'] = $this->auth->getUserMappingIds($endUserId);
        }
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'User data fetched successfully!','data' => $data), 200);
    }
    
    public function userLogOut(int $userId = 0): bool {        
//        $userId = $this->input->post('userId');
        $userName = isset($this->uri->segments[2])?$this->uri->segments[2]:'';
        $endUserId = $this->common->isValidUserName($userName, $this->userPerms['currentUserId'], isset($this->userPerms['isSuperAdmin'])??$this->userPerms['isSuperAdmin']);
               
        $query = "UPDATE "
                    . "userAccessToken as t "
                . "JOIN "
                    . "users  as u USING(userID) "
                . "SET "
                    . "u.isUserLoggedIn = '0', t.ipAddress = '', "
                    . "t.userAccessToken = '' WHERE u.userId = '{$this->userPerms['currentUserId']}'";
                    
        $this->db->query($query);
        
        $isLoggedOut = ($this->db->affected_rows() >= 1) ? true : false;
        
        if($isLoggedOut) {
            $this->common->renderResponse(array('status' => 'success','msg' => 'You have successfully logged out!'), 200);
        }
        
        $this->common->renderResponse(array('status' => 'fail','msg' => 'Something went wrong. Please try after sometime!'), 500);
    }
    
    public function validateCompanyData($step = 'add'):array {
        
        if($step == 'update') {
            $this->form_validation->set_rules('userId','User Id','trim|required|integer');
            $this->form_validation->set_rules('companyStatus','Company Status','in_list[active,inactive,blocked]');            
        } else {
            $this->form_validation->set_rules('companyName','Company Name','trim|required|alpha_numeric_spaces|min_length[3]|is_unique[companyInfo.companyName]');
            $this->form_validation->set_rules('companyGstn','GSTN Number','trim|required|alpha_numeric|exact_length[15]|is_unique[companyInfo.companyGstn]');
            $this->form_validation->set_rules('companyCin','CIN Number','trim|required|alpha_numeric|exact_length[21]|is_unique[companyInfo.companyCin]');
            $this->form_validation->set_rules('companyPan','PAN Number','trim|required|alpha_numeric|exact_length[10]|is_unique[companyInfo.companyPan]');
            $this->form_validation->set_rules('companyMobile','Mobile Number','trim|required|min_length[7]|max_length[15]|integer|is_unique[companyInfo.companyMobile]');
        }        
        
        $this->form_validation->set_rules('companyCountryCode','Country Code','trim|required');
        $this->form_validation->set_rules('companyAddress','Company Address','trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('companyWebSite','Company Web Site','trim|valid_url');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $returnArray = array();
        
        if($step == 'update') {
            $returnArray['companyStatus'] = $this->input->post('companyStatus');
            $returnArray['updatedBy'] = $this->userPerms['currentUserId'];
        } else {
            $returnArray['createdBy'] = $this->userPerms['currentUserId'];
            $returnArray['companyName'] = trim(strtolower($this->input->post('companyName')));
            $returnArray['companyGstn'] = trim(strtolower($this->input->post('companyGstn')));
            $returnArray['companyCin'] = trim(strtolower($this->input->post('companyCin')));
            $returnArray['companyPan'] = trim(strtolower($this->input->post('companyPan')));
            $returnArray['companyMobile'] = trim(($this->input->post('companyMobile')));
        }       
        
        $returnArray['companyCountryCode'] = trim(($this->input->post('companyCountryCode')));
        $returnArray['companyAddress'] = trim(strtolower($this->input->post('companyAddress')));
        $returnArray['companyWebSite'] = trim(strtolower($this->input->post('companyWebSite')));
        
        return $returnArray;
    }

    public function updateCompanyInfo() {
        
        if(!isset($this->userPerms['hasCompanyEdit'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to edit user permissions!'), 403);
        }
        
        $companyId = isset($this->uri->segments[2]) ? $this->uri->segments[2] : '';
        $userName = isset($this->uri->segments[3]) ? $this->uri->segments[3] : '';
        $isSuperAdmin = isset($this->userPerms['isSuperAdmin']) ?? $this->userPerms['isSuperAdmin'];
        
        $endUserId = $this->common->isValidUserName($userName, $this->userPerms['currentUserId'], $isSuperAdmin);
                
        $updateData = $this->validateCompanyData('update');
        
        $updateData['companyId'] = $companyId;
        
        $this->auth->updateCompanyInfo($updateData, $endUserId);
    }
    
    private function validateUserBillingData($step = 'update'):array {        
        $userName = isset($this->uri->segments[2]) ? $this->uri->segments[2] : '';
        
        $endUserId = $this->common->isValidUserName($userName, $this->userPerms['currentUserId'], isset($this->userPerms['isSuperAdmin']) ?? $this->userPerms['isSuperAdmin']);

        $this->form_validation->set_rules('userName', 'User Name', 'trim|required|alpha_numeric_spaces|min_length[3]');
        
        if($step == 'create') {
            $this->form_validation->set_rules('userPanNumber', 'PAN Number','trim|required|alpha_numeric|exact_length[10]|is_unique[userBillingInfo.userPanNumber]');
            $this->form_validation->set_rules('userAadharNumber', 'Aadhar Card Number','trim|required|alpha_numeric|exact_length[12]|is_unique[userBillingInfo.userAadharNumber]');
            $this->form_validation->set_rules('userGstn', 'GSTN Number', 'trim|alpha_numeric|exact_length[15]|is_unique[userBillingInfo.userGstn]');
            $this->form_validation->set_rules('userSwiftNumber', 'Swift Number', 'trim|alpha_numeric|exact_length[11]|is_unique[userBillingInfo.userSwiftNumber]');
        }
        
        $this->form_validation->set_rules('userBankName', 'Bank Name','trim|required|alpha_numeric_spaces|min_length[3]');
        $this->form_validation->set_rules('userBankAddress','Bank Address', 'trim|required|alpha_numeric_spaces|min_length[3]');
        $this->form_validation->set_rules('userBankAccount','Bank Account', 'trim|required|numeric|min_length[3]');
        $this->form_validation->set_rules('userBankIfsc', 'IFSC', 'trim|required|alpha_numeric|exact_length[11]');
                
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $returnArray = array();
        
        $returnArray['userName'] = trim(strtolower($this->input->post('userName')));
        $returnArray['userId'] = $endUserId;
        
        if($step == 'create') {            
            $returnArray['userPanNumber'] = trim(strtolower($this->input->post('userPanNumber')));
            $returnArray['userAadharNumber'] = trim(strtolower($this->input->post('userAadharNumber')));
            $returnArray['userGstn'] = trim(strtolower($this->input->post('userGstn')));
            $returnArray['userSwiftNumber'] = trim(strtolower($this->input->post('userSwiftNumber')));
            $returnArray['createdBy'] = $this->userPerms['currentUserId'];            
        } else {
            $returnArray['UpdatedBy'] = $this->userPerms['currentUserId'];
        }
        
        $returnArray['userBankName'] = trim(strtolower($this->input->post('userBankName')));
        $returnArray['userBankAddress'] = trim(strtolower($this->input->post('userBankAddress')));
        $returnArray['userBankAccount'] = trim(strtolower($this->input->post('userBankAccount')));        
        $returnArray['userBankIfsc'] = trim(strtolower($this->input->post('userBankIfsc')));
        
        return $returnArray;
    }

    public function editUserBillingInfo(): bool {
        
        if (!isset($this->userPerms['hasBillingEdit'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to edit user permissions!'), 403);
        }
        
        $this->auth->setUserBillingInfo($this->validateUserBillingData('update'));
    }
    
    public function addUserBillingInfo(): bool {
        
        if (!isset($this->userPerms['hasBillingCreate'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to edit user permissions!'), 403);
        }
        
        $this->auth->createUserBillingInfo($this->validateUserBillingData('create'));
    }

    public function addCompanyInfo() {
        
        if(!isset($this->userPerms['hasCompanyCreate'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to add company info!'), 403);
        }
        
        $userName = isset($this->uri->segments[2]) ? $this->uri->segments[2] : '';
        $isSuperAdmin = isset($this->userPerms['isSuperAdmin']) ?? $this->userPerms['isSuperAdmin'];
        
        $endUserId = $this->common->isValidUserName($userName, $this->userPerms['currentUserId'], $isSuperAdmin);
        
        $companyData = $this->validateCompanyData('add');
        
        $this->auth->AddCompanyInfo($companyData);
    }
    
    public function getCompanyInfo() {        
        
        if(!isset($this->userPerms['hasCompanyView'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to fetch company info!'), 403);
        } 
        
        $this->form_validation->set_rules('query','Query','required|alpha|min_length[2]');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $companyData = $this->auth->getUserCompany('1', $this->input->post('query'));
        
        if(empty($companyData)) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'No data found!'), 200);
        }
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'Company lists!', 'data'=>$companyData), 200);
    }
    
    public function updateUserPerms() {
        
        $userName = isset($this->uri->segments[2]) ? $this->uri->segments[2] : '';
        
        $endUserId = $this->common->isValidUserName($userName, $this->userPerms['currentUserId'], isset($this->userPerms['isSuperAdmin']) ?? $this->userPerms['isSuperAdmin']);

        if(!isset($this->userPerms['hasPermissionsEdit'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to edit user permissions!'), 403);
        }
        
        $userRole = $this->input->post('userRole');
        error_log("\n\n user role :: {$userRole}",3,LOG_PATH);
//        print_r($userRole);
//        exit();
        if(is_string($userRole) && is_array(json_decode($userRole,true))) {
            $per = json_decode($userRole,true);
            
            if(empty($per)) {
                $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Roles data can\'t be empty!'), 403);
            }
//            $userId = $this->input->post('userId');
//            $updatedBy = $this->input->post('updatedBy');
            $updatedBy = $this->userPerms['currentUserId'];
            
            $fields = "(userId, userRole, userPermission, updatedBy)";
            
            $userRoles ='';
            $validUserRoles = $this->config->config['userRoles'];
            
            $preDefinedPerms = $this->config->config['userMaxRolePermissions'];
            
            foreach ($per as $role => $roles) {
//                $permType = lcfirst(str_replace(" ",'',ucwords($role))).'Perms';
                
                if(!in_array($role, $validUserRoles)) {
                    $this->common->renderResponse(array('status' => 'fail', 'msg' => "Seems {$role} is not a valid role!"), 403);
                }
                
                $userRoles .= ','.$role;
                $roleData = json_encode($roles);
                $permData[] = "($endUserId,'{$role}','{$roleData}',{$updatedBy})";
            }
            
            $userRoles = ltrim($userRoles,",");
            
            $this->auth->updateUserPermInfo($userRoles, $permData, $fields, $endUserId);
            
        } else {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Please enter a valid permission.'), 403);
        }
    }
    
    public function getMaxRoles(): array{
        $perms = $this->config->config['userMaxRolePermissions'];
        $allRoles = array();

        foreach ($perms as $parent => $values) {            
            $roles = str_replace('Perms', '', $parent);            
            preg_match_all('/[A-Z]/', $roles, $matches, PREG_OFFSET_CAPTURE);
            $key = isset($matches[0])?$matches[0]:'';
            
            if(!empty($key)) {
                $start = 0; 
                $prevPointer = 0;
                $tempArray = array();
                
                foreach ($key as $roleKey => $roleVal) {                    
                    $pointer = $roleVal[1];
                    $length = ($pointer - $prevPointer);                    
                    $prevPointer = $pointer;
                    array_push($tempArray, strtolower(substr($roles, $start, $length)));                    
                    $start = $pointer;
                }
                
                array_push($tempArray, strtolower(substr($roles, $start, strlen($roles))));
                $roles = (implode(" ",$tempArray));
                
            }
            
            if($roles == 'super admin') {
                $verticals = array_keys($values);
            }
            
            $allRoles[] = $roles;
            
        }
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'Roles and verticals.', 'data' => array('roles'=>$allRoles,'verticals'=>$verticals)), 200);
    }
    
    public function getUserLists() {
        error_log("\n\n request data is :: ". json_encode($this->input->post()),3,LOG_PATH);
        
        if(!isset($this->userPerms['isSuperAdmin'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'You don\'t have a sufficient permission to process this request!'), 403);
        }
        
        if(($this->input->post('pagination') == null) && ($this->input->post('sort') == null) ) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Something went wrong. Please try after sometime!'), 403);
        }
        
        $ktDataTableData = $this->common->ktDataTables();
        
        $ktDataTableData['details']['select'] = "userName, userFullName, userEmail, userMobile, userType, userStatus";
        $ktDataTableData['details']['table'] = 'users';
        
        $lists = $this->auth->getUsersList($ktDataTableData['details']);  
        
        $count = (isset($lists['count']))?$lists['count']:0;
        $isNext = ($ktDataTableData['pagination']['perpage']>$count)?'no':'yes';
        $listData = json_decode(json_encode($lists['result']),true);  
        
        $meta = $this->common->createDataTableMeta($count, $ktDataTableData);
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'done','isNext' => $isNext, 'data' => $listData, 'meta' => $meta), 200);
    }
    
    public function passwordPreLoginRecovery() {
        
        $this->form_validation->set_rules('userEmail', 'Email', 'trim|required|valid_email');
//        $this->form_validation->set_rules('userPassword', 'Password', 'trim|required|min_length[8]');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $userData = $this->common->isEmailExists(trim($this->input->post('userEmail')));
        
        if(!empty($userData)) {
            
            if($userData[0]->userStatus != 'active') {
                $this->common->renderResponse(array('status' => 'fail', 'msg' => "You account in {$userData[0]->userStatus} status. Please contact admin!"), 403);
            }
            
            $otp = $this->auth->logUserAuthOtp($userData[0]->userId, 'mail');
            
            $this->common->renderResponse(array('status' => 'success', 'msg' => "OTP sent on your email address. Please enter a valid otp!", 'data'=>array('userEmail'=>"{$userData[0]->userEmail}",'userId'=>"{$userData[0]->userId}",'method'=>'mail')), 200);
                       
        }
        
        $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Email not associated with us.'), 403);
    }
    
    public function updatePreLoginPassword() {
//        print_r('hi');
//        exit();
        $this->form_validation->set_rules('otp', 'Otp', 'trim|required|exact_length[6]');
        $this->form_validation->set_rules('userId', 'User ID', 'required|integer');
        $this->form_validation->set_rules('method', 'Method', 'required|in_list[mail,googleAuth]');
        $this->form_validation->set_rules('userPassword', 'Password', 'trim|required|min_length[8]');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
            
        $this->verifyUsingAuth($this->input->post('userId'), $this->input->post('method'), true, $this->input->post('otp'), $this->input->post('userPassword'));
    }
    
    public function passwordPostLoginRecovery() {
        $userName = isset($this->uri->segments[2]) ? $this->uri->segments[2] : '';
        
        $endUserId = $this->common->isValidUserName($userName, $this->userPerms['currentUserId'], isset($this->userPerms['isSuperAdmin']) ?? $this->userPerms['isSuperAdmin']);
        
        $userRole = $this->input->post('userRole');
        
        $this->form_validation->set_rules('userPassword', 'Password', 'trim|required|min_length[8]');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $this->auth->updateUserPass($endUserId, $this->input->post('userPassword'));
    }
}