<?php
class BookingSession extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->mysql = $this->load->database("mysql", true);
        $this->load->library("session");
    }

    public function CheckTableAlreadyBooked($TableID)
    {
        $Query = " 
        SELECT TableID FROM tbl_BookingSession where IsCheckOut = 0 and TableID = ?
        ";
        $queryTableID = $this->mysql->query($Query,array($TableID));
        $TableID = $queryTableID->result_array();
        return $TableID;
    }

    public function SignInAndBookingTable($CustomerName, $TableID)
    {
 
        $this->mysql->trans_start();
        $QueryString = " 
        INSERT INTO tbl_Customer (CustomerName, CreateDate)
        values(?,?)
        ";
        $query = $this->mysql->query($QueryString, array($CustomerName, date("Y-m-d H:i:s")));
        $Transaction = $this->mysql->trans_complete();
 
        $QueryLastID = " 
        SELECT CustomerID FROM tbl_Customer order by CustomerID desc limit 1
        ";
        $queryLastID = $this->mysql->query($QueryLastID);
        $LastInsertID = $queryLastID->result_array();

        $this->mysql->trans_start();
        $QueryString = " 
        INSERT INTO tbl_BookingSession (CustomerID, TableID, IsCheckOut)
        SELECT ?,TableID,0 FROM tbl_Table 
        where TableID not in (SELECT TableID FROM tbl_BookingSession where IsCheckOut = 0) 
        and TableID = ?
        ";
        $query = $this->mysql->query($QueryString, array($LastInsertID[0]["CustomerID"], $TableID));
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
