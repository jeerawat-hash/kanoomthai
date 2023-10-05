<?php
class Member extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->mysql = $this->load->database("mysql", true);
		$this->load->library("session"); 
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