<?php
class BookingSession extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->mysql = $this->load->database("mysql", true);
        $this->load->library("session");
    }


    public function BookingTable($CustomerID, $TableID)
    {
        $this->mysql->trans_start();
        $QueryString = " 
        INSERT INTO tbl_BookingSession (CustomerID, TableID, IsCheckOut)
        SELECT ?,TableID,0 FROM tbl_Table 
        where TableID not in (SELECT TableID FROM tbl_BookingSession where IsCheckOut = 0) 
        and TableID = ?
        ";
        $query = $this->mysql->query($QueryString, array($CustomerID, $TableID));
        $Transaction = $this->mysql->trans_complete();

        $QueryLastID = " 
        SELECT BookingSessionID FROM tbl_BookingSession order by BookingSessionID desc limit 1
        ";
        $queryLastID = $this->mysql->query($QueryLastID);
        $LastInsertID = $queryLastID->result_array();

        $Data = array("Status" => (($Transaction == true) ? 1 : 0), "InsertID" => $LastInsertID[0]["BookingSessionID"]);
        $this->mysql->close();
        return $Data;
    }
}
