<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivityLogModel extends CI_Model {
    public int $userId;
    public string $apiKey;
    public string $hostName;
    public string $accessToken;
    public string $currentRole;
    public string $ipAddress;

    public function getUsersCurrentData(string $userName, string $fields, string $tableName, string $whereCond): array {
        $key = md5("{$tableName}{$whereCond}getUsersCurrentData");

        $data = $this->common->getCacheData($key); // Get cached data if exists

        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select($fields);
            $this->db->from($tableName);
            $this->db->where($whereCond);
            $data = $this->db->get()->result();

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data
        }

        return $data;
    }
    
    public function accessTokenValidation (string $accessToken): array {
        // No cache for this validation
        // $key = md5("userAccessToken{$accessToken}accessTokenValidation");

        // $data = $this->common->getCacheData($key); // Get cached data if exists

        // if(!$data) {
            $this->db->select('userId, userAccessToken, created, vaildTill');
            $this->db->from('userAccessToken');
            $this->db->where('userAccessToken', $accessToken);
            $data = $this->db->get()->result();

            // $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data
        // }

        return $data;
    }
    
    public function userAuthentication(int $userId): bool {
        // Currently this function is in no use
        $key = md5("users{$userId}userAuthentication"); // Caching key

        $data = $this->common->getCacheData($key); // Get cached data if exists

        if(!isset($data['status'])) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('userRole,userPermissions');
            $this->db->from('users');
            $this->db->where('userId', $userId);

            $data['status'] = ($this->db->get()->num_rows())?true:false;

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME);
        }

        return $data['status'];
    }
    
    public function getUserPermission(int $userId, string $userRole): array {
        $key = md5("userPermissions{$userId}{$userRole}getUserPermission"); // Caching key

        $data = $this->common->getCacheData($key); // Get cached data if exists

        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('userPermission');
            $this->db->from('userPermissions');
            $this->db->where('userId', $userId);
            $this->db->where('userRole', $userRole);
            
            $data = $this->db->get()->result();

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME);
        }
        
        return $data;
    }
    
    public function renderResponse(Array $array, int $status) {
        $this->output
        ->set_status_header($status)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
        exit;
    }
    
    public function validateRequest(bool $isAuth = false) {
        
        $this->hostName = gethostname();
        $validHosts = $this->config->config['validApiHost'];

        if(!in_array($this->hostName, $validHosts)) {
            $this->renderResponse(array('status' => 'fail', 'msg' => 'You are not authorized to access this application. Please contact your administrator'), 401);
        }
        
        $headers = $this->input->request_headers(true);

        if($isAuth) {
            
            if($this->input->post('currentRole') == '' && !is_string($this->input->post('currentRole'))) {
                $this->renderResponse(array('status' => 'fail', 'msg' => 'Required user details can\'t be empty or invalid!'), 400);
            }

            $this->accessToken = isset($headers['Accesstoken'])?$headers['Accesstoken']:'';
            
            $this->currentRole = $this->input->post('currentRole');
            
            $token = $this->accessTokenValidation($this->accessToken);
            
            if(empty($token)) {
                $this->renderResponse(array('status' => 'fail', 'msg' => 'Invalid access token!', 'data'=>array('action' =>'logout')), 401);
            }
            
            $this->userId = $token[0]->userId;
            
            $this->userPerms = $this->getUserPermission($this->userId, $this->currentRole);
            
            $this->userPerms = (isset($this->userPerms[0]->userPermission))?json_decode($this->userPerms[0]->userPermission, true):'';
                
            if(empty($this->userPerms)) {
                $this->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to process current request!'), 400);
            }
            
            if($this->action == 'userLogOut') {
                
                if($this->currentRole == 'super admin') {
                    $logOutArray['isSuperAdmin'] = true;
                }
                
                $logOutArray['isLogOut'] = true;
                $logOutArray['currentUserId'] = $this->userId;
                return $logOutArray;
            }
            $defiendPerms = $this->config->config['userMaxRolePermissions'];
            
            if($this->currentRole == 'super admin') {
                $userPerms['isSuperAdmin'] = true;
                
                foreach ($defiendPerms['superAdminPerms'] as $permKey => $permVal) {
                    
                    if($permVal == 'all') {
                        
                        $allKeys = array('create','view','edit');
                        
                        foreach ($allKeys as $allkey => $allVal) {
                            $finalKey = 'has'.ucfirst($permKey).ucfirst($allVal);
                            $userPerms[$finalKey] = true;
                        }
                        
                    } else {
                        $allKeys = explode(',',$permVal);
                        
                        foreach ($allKeys as $allkey => $allVal) {
                            $finalKey = 'has'.ucfirst($permKey).ucfirst($allVal);
                            $userPerms[$finalKey] = true;
                        }
                    }
                }
                
            } else {
                
                foreach ($this->userPerms as $key => $perms) {
                    
                    $permArray = explode(',',$perms);
                    
                    foreach ($permArray as $type) {
                        
                        if($type == 'all') {
                            $permType = 'has'.ucfirst($key).'Create';
                            $userPerms[$permType] = true;
                            $permType = 'has'.ucfirst($key).'View';
                            $userPerms[$permType] = true;
                            $permType = 'has'.ucfirst($key).'Edit';
                            $userPerms[$permType] = true;                            
                        } else {
                            $permType = 'has'.ucfirst($key).ucfirst($type);
                            $userPerms[$permType] = true;
                        }
                    }
                } 
            } 
            
            $userPerms['currentUserId'] = $this->userId;
            $userPerms['accessToken'] = $this->accessToken;
            
            return $userPerms;
        }
        
        $this->apiKey = isset($headers['Apikey'])?$headers['Apikey']:'';
        
        if($this->apiKey != API_KEY) {
            $this->renderResponse(array('status' => 'fail', 'msg' => 'Invalid api key!'), 400);
        } 
    }
    
    public function isValidCompanyId(string $userName, int $userId, bool $isSuperAdmin = false): int {
        $key = md5("users{$userName}{$userId}{$isSuperAdmin}isValidCompanyId");

        $data = $this->common->getCacheData($key); // Get cached data if exists

        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('userId');
            $this->db->from('users');
            $this->db->where('userName', $userName);
            
            if(!$isSuperAdmin) {
                $this->db->where('userId', $userId);
            }
            
            $data = $this->db->get()->result();

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data
        }

        if(isset($data[0]->userId)) {
            return $data[0]->userId;
        }
        
        $this->renderResponse(array('status' => 'fail', 'msg' => 'Please enter a valid userName,userId or you don\'t have enough permission to edit info for this user!'), 403);
    }

    public function isValidUserName(string $userName, int $userId, bool $isSuperAdmin = false): int {
        $key = md5("users{$userName}{$userId}{$isSuperAdmin}isValidUserName");

        $data = $this->common->getCacheData($key); // Get cached data if exists

        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('userId');
            $this->db->from('users');
            $this->db->where('userName', $userName);
            
            if(!$isSuperAdmin) {
                $this->db->where('userId', $userId);
            }
            
            $data = $this->db->get()->result();

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data
        }


        if(isset($data[0]->userId)) {
            return $data[0]->userId;
        }
        
        $this->renderResponse(array('status' => 'fail', 'msg' => 'Please enter a valid userName,userId or you don\'t have enough permission to edit info for this user!'), 403);
    }

    public function setCacheData(string $key, $value, int $time = DEFAULT_CACHE_TIME, $isLogTrue = false) {
        $this->cache->memcached->save($key, $value, $time);

        if($isLogTrue) {
            error_log("\n\n\n cache status is :: ".json_encode($this->cache->memcached->cache_info()),3,LOG_PATH);
        }
    }

    public function getCacheData(string $key) {
        return $this->cache->memcached->get($key);
    }
    
    public function uploadImage($name, $path, $thumbPath, $width, $height, $needThumb = false, $needResize = false): array {
        //Load image library
        $this->load->library('image_lib');
        
        //  Set Image config      
        $config['image_library'] = 'gd2';
        $config ['upload_path'] = $path;
        $config ['allowed_types'] = 'jpg|jpeg|png';
        $config ['max_size'] = '0';
        
        $this->image_lib->initialize($config);
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($name)){ // banner
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = $this->upload->display_errors();
            $this->renderResponse($validationArray, 400);
        }

        $uploadedImage = $this->upload->data();

        $thumbImg = $uploadedImage['raw_name'] . '_thumb' . $uploadedImage['file_ext'];
        $imgUrl = ltrim($path.$uploadedImage['file_name'],'./');
        
        $thumbUrl = '';
        
        if($needThumb) {
            $this->genrateThumb($uploadedImage['full_path'], $thumbPath, $height);
            $thumbUrl = ltrim($thumbPath.$thumbImg,'./');
        }
        
        $this->image_lib->clear();
        
        return array('img' => $imgUrl, 'thumb' => $thumbUrl);
    }
    
    private function genrateThumb($full_path, $thumbPath, $height):bool {
        //Load image library
        $this->load->library('image_lib');
        
        $config['image_library'] = 'gd2';
        $config['source_image'] = $full_path;
        $config['new_image'] = $thumbPath;
        $config['maintain_ratio'] = TRUE;
        $config['create_thumb'] = TRUE;
        $config['height'] = $height;

        $this->image_lib->initialize($config);

        $status = $this->image_lib->resize();

        if ( ! $this->image_lib->resize()) :
            $this->common->renderResponse(array('status'=>'fail','msg'=>'Something went wrong. Please try after sometime!'), 500);
        endif;

        return true;
    }
    
    public function getHeaderData($query):array {
        $key = md5("campHeaders{$query}getHeaderData");

        $data = $this->common->getCacheData($key); // Get cached data if exists
        
        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('headerId, headerName, headerStatus');
            $this->db->from('campHeaders');
            $this->db->like('headerName',$query);
            $data = $this->db->get()->result();

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data 
        }
        
        return $data;
    }
    
    public function getPackageData($query):array {
        $key = md5("packages{$query}getPackageData");

        $data = $this->common->getCacheData($key); // Get cached data if exists
        
        if(!$data) {
            error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
            $this->db->select('packageId as id,packageName,appName,packageDesc,packageRating,packageStatus,packageOs,packageCategory,appIconUrl');
            $this->db->from('packages');
            $this->db->like('packageName',$query);
            $data = $this->db->get()->result();

            $this->common->setCacheData($key, $data, DEFAULT_CACHE_TIME); //Set cache data 
        }
        
        return $data;
    }
    
    public function savePackageData(string $query): bool {
        $this->db->query($query);
        return ($this->db->affected_rows() != 1) ? false : true;
    }    
    
    public function createPackage($package, int $userId) {
        
        if($this->isPackageExists(trim($this->input->post('packageName')))) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = 'Package already exists!';
            $this->common->renderResponse($validationArray, 403);
        }
        
        $os = is_numeric($package)?'ios':'android';
        
        $query = "INSERT INTO packages (packageName,createdBy,updatedBy,packageOs) VALUES ('{$package}', $userId, $userId,'$os')";
        
        $this->db->query($query);
        
        if($this->db->affected_rows()) {
            $validationArray['status'] = 'success';
            $validationArray['msg'] = 'Package created successfully!';
            $this->common->renderResponse($validationArray, 200);
        }
        
        $validationArray['status'] = 'fail';
        $validationArray['msg'] = 'Something went wrong! Please try after sometime!';
        $this->common->renderResponse($validationArray, 403);
    }

    public function isPackageExists($packageName): int {
        $this->db->select('1');
        $this->db->from('packages');
        $this->db->where('packageName',$packageName);
        return $this->db->get()->num_rows();
    }
    
    public function getAllInvalidAndOldPackages():array {
        $lastDate = date('Y-m-d',strtotime('-30 day', strtotime(date('Y-m-d'))));
        
        $this->db->select('packageId,packageName');
        $this->db->from('packages');
        $this->db->where('packageStatus','valid');
        $this->db->or_where('DATE(packageUpdated)<=',$lastDate);
        return $this->db->get()->result();
    }
    
    public function updatePackageStatus(int $packageId) :bool {
        $this->db->set('packageStatus','processing');
        $this->db->where('packageId',$packageId);
        $this->db->update('packages');
        return $status = $this->db->affected_rows() >= 1 ? true : false;
    }
    
    public function serachRoId($query):array {
        $key = md5("{$query}serachRoId");
        $datas = $this->common->getCacheData($key); // Get cached data if exists
        
        if(!$datas) {
            $this->db->select('roId as id,roName,roDoc');
            $this->db->from('releaseOrder');
            
            if(is_numeric($query)) {
                $this->db->where('roId',$query);
            } else {
                $this->db->like('roName',$query);
            }
            
            $datas = $this->db->get()->result();
            
            $this->common->setCacheData($key, $datas, DEFAULT_CACHE_TIME); //Set cache data  
        }
        
        return $datas;
    }


    public function getRoIdData(array $data) {
        $orderByKey = array_keys($data['order_by'])[0];
        $orderByVal = array_values($data['order_by'])[0];
        $key = md5("{$data['table']}{$orderByKey}{$orderByVal}{$data['length']}{$data['start']}getRoIdData");
//        $totalRows = $this->getToatlUserCount($data, $orderByKey, $orderByVal);
        
        $datas = $this->common->getCacheData($key); // Get cached data if exists
            
//        if($totalRows  >= 1) {
            
            if(!$datas) {
                error_log("\n\n\n  mysql query ::: \n line ".__LINE__."\n function :: ".__FUNCTION__." \n FILE ".__FILE__."\n #######################################################",3,LOG_PATH);
                $this->db->select($data['select']);
                $this->db->from($data['table']);
                $this->db->limit($data['length'],$data['start']);
                $this->db->order_by($orderByKey, $orderByVal);
                $datas = $this->db->get()->result();
//                print_r($this->db->last_query());
//                exit();
                $this->common->setCacheData($key, $datas, DEFAULT_CACHE_TIME); //Set cache data                
            }
            
//            return array('count' => $totalRows, 'result' => $datas);
            return array('count' => count($datas), 'result' => $datas);
            
//        } else {
//            return array('count' => $totalRows, 'result' => array());
//        } 
    }
    
    public function searchRoId($query) {
        $this->db->select('roId as id,roName,roDoc');
        $this->db->from('releaseOrder');
        
        if($query) {
            
            if(is_numeric($query)) {
                $this->db->like('roId',$query);
            } else {
                $this->db->like('roName',$query);
            }
        }
        
        return $this->db->get()->result();
    }


    public function uploadDocFile($name, $path, $thumbPath, $width, $height, $needThumb = false, $needResize = false): array {
        //Load image library
        $this->load->library('image_lib');
        
        //  Set Image config      
        $config['image_library'] = 'gd2';
        $config ['upload_path'] = $path;
        $config ['allowed_types'] = 'pdf|doc';
        $config ['max_size'] = '0';
        
        $this->image_lib->initialize($config);
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($name)){ // banner
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = $this->upload->display_errors();
            $this->renderResponse($validationArray, 400);
        }

        $uploadedImage = $this->upload->data();

//        $thumbImg = $uploadedImage['raw_name'] . '_thumb' . $uploadedImage['file_ext'];
        $imgUrl = ltrim($path.$uploadedImage['file_name'],'./');
//        $thumbUrl = '';
//        
//        if($needThumb) {
//            $this->genrateThumb($uploadedImage['full_path'], $thumbPath, $height);
//            $thumbUrl = ltrim($thumbPath.$thumbImg,'./');
//        }
        
        $this->image_lib->clear();
        
        return array('file' => $imgUrl);
    }
    
    public function createRoIdData(array $data) {
        $this->db->insert('releaseOrder', $data);        
        return $this->db->insert_id();
    }
    
    public function getUserEmail(int $userId):string {
        $this->db->select('userEmail');
        $this->db->from('users');
        $this->db->where('userId',$userId);
        $result = $this->db->get()->result();
        return $result[0]->userEmail;
    }
    
    public function isEmailExists(string $userEmail):array {
        $this->db->select('userId, userEmail, userStatus');
        $this->db->from('users');
        $this->db->where('userEmail', $userEmail);
        return $this->db->get()->result();
    }
    
    public function getHeaderDataView(int $headerId): array {
        $this->db->select('headerId, headerName, headerStatus');
        $this->db->from('campHeaders');
        $this->db->where('headerId', $headerId);
        $result = $this->db->get()->result();
        
        if(empty($result)) {
            $this->common->renderResponse(array('status'=>'fail','msg'=>'Data not found!'), 200);
        }
        
        $this->common->renderResponse(array('status'=>'success','msg'=>'Package Details !', 'data' => $result), 200);
    }
    
    public function getPkgData(int $packageId): array {
        $this->db->select('packageId, packageName, appName, packageDesc, packageRating, packageStatus, packageOs, packageCategory, appIconUrl, packageVersion');
        $this->db->from('packages');
        $this->db->where('packageId', $packageId);
        $result = $this->db->get()->result();
        
        if(empty($result)) {
            $this->common->renderResponse(array('status'=>'fail','msg'=>'Data not found!'), 200);
        }
        
        $this->common->renderResponse(array('status'=>'success','msg'=>'Package Details !', 'data' => $result), 200);
    }

    public function sendEmail(int $otp, string $to) {
        $to = 'bhupendra.d@icubeswire.com';
        require_once APPPATH.'third_party/phpmailer/src/PHPMailer.php';
        require_once APPPATH.'third_party/phpmailer/src/SMTP.php';
        require_once APPPATH.'third_party/phpmailer/src/Exception.php';
        
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        
        try {            
            $mail->isSMTP();
            $mail->Host = "ssl://smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = 'bhupendra.d@icubeswire.com';
            $mail->Password = 'Herobhai@123';
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->From = 'bhupendra.d@icubeswire.com';
            $mail->FromName = 'bhupendra.d@icubeswire.com';
            $mail->Sender = 'bhupendra.d@icubeswire.com';
            $mail->addAddress($to,'Bhupendra');
            //$mail->AddAttachment('/tmp/'.$file, $file);
            $mail->isHTML(true);
            $mail->Subject = 'Wire login otp.';
            $mail->Body ='<p>OPT :: '.$otp.' </p>' ;
            print_r($mail);
            if(!$mail->send()){
                print_r(__LINE__);
                print_r($mail->ErrorInfo);
                exit();
//                    $this->createLogs(array("Mailer Error: " . $mail->ErrorInfo));
                return FALSE;
            } else {
                print_r('done');
                exit();
                return TRUE;
            }
        } catch (phpmailerException $e) {
            print_r(__LINE__);
            print_r($mail->ErrorInfo);
                exit();
//                $this->createLogs(array("Php Mailer Exception :".$e->errorMessage()));
            return TRUE;
        } catch (Exception $e) {
            print_r(__LINE__);
            print_r($mail->ErrorInfo);
                exit();
//                $this->createLogs(array("Mail Exception :".$e->errorMessage()));
        }
    }
    
    public function ktDataTables() {
//        print_r($this->input->post());
//        exit();
        $pagination = $this->input->post('pagination');
        $sorting = $this->input->post('sort');
        $start = ($pagination['page']-1)*$pagination['perpage'];
        
        $details = array(
            'search' => $this->input->post('query'),
            'select' => "",
            'table' => '',
            'start' => $start,
            'length' => ($pagination['perpage']+1),            
            'order_by' => array($sorting['field'] => $sorting['sort'])
        );
        
        return array(
            'pagination' => $pagination,
            'sorting' => $sorting,
            'start' => $start,
            'details' => $details
        );
    }
    
    public function createDataTableMeta(int $count, array $ktDataTableData) {
        
        $meta = array(
            'field'=>$ktDataTableData['sorting']['field'],
            'page'=>intval($ktDataTableData['pagination']['page']),
            'pages'=>intval(ceil($count/$ktDataTableData['pagination']['perpage'])),
            'perpage'=>intval($ktDataTableData['pagination']['perpage']),
            'sort'=>$ktDataTableData['sorting']['sort'],
            'total'=>$count
        );
        
        return $meta;
    }
    
    public function runQuery(string $query) {
        $this->db->query($query);
        return array('id' => $this->db->insert_id(), 'affectedRows' => $this->db->affected_rows());
    }
    
}