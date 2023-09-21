<?php
 
class Data extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model("BookingSession");
        $this->load->model("Goodsitem");
        $this->load->library("session");
    }
	public function index()
	{
		echo "1";
	}
    public function GetDataAllGoodsItem()
	{
        $result = $this->Goodsitem->GetDataAllGoodsItem();
        print_r($result);
    }
    public function InsertBookSession()
    {
        
        $result = $this->BookingSession->BookingTable(1,1);
        print_r($result);

    }
    
}
