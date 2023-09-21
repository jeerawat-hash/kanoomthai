<?php
class BookingSession extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->mssql = $this->load->database("mysql", true);
		$this->load->library("session"); 
	}

	 
public function BookingTable($CustomerID,$TableID)
{
    $this->mssql->trans_start();
    $QueryString = " 
    INSERT INTO tbl_BookingSession (CustomerID, TableID, IsCheckOut)
    SELECT ?,TableID,0 FROM tbl_Table 
    where TableID not in (SELECT TableID FROM tbl_BookingSession where IsCheckOut = 0) 
    and TableID = ?
    ";
    $query = $this->mssql->query($QueryString, array($CustomerID,$TableID));
    $Transaction = $this->mssql->trans_complete();
    $insert_id = $this->mssql->insert_id();
    $Data = array("Status" => (($Transaction == true) ? 1 : 0) , "InsertID" => $insert_id);
    $this->mssql->close();
    return $Data;
}

	
}
