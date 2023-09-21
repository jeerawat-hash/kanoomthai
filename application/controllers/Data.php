<?php
 
class Data extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
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
    
}
