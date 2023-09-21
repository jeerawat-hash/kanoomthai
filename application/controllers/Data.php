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
        $CustomerName = "PP";
        $TableID = "1"; 
        $result = $this->BookingSession->CheckTableAlreadyBooked($TableID);
        if(count($result) > 0){ 
            echo "test";
            exit();
        }
        $resultSignIn = $this->BookingSession->SignInAndBookingTable($CustomerName,$TableID); //CustomerID,TableID

        // print_r($resultSignIn);

        $CustomerInfo = $this->BookingSession->GetCustomerInformationByBookingSession($resultSignIn["BookingSessionID"]);
        print_r($CustomerInfo);

        // ///// Session Create /////
        // $CusInfo["BookingSessionID"] = $CustomerInfo[0]["BookingSessionID"];
        // $CusInfo["CustomerID"] = $CustomerInfo[0]["CustomerID"];
        // $CusInfo["CustomerName"] = $CustomerInfo[0]["CustomerName"];
        // $CusInfo["TableID"] = $CustomerInfo[0]["TableID"];
        // $CusInfo["TableName"] = $CustomerInfo[0]["TableName"];
		// $this->session->set_userdata($CusInfo);
        ///// Session Create /////
    }
    public function SignOut()
    {  
        $BookingSessionID = $this->session->userdata("BookingSessionID"); 
        $this->BookingSession->SignOutWithBookingSessionID($BookingSessionID);
        ///// Session Destroy /////
        $this->session->sess_destroy(); 
        ///// Session Destroy /////
    }
    public function CheckSession()
    {
        print_r($this->session->userdata());
    }
    public function test()
    {
        $aa = $this->BookingSession->GetCustomerInformationByBookingSession(11);
        print_r($aa);
    }
    
    
}
