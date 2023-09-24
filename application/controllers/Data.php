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
    public function SendOrder()
    {
        echo json_encode($_POST);
    }
    public function GetDataAllGoodsItemForSale()
	{
        $result = $this->Goodsitem->GetDataAllGoodsItemForSale(); 
        echo json_encode($result);
    }
    public function GetDataAvailableTable()
	{
        $result = $this->BookingSession->GetDataAvailableTable();
        echo json_encode($result);
    }
    
    public function SignIn()
    { 
        $CustomerName = $_POST["CustomerName"];
        $TableID = $_POST["TableID"];  
        $result = $this->BookingSession->CheckTableAlreadyBooked($TableID);
        if(count($result) > 0){ 
            echo "test";
            exit();
        }
        $resultSignIn = $this->BookingSession->SignInAndBookingTable($CustomerName,$TableID); //CustomerID,TableID
        $CustomerInfo = $this->BookingSession->GetCustomerInformationByBookingSession($resultSignIn["BookingSessionID"]);
 
        // ///// Session Create /////
        $CusInfo["BookingSessionID"] = $CustomerInfo[0]["BookingSessionID"];
        $CusInfo["CustomerID"] = $CustomerInfo[0]["CustomerID"];
        $CusInfo["CustomerName"] = $CustomerInfo[0]["CustomerName"];
        $CusInfo["TableID"] = $CustomerInfo[0]["TableID"];
        $CusInfo["TableName"] = $CustomerInfo[0]["TableName"];
		$this->session->set_userdata($CusInfo);

        // echo json_encode( array( 
        //     "BookingSessionID" => $CusInfo["BookingSessionID"],
        //     "CustomerID" => $CusInfo["CustomerID"],
        //     "CustomerName" => $CusInfo["CustomerName"],
        //     "TableID" => $CusInfo["TableID"],
        //     "TableName" => $CusInfo["TableName"],
        //  ));
        ///// Session Create /////
    }
    public function SignOut()
    {  
        $BookingSessionID = $this->session->userdata("BookingSessionID"); 
        $CustomerID = $this->session->userdata("CustomerID"); 
        $CustomerName = $this->session->userdata("CustomerName"); 
        $TableID = $this->session->userdata("TableID"); 
        $TableName = $this->session->userdata("TableName"); 
        $this->BookingSession->SignOutWithBookingSessionID($BookingSessionID);
        ///// Session Destroy /////
        $this->session->sess_destroy(); 
        ///// Session Destroy /////
    }
    public function CheckLogin()
    {
        $BookingSessionID = $this->session->userdata("BookingSessionID"); 
        $CustomerID = $this->session->userdata("CustomerID"); 
        $CustomerName = $this->session->userdata("CustomerName"); 
        $TableID = $this->session->userdata("TableID"); 
        $TableName = $this->session->userdata("TableName"); 

        if($BookingSessionID != ""){
            echo json_encode(array( "Status" => "Success", "Data" => array( 
                "BookingSessionID" => $BookingSessionID,
                "CustomerID" => $CustomerID,
                "CustomerName" => $CustomerName,
                "TableID" => $TableID,
                "TableName" => $TableName,
             )));
        }else{
            echo json_encode(array( "Status" => "Error", "Data" => array( )));
        }
 
    }
 
    
    
}
