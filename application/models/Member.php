<?php
class Member extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->mysql = $this->load->database("mysql", true);
		$this->load->library("session"); 
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