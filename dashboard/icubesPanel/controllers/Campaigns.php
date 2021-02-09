<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaigns extends CI_Controller {
    private $userPerms = array();
    private array $campBasicInfo = array();
    private int $campId;
    private array $advInfo = array();
    private array $affInfo = array();
    private array $logoFile = array();

    public function __construct() {
        
        parent::__construct(); 
        $this->load->model('campaignModel','campModel');
        $this->load->model('activityLogModel','common');
        
        $action = $this->router->fetch_method();
        
        $this->action = $action;
        
        if(!empty($_FILES['campLogo']['size']) && $_FILES['campLogo']['size'] > 0) {
            $this->logoFile = $_FILES['campLogo'];
        }
        
        $this->userPerms = $this->common->validateRequest(true);
    }   
    
    public function createCampBasicInfo() {

        if(!isset($this->userPerms['hasCampaignCreate'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to create offer!'), 403);
        }

        $validatedData = $this->campaignValidation('create');
        // Check release order exists or not 
        $isRoIdExists = $this->campModel->isRoIdExists($this->input->post('roId'));

        if(!$isRoIdExists) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Please enter a valid release order id!'),403);
        }

        $isSuccess = $this->campModel->runQuery($this->campQueryBuilder('campaigns', $validatedData));
        
        if($isSuccess['id']) {
            $this->common->renderResponse(array('status' => 'success', 'msg' => 'Offer\'s basic info saved successfully!','data'=> array('offerId'=>$isSuccess['id'])),200);
        }

        $this->common->renderResponse(array('status' => 'success', 'msg' => 'Something went wrong. Please try after sometime!'),403);

    }

    public function updateCampBasicInfo() {
    
       if(!isset($this->userPerms['hasCampaignEdit'])) {
           $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to update offer info!'), 403);
       }

    }
    
    public function createCampAdvInfo() {
        // Is user has a valid permissions to process futher
        if(!isset($this->userPerms['hasCampaignCreate'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to add company info!'), 403);
        }
        
        $this->campIdValidation();

        // Check advInfo exists or not 
        $this->advInfo = $this->campModel->getAdvInfo($this->campId, $this->input->post('advId'));

        if(!empty($this->advInfo)) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Advertiser details already exists!','data'=> array('basicInfo'=>$this->campBasicInfo[0],'advData'=>$this->advInfo[0])),200);
        }

        // if all good process further
        $this->advInfo = $this->campaignAdvValidation();

        $isSuccess = $this->campModel->runQuery($this->campQueryBuilder('campAdvs', $this->advInfo));
        
        if($isSuccess['id']) {
            $this->advInfo['campAdvsId'] = $isSuccess['id'];
            $this->common->renderResponse(array('status' => 'success', 'msg' => 'Advertiser details saved successfully!','data'=> array('basicInfo'=>$this->campBasicInfo[0],'advInfo'=>$this->advInfo)),200);
        }

        $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Someting went wrong!','data'=>array('basicInfo'=>$this->campBasicInfo[0]) ),200);
    }
    
    public function updateCampAdvInfo() {
        $query = $this->campQueryBuilder('campAdvs', $this->campaignAdvValidation());
    }
    
    public function createCampAffInfo() {

        if(!isset($this->userPerms['hasCampaignCreate'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to add company info!'), 403);
        }

        $this->campIdValidation();

        $this->advInfo = $this->campModel->getAdvInfo($this->campId);
        
        //Check aff associate with particular offer or not
        $this->affInfo = $this->campModel->getAffInfo($this->campId);

        if(!empty($this->affInfo)) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Affiliate details already exists!','data'=> array('basicInfo'=>$this->campBasicInfo[0],'advData'=>$this->advInfo[0],'affInfo'=>$this->affInfo)),200);
        }

        $affData = $this->campaignAffValidation();

        if(isset($affData['values']) && !empty($affData['values'])) {
            $query = "INSERT INTO campAffs {$affData['fields']} VALUES " .implode(",",$affData['values']);
            
            $isSuccess = $this->campModel->runQuery($query);
            
            if($isSuccess['id']) {
                $this->affInfo = $this->campModel->getAffInfo($this->campId);
                $this->common->renderResponse(array('status' => 'success', 'msg' => 'Affiliate details saved successfully!','data'=> array('basicInfo'=>$this->campBasicInfo[0],'advInfo'=>$this->advInfo, 'affInfo'=>$this->affInfo)),200);
            }

            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Someting went wrong!','data'=>array('basicInfo'=>$this->campBasicInfo[0],'advInfo'=>$this->advInfo[0])),403);
        }
        
        $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Something went wrong! Please try after sometime!','data'=> array('basicInfo'=>$this->campBasicInfo[0],'advData'=>$this->advInfo[0])),403);

    }
    
    public function updateCampAffInfo() {
        
        if(!isset($this->userPerms['hasCampaignEdit'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to add company info!'), 403);
        }

        $this->campQueryBuilder('campaigns', $this->campaignAffValidation());
    }
    
    public function createCampGeoInfo() {
        
        if(!isset($this->userPerms['hasCampaignCreate'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to add company info!'), 403);
        }

        $query = $this->campQueryBuilder('campaigns', $this->campaignGeoValidation());
    }
    
    public function updateCampGeoInfo() {
        
        if(!isset($this->userPerms['hasCampaignEdit'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to add company info!'), 403);
        }

        $query = $this->campQueryBuilder('campaigns', $this->campaignGeoValidation());
    }
    
    public function createCampCatInfo() {
        
        if(!isset($this->userPerms['hasCampaignCreate'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to add company info!'), 403);
        }

        $query = $this->campQueryBuilder('campaigns', $this->campaignCatValidation());
    }
    
    public function updateCampCatInfo() {
        
        if(!isset($this->userPerms['hasCampaignEdit'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to add company info!'), 403);
        }

        $query = $this->campQueryBuilder('campaigns', $this->campaignCatValidation());
    }
    
    public function createCampGoleInfo() {
        
        if(!isset($this->userPerms['hasCampaignCreate'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to add company info!'), 403);
        }

        $query = $this->campQueryBuilder('campaigns', $this->campaignGoleValidation());
    }
    
    public function updateCampGoleInfo() {
        
        if(!isset($this->userPerms['hasCampaignUpdate'])) {
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to add company info!'), 403);
        }

        $query = $this->campQueryBuilder('campaigns', $this->campaignGoleValidation());
    }

    private function campIdValidation() {

        // Offer id
        $this->campId = is_numeric($this->uri->segment(2))?$this->uri->segment(2):0;

        // Offer data 
        $this->campBasicInfo = $this->campModel->getCampBasicInfo($this->campId);

        // Check offer exists or not
        if(!isset($this->campBasicInfo[0])){
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Please enter a valid offer id!'), 200);
        }

        // is user have a super admin permissions 
        if(!isset($this->userPerms['isSuperAdmin'])) {
                // user can not create adv info for other user's offer
            if($this->userPerms['currentUserId'] != $this->campBasicInfo[0]->createdBy) {
                $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Seems this offer does not belongs to  you!'), 200);
            }
        }
    }

    private function isAdvInfoExists() :array {

    }

    private function isAffInfoExists() :array{

    }

    private function isCatInfoExists() :array{

    }

    private function isGoleInfoExists() :array{

    }



    public function index() {
        
        if(!$this->hasCampCreate) {            
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to create campaigns'), 403);
        }
        
        $this->campActionStep();
    }
    
    private function campActionStep() {
        
        $campaignSteps = $this->input->post('campaignStep');
        
        switch ($campaignSteps) {            
            case 'geo':
                $query = $this->campQueryBuilder('campaigns', $this->campaignGeoValidation());
                break;
            case 'gole':
                $query = $this->campQueryBuilder('campaigns', $this->campaignGoleValidation());
                break;
            case 'cat':
                $query = $this->campQueryBuilder('campaigns', $this->campaignCatValidation());
                break;
            default :
                $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Please enter a valid campaign step!'), 400);
                break;
        }
    }
    
    private function campQueryBuilder(string $table, array $data, $step = 'create') : string {
        
        $fields = '(';
        $vals = '(';
        $up = '';
        
        foreach ( $data as $key => $val ) :
            $fields .= $key.',';
            $vals .= "'$val',";
            $up .= $key . " = '$val',";
        endforeach;
        
        $fields = rtrim($fields,','). ')';
        $vals = rtrim($vals,',').')';
        $up = rtrim($up, ',');
        
        $query = "INSERT INTO {$table} {$fields} VALUES {$vals} ";

        if($step != 'create') {
            $query .= "ON DUPLICATE KEY UPDATE {$up}";
        }
        return $query;    
    }

    public function campaignView() {
        
        if(!$this->hasCampView) {            
            $this->common->renderResponse(array('status' => 'fail', 'msg' => 'Insufficient permission to view campaigns'), 403);
        }
        
        //Campaign view
        $campaignId = isset($this->uri->segments[2])?$this->uri->segments[2]:'';
        //$action = isset($this->uri->segments[3])?$this->uri->segments[3]:'';
        
        $campaignData = $this->campModel->getCampaignInfo($campaignId);
        
        if(!empty($campaignData)) {
            echo json_encode(array('status' => 'success', 'msg' => 'Campaign data fetched successfully!','data' => $campaignData[0]));
            exit();
        }
        
        echo json_encode(array('status' => 'fail', 'msg' => 'Campaign does not exists!'));
        exit();
    }
    
    public function isValidDate($date, $method = false): bool {
        $method = ($method)?$method:'isValidDate';
        
        if (preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $date)) {
            
            if(checkdate(substr($date, 5, 2), substr($date, 8, 2),substr($date, 0, 4))) {
                return true;
            } else {            
                $this->form_validation->set_message($method , 'The {field} field does not have a valid date.');
                return false;
            }
        } else {
            $this->form_validation->set_message($method , 'The {field} field does not have a valid value.');
            return false;
        }
    } 
    
    public function startEndDateValidation() {
        $startDate = strtotime($this->input->post('campStartDate'));
        $endDate = strtotime($this->input->post('campEndDate'));
        
        if($startDate>$endDate) {
            $this->form_validation->set_message('isValidEndDate' , 'End date can not be less than start date!');
            return false;
        }
        
        return true;        
    }
    
    public function isValidEndDate($date): bool {
        
        if($date) {
            $isValid = $this->isValidDate($date, 'isValidEndDate');
            
            if($isValid) {
                return $this->startEndDateValidation();
            }
            
            return $isValid;
        }
        
        return true;
    }
    
    private function campaignValidation($validationType = 'create'): array {
//        print_r($this->input->post());
//        exit();
        $this->form_validation->set_rules('roId', 'Release Order','required|numeric|min_length[1]');
        $this->form_validation->set_rules('campScope', 'Campaign Scope', 'in_list[domestic,international]');
        $this->form_validation->set_rules('campName', 'Campaign Name', 'trim|required|min_length[3]');        
        $this->form_validation->set_rules('campDescription', 'Campaign Description', 'trim|min_length[5]');        
        $this->form_validation->set_rules('campCur', 'Currency', 'trim|required|min_length[3]|max_length[5]');
        $this->form_validation->set_rules('campBasePrice', 'Base Price','min_length[1]');
        $this->form_validation->set_rules('campMaxPrice', 'Max Price', 'min_length[1]'); 
        $this->form_validation->set_rules('campStartDate', 'Start Date', 'callback_isValidDate'); 
        $this->form_validation->set_rules('campEndDate', 'End Date', 'callback_isValidEndDate');         
        $this->form_validation->set_rules('campVisibility', 'Visibility', 'in_list[public,public approved,private]'); 
        $this->form_validation->set_rules('landingUrl', 'Landing URL', 'required'); 
        $this->form_validation->set_rules('previewUrl', 'Preview URL', 'required'); 
        $this->form_validation->set_rules('hasGeoTargeting', 'Has geo targeting', 'required|in_list[0,1]');
        $this->form_validation->set_rules('hasCapping', 'Has Capping', 'required|in_list[0,1]');
        $this->form_validation->set_rules('campVertical', 'Campaign Vertical', 'required|in_list[cpm,cpi,cpc,cps]');
        
        if($this->input->post('campVertical') == 'cpi') {
            $this->form_validation->set_rules('campPackageId', 'Campaign Package Name', 'required|integer');
        }
        
        $this->form_validation->set_rules('hasGoalTargeting', 'Has goal tageting', 'required|in_list[0,1]');
        
        if($this->input->post('hasCapping') == 1) {
            $this->form_validation->set_rules('campCappingOn' ,'Campaign Capping On', 'required|in_list[overall,affiliate,both]');
            $this->form_validation->set_rules('campCappingBase', 'Campaign Capping Base', 'required|in_list[impression,click,conversion,gole]');
            $this->form_validation->set_rules('campCappingFrq', 'Campaign Frequency', 'required|in_list[daily,weekly,monthly,yearly,custom]');
            
            if($this->input->post('campCappingFrq') == 'custom') {
                $this->form_validation->set_rules('campCappingStartDate', 'Campaign Capping Start Date', 'required');
                $this->form_validation->set_rules('campCappingEndDate', 'Campaign Capping End Date', 'required');
            }
            
            $this->form_validation->set_rules('campCapping', 'Campaign Capping Limit', 'required|integer');
        } 
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }

        $campaignArray['roId'] = $this->input->post('roId');
        $campaignArray['campScope'] = $this->input->post('campScope');
        $campaignArray['hasCapping'] = $this->input->post('hasCapping');
        
        if($campaignArray['hasCapping'] == 1) {
            $campaignArray['campCappingOn'] = $this->input->post('campCappingOn');
            $campaignArray['campCappingBase'] = $this->input->post('campCappingBase');
            $campaignArray['campCappingFrq'] = $this->input->post('campCappingFrq');
            
            if($campaignArray['campCappingFrq'] == 'custom') {
                $campaignArray['campCappingStartDate'] = $this->input->post('campCappingStartDate');
                $campaignArray['campCappingEndDate'] = $this->input->post('campCappingEndDate');
            } else {
                $campaignArray['campCappingStartDate'] = '';
                $campaignArray['campCappingEndDate'] = '';
            }
            
            $campaignArray['campCapping'] = $this->input->post('campCapping');
        } else {
            $campaignArray['campCappingOn'] = '';
            $campaignArray['campCappingBase'] = '';
            $campaignArray['campCappingFrq'] = '';
            $campaignArray['campCappingStartDate'] = '';
            $campaignArray['campCappingEndDate'] = '';
            $campaignArray['campCapping'] = 0;
        }
        
        $campaignArray['campName'] = $this->input->post('campName');
        $campaignArray['campDescription'] = $this->input->post('campDescription');
//        $campaignArray['campLogo'] = ($this->input->post('campLogo'))?$this->input->post('campLogo'):'';
        $campaignArray['campCur'] = $this->input->post('campCur');
        $campaignArray['campBasePrice'] = $this->input->post('campBasePrice');
        $campaignArray['campMaxPrice'] = $this->input->post('campMaxPrice');
        $campaignArray['campStartDate'] = $this->input->post('campStartDate');
        $campaignArray['campEndDate'] = ($this->input->post('campEndDate')=='')?date('Y-m-d',strtotime('+60 day', strtotime($campaignArray['campStartDate']))):$this->input->post('campEndDate');
        $campaignArray['campStatus'] = 'pending';
        $campaignArray['campVisibility'] = $this->input->post('campVisibility');
        $campaignArray['landingUrl'] = $this->input->post('landingUrl');
        $campaignArray['previewUrl'] = $this->input->post('previewUrl');
        
        if($validationType == 'edit') {
            $campaignArray['hasRedirected'] = $this->input->post('hasRedirected');
            $campaignArray['redirectOnCamp'] = $this->input->post('redirectOnCamp');
        }
        
        $campaignArray['hasGeoTargeting'] = $this->input->post('hasGeoTargeting');
        
        if($validationType == 'create') {
            $campaignArray['createdBy'] = $this->userPerms['currentUserId'];
        }
        
        $campaignArray['campVertical'] = $this->input->post('campVertical');                
        $campaignArray['campPackageId'] = 0;
        
        if($this->input->post('campVertical') == 'cpi') {
            $campaignArray['campPackageId'] = $this->input->post('campPackageId');
        }   
        
        $campaignArray['hasGoalTargeting'] = $this->input->post('hasGoalTargeting');
        
        $campaignArray['updatedBy'] = $this->userPerms['currentUserId'];        
        
        // Resize and upload logo file
        
        if(!empty($this->logoFile)) {
            $logoPath = './uploads/offers/logo/';
            $logoThumbPath = './uploads/offers/logo/thumb/';
            
            if (!is_dir($logoPath)) {
                mkdir($logoPath, 0777, TRUE);
            }
            
            if (!is_dir($logoThumbPath)) {
                mkdir($logoThumbPath, 0777, TRUE);
            }
            
            $imageData = $this->common->uploadImage('campLogo', $logoPath, $logoThumbPath, 200, 400, true, true); //image name, path, width, height, need thumb, need resize
            $campaignArray['campLogo'] = $imageData['img'];
            $campaignArray['campLogoThumb'] = $imageData['thumb'];
        } else {
            $campaignArray['campLogo'] = '';
            $campaignArray['campLogoThumb'] = '';
        }
//        print_r($campaignArray);
//        exit();
        return $campaignArray;
    }

    private function campaignAdvValidation($type = 'create'): array {

        $this->form_validation->set_rules('advId', 'Advertiser Id', 'trim|required|integer');
        $this->form_validation->set_rules('campAdvsName', 'Advertiser Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('campAdvsVertical', 'Advertiser Verticals', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('campAdvsBasePrice', 'Advertiser Base Price', 'trim|required');
        $this->form_validation->set_rules('campAdvsMaxPrice', 'Advertiser Max Price', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $returnArray['userId'] = $this->input->post('advId');
        $returnArray['campId'] = $this->campId;
        $returnArray['campAdvsName'] = $this->input->post('campAdvsName');
        $returnArray['campAdvsVertical'] = $this->input->post('campAdvsVertical');
        $returnArray['campAdvsBasePrice'] = $this->input->post('campAdvsBasePrice');
        $returnArray['campAdvsMaxPrice'] = $this->input->post('campAdvsMaxPrice');
        $returnArray['campAdvsStatus'] = 'active';
        return $returnArray;
    }
    
    private function campaignAffValidation($type = 'create'): array {

        $this->form_validation->set_rules('affDetails', 'Affiliate details', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $affDetails = json_decode($this->input->post('affDetails'),true);
        $fields = "(userId,campId,campAffsName,campAffsVertical,campAffsBasePrice,campAffsMaxPrice,campAffsStatus)";
        $values =  array();

        foreach ($affDetails as $details) {
            
            if(!isset($details['affId'])) {
                $this->common->renderResponse('Affiliate id is required!', 400);
            }
            
            if(!isset($details['affName'])) {
                $this->common->renderResponse('Affiliate name is required!', 400);
            }
            
            if(!isset($details['affVertical'])) {
                $this->common->renderResponse('Affiliate Vertical is required!', 400);
            }
            
            $affBase = ($this->input->post('affBasePrice'))?$this->input->post('affBasePrice'):0.0;
            $affMax = ($this->input->post('affMaxPrice'))?$this->input->post('affMaxPrice'):0.0;
            
            $values[]="({$details['affId']},{$this->campId},'{$details['affName']}','{$details['affVertical']}','{$affBase}','{$affMax}','active')";

        }

        $returnArray['fields']=$fields;
        $returnArray['values'] = $values;
        return $returnArray;

    }
    
    public function isValidGeo($geo):bool {
        $isValid = is_string($geo) && is_array(json_decode($geo, true)) ? true : false;
        
        if($isValid) {
            
            $geoArray = json_decode($geo,true);
            
            if(count($geoArray) == 0) {
                $this->form_validation->set_message('isValidGeo', 'The {field} field does not have a valid value.');
                return false;
            }
            
            if(isset($geoArray[0]) && count($geoArray[0]) == 0){
                $this->form_validation->set_message('isValidGeo', 'The {field} field does not have a valid value.');
                return false;
            }
            
            return $isValid;
        }
        
        $this->form_validation->set_message('isValidGeo', 'The {field} field does not have a valid value or a valid JSON format.');
        
        return $isValid;
    }

    private function campaignGeoValidation($type = 'create'): array {
        $this->form_validation->set_rules('campId', 'Campaign Id', 'trim|required|integer');
        $this->form_validation->set_rules('geoBase', 'Geo Base', 'in_list[campWise,affWise]');
        $this->form_validation->set_rules('geoDetails', 'Geo details', 'callback_isValidGeo');
        
        if ($this->form_validation->run() == FALSE) {
            $validationArray['status'] = 'fail';
            $validationArray['msg'] = str_replace('</p>','',str_replace('<p>','',validation_errors()));
            $this->common->renderResponse($validationArray, 400);
        }
        
        $geoDetails = json_decode($this->input->post('geoDetails'),true);
        $geoBase = $this->input->post('geoBase');
        
        foreach ($geoDetails as $details) {
            
            if($geoBase == 'affWise') {
                if(!isset($details['affId'])) {
                    $this->common->renderResponse(array('status'=>'fail','msg'=>'Affiliate id is required!'), 400);
                }
            }
            
            if(!isset($details['affGeo'])) {
                $this->common->renderResponse(array('status'=>'fail','msg'=>'Affiliate wise geo is required!'), 400);
            }
            
            $returnArray['userId'] = 0; 
            
            if($geoBase == 'affWise') {
                $returnArray['userId'] = $details['affId'];
            }
            
            $returnArray['campId'] = $this->input->post('campId');
            $returnArray['campGeo'] = json_encode($details['affGeo']);
            
            $isSuccess = $this->campModel->runQuery($this->campQueryBuilder('campGeos',$returnArray));
        }
        
//        if($isSuccess['id']) {
            $this->common->renderResponse(array('status' => 'success', 'msg' => 'Data saved successfully!','data'=> array('campaignId'=> $this->input->post('campId'))),200);
//        }  
    }
    
    private function campaignGoleValidation($type = 'create'): array {
        return array();
    }
    
    private function campaignCatValidation($type = 'create'): array {
        return array();
    }
    
}