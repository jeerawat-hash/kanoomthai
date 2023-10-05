<?php
class Member extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->mysql = $this->load->database("mysql", true);
		$this->load->library("session"); 
	}

    public function ManagementLogin($Username,$Password)
    {
        $ReturnArray = array(); 
        $QueryString1 = " 
        SELECT MemberID,MemberName,Username,Password,IsAdmin FROM tbl_Member where Username = ? and Password = ?
            ";
        $query1 = $this->mysql->query($QueryString1, array($Username,md5($Password)));
        $Data1 = $query1->result_array();
   
        $DataAuthorize = array();
        $DataAuthorize[] = "Dashboard";
        $DataAuthorize[] = "Maintain";
        if($Data1[0]["IsAdmin"] == "1"){
            $DataAuthorize[] = "Account";
        } 
        $ReturnArray["MemberID"] = $Data1[0]["MemberID"];
        $ReturnArray["MemberName"] = $Data1[0]["MemberName"];
        $ReturnArray["MemberAuthorize"] = $DataAuthorize; 
        $this->mysql->close();
        return $ReturnArray;
    }

    public function InsertSystemMember($MemberName,$Username,$Password,$IsAdmin)
	{
		$this->mysql->trans_start();
        $QueryString = " 
        INSERT INTO tbl_Member (MemberName, Username, Password, IsAdmin) VALUES (?, ?, ?, ?);
        ";
        $query = $this->mysql->query($QueryString, array($MemberName,$Username,md5($Password),$IsAdmin));
        $Transaction = $this->mysql->trans_complete(); 
		$Data = array("Status" => (($Transaction == true) ? 1 : 0));
        $this->mysql->close();
        return $Data;
	}
    public function EditSystemMember($MemberID,$MemberName,$Username,$Password,$IsAdmin)
	{
		$this->mysql->trans_start();
        $QueryString = " 
        UPDATE tbl_Member SET 
        MemberName = ?,
        Username = ?,
        Password = ?,
        IsAdmin = ?
        WHERE MemberID = ?
        ";
        $query = $this->mysql->query($QueryString, array($MemberName,$Username,md5($Password),$IsAdmin,$MemberID));
        $Transaction = $this->mysql->trans_complete(); 
		$Data = array("Status" => (($Transaction == true) ? 1 : 0));
        $this->mysql->close();
        return $Data;
	}
    public function GetDataAllSystemMember()
	{
		$QueryString = "  
            SELECT MemberID,MemberName,Username,IsAdmin FROM tbl_Member where MemberID != 9999
        ";
		$query = $this->mysql->query($QueryString);
		$Sale = $query->result_array();
		$this->mysql->close();
		return $Sale;
	}
 

	
}

?>