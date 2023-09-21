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
    public function SignIn()
    { 
        // $CustomerName = $_POST["CustomerName"];
        // $TableID = $_POST["TableID"]; 

        $CustomerName = "โหล";
        $TableID = "1";
        
        $result = $this->BookingSession->CheckTableAlreadyBooked($TableID);

        // $result = $this->BookingSession->SignInAndBookingTable($CustomerName,1); //CustomerID,TableID
        print_r($result);
    }
    
}
