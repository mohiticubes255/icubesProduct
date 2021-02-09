<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
    private array $roDocFile = array();
    
    public function __construct() {
        parent::__construct(); 
        $this->load->model('activityLogModel','common');
        
//        $action = $this->router->fetch_method();
//        $exludeValidationMethods = array();
//        
//        if(!in_array($action, $exludeValidationMethods)) {
//            $this->action = $action;
//            
//            if($action == 'userLogin' || $action == 'userRegistration') {            
//                $this->common->validateRequest(false);    
//            } else {
//                $this->userPerms = $this->common->validateRequest(true);
//            }
//        }
        
        if(!empty($_FILES['roDoc']['size']) && $_FILES['roDoc']['size'] > 0) {
            $this->roDocFile = $_FILES['roDoc'];
        }        
    } 
    
    public function createOfferHeaders($step = null) {
        
        $this->form_validation->set_rules('headerName[]', 'Header Name', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $headers = $this->input->post('headerName');
        
        if(gettype($headers) != 'array') {
            $this->common->renderResponse(array('status'=> 'fail','msg'=>'Please enter an array'), 400);
        }
        
        if(empty($headers)) {
            $this->common->renderResponse(array('status'=> 'fail','msg'=>'Header name cann\'t be empty!'), 400);
        }
        
        $userId = 28;
        $headData = array();  
        $query = 'INSERT INTO campHeaders (headerName, createdBy, updatedBy) VALUES ';
        $queryUp = ' ON DUPLICATE KEY UPDATE headerName = VALUES(headerName), updatedBy = VALUES(updatedBy)';
        
        foreach ($headers as $head) {
            $headName = trim(strtolower($head));
            $headData[] = "('{$headName}','{$userId}','{$userId}')";
        }
        
        $insQuery = $query.implode(',', $headData).$queryUp;
        
        $queryData = $this->common->runQuery($insQuery);
        
        $msg = "{$queryData['affectedRows']} rows inserted successfully";            
        $data = array('affectedRows' => $queryData['affectedRows'], 'headerId' => $queryData['id']);            
                
        $this->common->renderResponse(array('status' => 'success', 'msg' => $msg,'data'=> $data),200);
    }
    
    public function getHeaderlists() {
        $ktDataTableData = $this->common->ktDataTables();
        
        $ktDataTableData['details']['select'] = "headerId, headerName, headerStatus";
        $ktDataTableData['details']['table'] = 'campHeaders';        
        // custom common function getRoIdData 
        
        $lists = $this->common->getRoIdData($ktDataTableData['details']);
        
        $count = (isset($lists['count']))?$lists['count']:0;
        $isNext = ($ktDataTableData['pagination']['perpage']>$count)?'no':'yes';
        $listData = json_decode(json_encode($lists['result']),true);  
        
        $meta = $this->common->createDataTableMeta($count, $ktDataTableData);
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'done','isNext' => $isNext, 'data' => $listData, 'meta' => $meta), 200);
    }
    
    public function searchOfferHeaders() {
        $this->form_validation->set_rules('query','Query','required|min_length[2]');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $packageData = $this->common->getHeaderData($this->input->post('query'));
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'Package Details!', 'data' => $packageData), 200);
    }
    
    public function viewOfferHeaders() {
        $pkgId = isset($this->uri->segments[3]) ? $this->uri->segments[3] : '';
        
        $this->common->getHeaderDataView($pkgId);
    }
    
    public function editOfferHeaders() {
        $headerId = isset($this->uri->segments[3]) ? $this->uri->segments[3] : '';        
        $this->createOfferHeaders('update');
    }

    public function viewPackageData() {
        $pkgId = isset($this->uri->segments[2]) ? $this->uri->segments[2] : '';
        
        $this->common->getPkgData($pkgId);        
    }

    public function searchPackageDetails() {
        $this->form_validation->set_rules('query','Query','required|min_length[2]');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $packageData = $this->common->getPackageData($this->input->post('query'));
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'Package Details!', 'data' => $packageData), 200);
    }
    
    public function getPackageLists() {
        
        $ktDataTableData = $this->common->ktDataTables();
        
        $ktDataTableData['details']['select'] = "packageId, packageName, appName, packageDesc, packageRating, packageStatus, packageOs, packageCategory, appIconUrl, packageVersion";
        $ktDataTableData['details']['table'] = 'packages';        
        // custom common function getRoIdData 
        $lists = $this->common->getRoIdData($ktDataTableData['details']);
//        print_r($lists);
//        exit();
        $count = (isset($lists['count']))?$lists['count']:0;
        $isNext = ($ktDataTableData['pagination']['perpage']>$count)?'no':'yes';
        $listData = json_decode(json_encode($lists['result']),true);  
        
        $meta = $this->common->createDataTableMeta($count, $ktDataTableData);
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'done','isNext' => $isNext, 'data' => $listData, 'meta' => $meta), 200);
    }
    
    public function setPackageDetails(string $query):bool {  
        return $this->common->savePackageData($query);
    }
    
    public function createPackgeName() {
        
        $this->form_validation->set_rules('packageName','Package Name','required|min_length[2]');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $userId = 1;
        
        $this->common->createPackage(trim($this->input->post('packageName')), $userId);
        
    }

    public function packageScraper() { 
        
//        Older than 30 days 
        $allPackages = $this->common->getAllInvalidAndOldPackages();
        
        if(empty($allPackages)) {
            $this->common->renderResponse(array('status' => 'success', 'msg' => 'No new package found!'), 200);
        }
        
        //Scraper server ip
        $url = 'http://localhost:3000/api';
        
        foreach ($allPackages as $pkg) {
            
//            set status invalid to processing            
            $this->common->updatePackageStatus($pkg->packageId);
            
            $pacUrl = 'https://play.google.com/store/apps/details?id='.$pkg->packageName;
            
            if(is_numeric($pkg->packageName)) {
                $pacUrl = 'https://itunes.apple.com/app/id'.$pkg->packageName;
            } 
            
//            $pacUrl ='https://itunes.apple.com/us/app/dumb-ways-to-die-2-the-games/id1475469727';
            $ch = curl_init( $url );  
            $payload = json_encode(array("url"=> array($pacUrl)));
        
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload );
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            # Return response instead of printing.
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            # Send request.
            $result = curl_exec($ch);
            curl_close($ch);
            
            if(!empty($result)) {
            
                $packageData = json_decode($result,TRUE);
                $packageDetails = array();
                $packageHeaders = "(packageId,packageName,appName,packageDesc,packageCategory,packageRating,packageStatus, packageOs,appIconUrl,packageVersion,createdBy,updatedBy)";

                foreach ($packageData as $pkgData) {
                    
                    if(gettype($pkgData) != 'string') {
                        $os = strtolower($pkgData['os']);
                        $pkgName = trim($pkgData['pkgName']);
                        $appName = trim($pkgData['appName']);
                        $cat = strtolower(trim($pkgData['category']));
                        $appIconUrl = trim($pkgData['appIconUrl']);

                        $packageDetails[] = "({$pkg->packageId},'{$pkgName}','{$appName}','{$pkgData['description']}','{$cat}','{$pkgData['rating']}','success','{$os}','{$appIconUrl}','{$pkgData['version']}',1,1)";
                        $duplicate = " ON DUPLICATE KEY UPDATE appName = VALUES(appName), packageStatus = VALUES(packageStatus), "
                                . "packageCategory = VALUES(packageCategory), packageRating = VALUES(packageRating),"
                                . "packageVersion = VALUES(packageVersion), packageOs = VALUES(packageOs), packageDesc = VALUES(packageDesc), "
                                . "appIconUrl = VALUES(appIconUrl)";

                        if(count($packageDetails) >= 100) {
                            $query = "INSERT INTO packages {$packageHeaders} VALUES ".implode($packageDetails)."{$duplicate}";
                            $this->setPackageDetails($query);
                            $packageDetails = array();
                            $query = '';
                        }
                        
                    } else {
                        $query = "UPDATE packages set packageStatus = 'invalid' where packageId = {$pkg->packageId}";
                        $this->setPackageDetails($query);
                    }
                }
            
                if(count($packageDetails)>0) {
                    $query = "INSERT INTO packages {$packageHeaders} VALUES ".implode($packageDetails)."{$duplicate}";
                    $this->setPackageDetails($query);
                }                
            }
        }  
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'Package data saved successfully!'), 200);
    }
    
    public function getRoIdData() {
        $queryParam = $this->uri->segments[2];
        $roIdData = $this->common->serachRoId($queryParam);
        $msg = 'Data found successfully!';
        
        if(empty($roIdData)) {
            $msg = 'No data found!';
        }
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => $msg, 'data' => $roIdData), 200);
    }
    
    public function searchRoID() {       
        
        $this->form_validation->set_rules('query','Query param','required|min_length[2]');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $queryParam = $this->input->post('query');
        
        $roIdData = $this->common->serachRoId($queryParam);
        $msg = 'Data found successfully!';
        
        if(empty($roIdData)) {
            $msg = 'No data found!';
        }
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => $msg, 'data' => $roIdData), 200);
    }
    
    public function createRoId() {
        $this->roIdCreateValidation();
        
        $filePath = './uploads/releaseOrder/files/';
        $fileThumbPath = './uploads/releaseOrder/files/thumb/';

        if (!is_dir($filePath)) {
            mkdir($filePath, 0777, TRUE);
        }

//        if (!is_dir($fileThumbPath)) {
//            mkdir($fileThumbPath, 0777, TRUE);
//        }
        
        $fileData = $this->common->uploadDocFile('roDoc', $filePath, $fileThumbPath, 200, 400, false, false); //image name, path, width, height, need thumb, need resize
        
        $roData = array('roName'=> trim($this->input->post('roName')), 'roDoc' => $fileData['file'], 'createdBy' => 1, 'updatedBy' => 1);
        
        $roid = $this->common->createRoIdData($roData);
        
        if($roid) {
            $this->common->renderResponse(array('status' => 'success', 'msg' => 'Release order created succssfully! ', 'data' => array('roId'=>$roid)), 200);
        }
        
        $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Something went wrong! Please try after sometime!'), 403);
    }
    
    private function roIdCreateValidation($step = 'create') {
        
        if(empty($this->roDocFile)) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Please select a valid documents file!'), 403);
        }
        
        $this->form_validation->set_rules('roName','Release order name','required|min_length[2]');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
    }

    public function getAllRoIdsData() {
        
        $ktDataTableData = $this->common->ktDataTables();
        
        $ktDataTableData['details']['select'] = "roId as id,roName,roDoc";
        $ktDataTableData['details']['table'] = 'releaseOrder';
        
        $lists = $this->common->getRoIdData($ktDataTableData['details']);
        
        $count = (isset($lists['count']))?$lists['count']:0;
        $isNext = ($ktDataTableData['pagination']['perpage']>$count)?'no':'yes';
        $listData = json_decode(json_encode($lists['result']),true);  
        
        $meta = $this->common->createDataTableMeta($count, $ktDataTableData);
        
        $this->common->renderResponse(array('status' => 'success', 'msg' => 'done','isNext' => $isNext, 'data' => $listData, 'meta' => $meta), 200);        
    }
}