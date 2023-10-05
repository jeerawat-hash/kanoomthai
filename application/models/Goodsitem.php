<?php
class Goodsitem extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->mysql = $this->load->database("mysql", true);
		$this->load->library("session"); 
	}


	public function EditGoodsItems($GoodsItemID,$GoodsItemName,$StockAmount,$PricePerUnit,$Unit,$GoodsImageUpload)
	{
		$this->mysql->trans_start();
        $QueryString = " 
        UPDATE tbl_GoodsItem SET
		GoodsItemName = ?,
		Unit = ?,
		PricePerUnit = ?,
		StockAmount = ?,
		Image = ?
		WHERE GoodsItemID = ?
        ";
        $query = $this->mysql->query($QueryString, array($GoodsItemName,$Unit,$PricePerUnit,$StockAmount,$GoodsImageUpload,$GoodsItemID ));
        $Transaction = $this->mysql->trans_complete(); 
		$Data = array("Status" => (($Transaction == true) ? 1 : 0));
        $this->mysql->close();
        return $Data;
	}

	public function GetDataAllGoodsItemStock()
	{ 
		$QueryString = "  
        SELECT GoodsItemID
		,GoodsItemName
		,Unit
		,PricePerUnit
		,StockAmount
		,(SELECT sum(Amount) as Used FROM tbl_GoodsOrderDetail where GoodsItemID = ItemMaster.GoodsItemID group by GoodsItemID) as Used
		,(StockAmount-(SELECT sum(Amount) as Used FROM tbl_GoodsOrderDetail where GoodsItemID = ItemMaster.GoodsItemID group by GoodsItemID)) as Available
		,Image FROM tbl_GoodsItem ItemMaster
        ";
		$query = $this->mysql->query($QueryString);
		$Sale = $query->result_array();
		$this->mysql->close();
		return $Sale;
	}
	public function InsertDataOrder($BookingSessionID,$DataItem)
	{
		$this->mysql->trans_start();
        $QueryString = " 
        INSERT INTO tbl_GoodsOrder (BookingSessionID, MemberID, CreateDate) 
		VALUES (?, ?, ?)
        ";
        $query = $this->mysql->query($QueryString, array($BookingSessionID, 9999, date("Y-m-d H:i:s")));
        $Transaction = $this->mysql->trans_complete();
 
        $QueryLastID = " 
        SELECT GoodsOrderID FROM tbl_GoodsOrder order by GoodsOrderID desc limit 1
        ";
        $queryLastID = $this->mysql->query($QueryLastID);
        $LastInsertID = $queryLastID->result_array();
 
		$this->mysql->trans_start();
		for ($i=0; $i < count($DataItem["Data"]); $i++) {  
			$QueryString = " 
			INSERT INTO tbl_GoodsOrderDetail (GoodsOrderID, GoodsItemID, Amount)
			VALUES (?, ?, ?)
			";
			$query = $this->mysql->query($QueryString, array($LastInsertID[0]["GoodsOrderID"], $DataItem["Data"][$i]["ItemID"], $DataItem["Data"][$i]["ItemAmountSum"]));
        }
		$Transaction = $this->mysql->trans_complete();
		 
		$Data = array("Status" => (($Transaction == true) ? 1 : 0), "GoodsOrderID" => $LastInsertID[0]["GoodsOrderID"]);
        $this->mysql->close();
        return $Data;
	}
    public function GetDataAllGoodsItemForSale()
	{
		$QueryString = " 
		SELECT GoodsItemID, GoodsItemName, Unit, PricePerUnit, StockAmount
		,(case when ((StockAmount - 
		(
			SELECT sum(b.Amount) as aa FROM tbl_GoodsOrder a
			join tbl_GoodsOrderDetail b on a.GoodsOrderID = b.GoodsOrderID 
			where a.MemberID != 9999 and b.GoodsItemID = ItemMaster.GoodsItemID and a.IsCancel = 0 group by b.GoodsItemID
		)) = 0) then '0' else '1'  end) as IsAvaliable 
		,Image
		,(StockAmount - (
			
			SELECT sum(b.Amount) as aa FROM tbl_GoodsOrder a
			join tbl_GoodsOrderDetail b on a.GoodsOrderID = b.GoodsOrderID 
			where a.MemberID != 9999 and b.GoodsItemID = ItemMaster.GoodsItemID and a.IsCancel = 0 group by b.GoodsItemID
			
			)) as Total
		,(
			SELECT sum(b.Amount) as aa FROM tbl_GoodsOrder a
			join tbl_GoodsOrderDetail b on a.GoodsOrderID = b.GoodsOrderID 
			where a.MemberID != 9999 and b.GoodsItemID = ItemMaster.GoodsItemID and a.IsCancel = 0 group by b.GoodsItemID  
			) as Used
		FROM tbl_GoodsItem ItemMaster
        ";
		$query = $this->mysql->query($QueryString);
		$Data = $query->result_array();
		$this->mysql->close();
		return $Data;
	}


	
}

?>