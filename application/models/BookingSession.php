<?php
class BookingSession extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->mysql = $this->load->database("mysql", true);
        $this->load->library("session");
    }
    public function GetDataAllOrderPending()
	{ 
		$QueryString = " 
        select a.BookingSessionID,
        c.TableName,
        b.CustomerName,
        (
            select count(*) as OrderPending from tbl_GoodsOrder 
        where BookingSessionID = a.BookingSessionID and MemberID = 9999 and IsCancel = 0
        ) as OrderPending,
        (
                select count(*) as OrderSuccess from tbl_GoodsOrder 
        where BookingSessionID = a.BookingSessionID and MemberID != 9999 and IsCancel = 0
        ) as OrderSuccess
         from tbl_BookingSession a 
        join tbl_Customer b on a.CustomerID = b.CustomerID
        join tbl_Table c on a.TableID = c.TableID
        where a.IsCheckOut = 0
        ";
		$query = $this->mysql->query($QueryString);
		$Sale = $query->result_array();
		$this->mysql->close();
		return $Sale;
	}
    public function GetDataOrderPendingDetail($BookingSessionID)
	{ 
		$QueryString = " 
        SELECT f.TableName,e.CustomerName,a.GoodsOrderID,a.BookingSessionID,c.GoodsItemID,c.GoodsItemName,c.Unit,c.PricePerUnit,(b.Amount * c.PricePerUnit) as TotalChange FROM tbl_GoodsOrder a
        join tbl_GoodsOrderDetail b on a.GoodsOrderID = b.GoodsOrderID
        join tbl_GoodsItem c on b.GoodsItemID = c.GoodsItemID 
        join tbl_BookingSession d on a.BookingSessionID = d.BookingSessionID
        join tbl_Customer e on d.CustomerID = e.CustomerID
        join tbl_Table f on d.TableID = f.TableID
        where a.BookingSessionID = ? and a.MemberID = 9999 and a.IsCancel = 0
        ";
		$query = $this->mysql->query($QueryString,array($BookingSessionID));
		$Sale = $query->result_array();
		$this->mysql->close();
		return $Sale;
	}
    public function GetDataSaleFullInvoice($BookingSessionID)
	{ 
		$QueryString = " 
        select GoodsItemID,GoodsItemName,PricePerUnit,Unit,sum(Amount) as Amount,(sum(Amount) * PricePerUnit) as TotalChange from (
            SELECT d.MemberName,a.GoodsOrderID,a.BookingSessionID,c.GoodsItemID,c.GoodsItemName,c.Unit,c.PricePerUnit,(b.Amount * c.PricePerUnit) as TotalChange,b.Amount FROM tbl_GoodsOrder a
            join tbl_GoodsOrderDetail b on a.GoodsOrderID = b.GoodsOrderID
            join tbl_GoodsItem c on b.GoodsItemID = c.GoodsItemID
            join tbl_Member d on a.MemberID = d.MemberID 
            where a.BookingSessionID = ? and a.MemberID != 9999 and a.IsCancel = 0
            )SaleMaster group by GoodsItemID
        ";
		$query = $this->mysql->query($QueryString,array($BookingSessionID));
		$Sale = $query->result_array();
		$this->mysql->close();
		return $Sale;
	}
    public function GetDataSaleOrderDetail($BookingSessionID)
	{ 
		$QueryString = " 
		select sum(TotalChange) as SalePrice,count(*) as SaleAmount from (
            SELECT d.MemberName,a.GoodsOrderID,a.BookingSessionID,c.GoodsItemID,c.GoodsItemName,c.Unit,c.PricePerUnit,(b.Amount * c.PricePerUnit) as TotalChange FROM tbl_GoodsOrder a
            join tbl_GoodsOrderDetail b on a.GoodsOrderID = b.GoodsOrderID
            join tbl_GoodsItem c on b.GoodsItemID = c.GoodsItemID
            join tbl_Member d on a.MemberID = d.MemberID 
            where a.BookingSessionID = ? and a.MemberID != 9999 and a.IsCancel = 0
            )a
        ";
		$query = $this->mysql->query($QueryString,array($BookingSessionID));
		$Sale = $query->result_array();
		$this->mysql->close();
		return array("SalePrice" => $Sale[0]["SalePrice"],"SaleAmount" => $Sale[0]["SaleAmount"]);
	}
    public function GetDataPendingOrderDetail($BookingSessionID)
	{
		$QueryString = " 
		select count(*) as OrderPending from tbl_GoodsOrder 
		where BookingSessionID = ? and MemberID = 9999 and IsCancel = 0
        ";
		$query = $this->mysql->query($QueryString,array($BookingSessionID));
		$OrderPending = $query->result_array();
 
		$QueryString = " 
		select count(*) as OrderQuantity from (
			SELECT a.GoodsOrderID,a.BookingSessionID,c.GoodsItemID,c.GoodsItemName,c.Unit,c.PricePerUnit,(b.Amount * c.PricePerUnit) as TotalChange FROM tbl_GoodsOrder a
			join tbl_GoodsOrderDetail b on a.GoodsOrderID = b.GoodsOrderID
			join tbl_GoodsItem c on b.GoodsItemID = c.GoodsItemID 
			where a.BookingSessionID = ? and a.MemberID = 9999 and IsCancel = 0
		)a
        ";
		$query = $this->mysql->query($QueryString,array($BookingSessionID));
		$OrderQuantity = $query->result_array();
		$this->mysql->close();
		return array("OrderPending" => $OrderPending[0]["OrderPending"],"OrderQuantity" => $OrderQuantity[0]["OrderQuantity"]);
	}
    public function GetDataAvailableTable()
	{
		$QueryString = " 
        SELECT TableID,TableName,Description FROM tbl_Table where TableID not in (SELECT TableID FROM tbl_BookingSession where IsCheckOut = 0 and TableID != 21)
        ";
		$query = $this->mysql->query($QueryString);
		$Data = $query->result_array();
		$this->mysql->close();
		return $Data;
	}
    
    public function CheckTableAlreadyBooked($TableID)
    {
        $Query = " 
        SELECT TableID FROM tbl_BookingSession where IsCheckOut = 0 and TableID = ? and TableID != 21
        ";
        $queryTableID = $this->mysql->query($Query,array($TableID));
        $TableID = $queryTableID->result_array();
        return $TableID;
    }
    public function GetCustomerInformationByBookingSession($BookingSessionID)
    {
        $Query = " 
        SELECT a.BookingSessionID,a.CustomerID,b.CustomerName,c.TableID,c.TableName
        FROM tbl_BookingSession a
        join tbl_Customer b on a.CustomerID = b.CustomerID
        join tbl_Table c on a.TableID = c.TableID
        where a.BookingSessionID = '".$BookingSessionID."'
        ";
        $queryTableID = $this->mysql->query($Query);
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
        where TableID not in (SELECT TableID FROM tbl_BookingSession where IsCheckOut = 0 and TableID != 21) 
        and TableID = ?
        ";
        $query = $this->mysql->query($QueryString, array($LastInsertID[0]["CustomerID"], $TableID));
        $Transaction = $this->mysql->trans_complete();

        $QueryLastID = " 
        SELECT BookingSessionID FROM tbl_BookingSession order by BookingSessionID desc limit 1
        ";
        $queryLastID = $this->mysql->query($QueryLastID);
        $LastInsertID = $queryLastID->result_array();

        $Data = array("Status" => (($Transaction == true) ? 1 : 0), "BookingSessionID" => $LastInsertID[0]["BookingSessionID"]);
        $this->mysql->close();
        return $Data;
    }
    public function SignOutWithBookingSessionID($BookingSessionID)
    {  
        $this->mysql->trans_start();
        $QueryString = " 
        UPDATE tbl_BookingSession SET 
        IsCheckOut = '1'
        WHERE BookingSessionID = ?
        ";
        $query = $this->mysql->query($QueryString, array($BookingSessionID));
        $Transaction = $this->mysql->trans_complete(); 
        $Data = array("Status" => (($Transaction == true) ? 1 : 0));
        $this->mysql->close();
        return $Data;
    }

}
