<?php
require_once "BaseController.php";

class Offers extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function manage()
    {
        require_once "{$this->_base_path}/pages/offers/manage_offers.php";
    }

    public function create()
    {
        require_once "{$this->_base_path}/pages/offers/create_offers.php";
    }
    public function list()
    {
        require_once "{$this->_base_path}/pages/offers/list_offers.php";
    }

    public function view($offerid = false)
    {
        if ($offerid) {
            require_once "{$this->_base_path}/pages/offers/view_offer.php";
        }
    }

    public function new()
    {
        require_once "{$this->_base_path}/pages/offers/offer_new.php";
    }

    public function headers()
    {
        require_once "{$this->_base_path}/pages/offers/offer_headers.php";
    }

    public function mapping()
    {
        require_once "{$this->_base_path}/pages/offers/offer_mapping.php";
    }
}
