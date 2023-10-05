<?php
 
class Data extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model("BookingSession");
        $this->load->model("Goodsitem");
        $this->load->model("Member");
        $this->load->library("session");
    }
	public function index()
	{
		echo "1";
	}
    public function ManagementLogin()
	{  
		$ResponseData = array("IsSuccess" => 0, "Data" => null);
		$ResponseData["Data"] = $this->Member->ManagementLogin($_POST["Username"],$_POST["Password"]);
		if( $ResponseData["Data"]["MemberID"] != "" ){
			$ResponseData["IsSuccess"] = 1;
			$this->session->set_userdata($ResponseData["Data"]);
		}
		echo json_encode($ResponseData);
	}

    public function InsertSystemMember()
	{    
        $result = $this->Member->InsertSystemMember($_POST["MemberName"],$_POST["Username"],$_POST["Password"],$_POST["IsAdmin"]);
		echo json_encode(array("IsSuccess" => 1 ));  
	}
    public function EditSystemMember()
	{    
        $result = $this->Member->EditSystemMember($_POST["MemberID"],$_POST["MemberName"],$_POST["Username"],$_POST["Password"],$_POST["IsAdmin"]);
		echo json_encode(array("IsSuccess" => 1 ));  
	}
    public function GetDataAllSystemMember()
	{     
        $result = $this->Member->GetDataAllSystemMember();
        echo json_encode($result);
    }
  


    //// Backend ////
    public function DeleteGoodsItems()
	{    
        $this->Goodsitem->DeleteGoodsItems($_POST["GoodsItemID"]);
		echo json_encode(array("IsSuccess" => 1 ));  
    }
    public function InsertGoodsItems()
	{   
		$UploadFile = $_FILES;
		$UpLoadFile_Name = $UploadFile['GoodsImageUpload']['name'];
		$UpLoadFile_Type = $UploadFile['GoodsImageUpload']['type'];
		$UpLoadFile_Tmp_Name = $UploadFile['GoodsImageUpload']['tmp_name'];
		$UpLoadFile_Size = $UploadFile['GoodsImageUpload']['size']; 
		$GoodsImageUpload = "/var/www/html/UploadFiles/".date("d-m-Y-H-i-s")."-".$UpLoadFile_Size;
		$PostData = $_POST;
        $GoodsFiles = "http://203.156.9.157/UploadFiles/".date("d-m-Y-H-i-s")."-".$UpLoadFile_Size;
		$IsSuccess = 0;  

		if($UpLoadFile_Type == "image/jpeg"){ 
			move_uploaded_file($UpLoadFile_Tmp_Name, $GoodsImageUpload.".jpeg"); 
            $this->Goodsitem->InsertGoodsItems($PostData["GoodsItemName"],$PostData["StockAmount"],$PostData["PricePerUnit"],$PostData["Unit"],$GoodsFiles.".jpeg");
		}else
		if($UpLoadFile_Type == "image/jpg"){ 
            move_uploaded_file($UpLoadFile_Tmp_Name, $GoodsImageUpload.".jpg");
            $this->Goodsitem->InsertGoodsItems($PostData["GoodsItemName"],$PostData["StockAmount"],$PostData["PricePerUnit"],$PostData["Unit"],$GoodsFiles.".jpg");
		}else
		if($UpLoadFile_Type == "image/png"){
			move_uploaded_file($UpLoadFile_Tmp_Name, $GoodsImageUpload.".png"); 
            $this->Goodsitem->InsertGoodsItems($PostData["GoodsItemName"],$PostData["StockAmount"],$PostData["PricePerUnit"],$PostData["Unit"],$GoodsFiles.".png");
		}  

		echo json_encode(array("IsSuccess" => $IsSuccess ));  

	}
    public function EditGoodsItems()
	{   
		$UploadFile = $_FILES;
		$UpLoadFile_Name = $UploadFile['GoodsImageUpload']['name'];
		$UpLoadFile_Type = $UploadFile['GoodsImageUpload']['type'];
		$UpLoadFile_Tmp_Name = $UploadFile['GoodsImageUpload']['tmp_name'];
		$UpLoadFile_Size = $UploadFile['GoodsImageUpload']['size']; 
		$GoodsImageUpload = "/var/www/html/UploadFiles/".date("d-m-Y-H-i-s")."-".$UpLoadFile_Size;
		$PostData = $_POST;  
        $GoodsFiles = "http://203.156.9.157/UploadFiles/".date("d-m-Y-H-i-s")."-".$UpLoadFile_Size;
		$IsSuccess = 0; 
         
		if($UpLoadFile_Type == "image/jpeg"){ 
			move_uploaded_file($UpLoadFile_Tmp_Name, $GoodsImageUpload.".jpeg"); 
            $this->Goodsitem->EditGoodsItems($PostData["GoodsItemID"],$PostData["GoodsItemName"],$PostData["StockAmount"],$PostData["PricePerUnit"],$PostData["Unit"],$GoodsFiles.".jpeg"); 
		}else
		if($UpLoadFile_Type == "image/jpg"){ 
            move_uploaded_file($UpLoadFile_Tmp_Name, $GoodsImageUpload.".jpg");
            $this->Goodsitem->EditGoodsItems($PostData["GoodsItemID"],$PostData["GoodsItemName"],$PostData["StockAmount"],$PostData["PricePerUnit"],$PostData["Unit"],$GoodsFiles.".jpg");
		}else
		if($UpLoadFile_Type == "image/png"){
			move_uploaded_file($UpLoadFile_Tmp_Name, $GoodsImageUpload.".png"); 
            $this->Goodsitem->EditGoodsItems($PostData["GoodsItemID"],$PostData["GoodsItemName"],$PostData["StockAmount"],$PostData["PricePerUnit"],$PostData["Unit"],$GoodsFiles.".png");
		}  
		echo json_encode(array("IsSuccess" => $IsSuccess ));  
	}
 
    public function GetDataAllGoodsItemStock()
    {  
        $result = $this->Goodsitem->GetDataAllGoodsItemStock();
        echo json_encode($result);
    } 
    public function SetReceiveOrder()
    {  
        $MemberID = $this->session->userdata("MemberID");
        $MemberName = $this->session->userdata("MemberName");
        $MemberAuthorize = $this->session->userdata("MemberAuthorize");

        $result = $this->BookingSession->SetReceiveOrder($_POST["BookingSessionID"],$MemberID);
        echo json_encode($result);
    } 
    public function GetDataAllOrderPending()
    {  
        $result = $this->BookingSession->GetDataAllOrderPending();
        echo json_encode($result);
    }
    public function GetDataOrderPendingDetail()
    {  
        $result = $this->BookingSession->GetDataOrderPendingDetail($_POST["BookingSessionID"]);
        echo json_encode($result);
    }
 
    //// Backend ////



    public function GetDataSaleFullInvoice()
    { 
        $BookingSessionID = $this->session->userdata("BookingSessionID"); 
        $CustomerID = $this->session->userdata("CustomerID"); 
        $CustomerName = $this->session->userdata("CustomerName"); 
        $TableID = $this->session->userdata("TableID"); 
        $TableName = $this->session->userdata("TableName");  
        $result = $this->BookingSession->GetDataSaleFullInvoice($BookingSessionID);
        echo json_encode($result);
    }
    public function GetDataSaleOrderDetail()
    { 
        $BookingSessionID = $this->session->userdata("BookingSessionID"); 
        $CustomerID = $this->session->userdata("CustomerID"); 
        $CustomerName = $this->session->userdata("CustomerName"); 
        $TableID = $this->session->userdata("TableID"); 
        $TableName = $this->session->userdata("TableName");  
        $result = $this->BookingSession->GetDataSaleOrderDetail($BookingSessionID);
        echo json_encode($result);
    }
    public function GetDataPendingOrderDetail()
    { 
        $BookingSessionID = $this->session->userdata("BookingSessionID"); 
        $CustomerID = $this->session->userdata("CustomerID"); 
        $CustomerName = $this->session->userdata("CustomerName"); 
        $TableID = $this->session->userdata("TableID"); 
        $TableName = $this->session->userdata("TableName");  
        $result = $this->BookingSession->GetDataPendingOrderDetail($BookingSessionID);
        echo json_encode($result);
    }
    public function SendOrder()
    { 
        $BookingSessionID = $this->session->userdata("BookingSessionID"); 
        $CustomerID = $this->session->userdata("CustomerID"); 
        $CustomerName = $this->session->userdata("CustomerName"); 
        $TableID = $this->session->userdata("TableID"); 
        $TableName = $this->session->userdata("TableName");  
        $result = $this->Goodsitem->InsertDataOrder($BookingSessionID,$_POST);  
        echo json_encode($result);
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
