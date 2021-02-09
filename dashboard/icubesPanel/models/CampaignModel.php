<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class CampaignModel extends CI_Model {
    
    public function createCampaign(Array $campaignData): bool {
        
        return true;
    }
    
    public function editCampaign(Array $campaignData, int $campaignId): bool {
        
        return true;
    }
    
    public function getCampaignInfo(int $campaignId): array {        
        $this->db->select('campaignId, campaignName, campaingLogo, campaignCurrency, advertiserId, advertiserName, advertiserVertical, advertiserBasePrice, affiliatesInfo, affiliateVertical, affiliateBasePrice, campaignCategoryId, campaignCategory, campaignSubCategory, campaignStartDate, campaignEndDate, campaignVisibility, campaignStatus, campaignDescription, created, createdBy, updated, updatedBy');
        $this->db->from('campaigns');
        $this->db->where("campaignId", $campaignId);
        return $this->db->get()->result();
    }
    
    public function runQuery(string $query) {
        $this->db->query($query);
        return array('id' => $this->db->insert_id(), 'affectedRows' => $this->db->affected_rows());
    }
    
    public function isRoIdExists(int $roId):int {
        $this->db->select('1');
        $this->db->from('releaseOrder');
        $this->db->where('roId',$roId);
        return $this->db->get()->num_rows();
    }
}