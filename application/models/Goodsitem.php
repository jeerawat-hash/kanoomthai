<?php
class Goodsitem extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->mysql = $this->load->database("mysql", true);
		$this->load->library("session"); 
	}

    public function GetDataAllGoodsItemForSale()
	{
		$QueryString = " 
        SELECT GoodsItemID, GoodsItemName, Unit, PricePerUnit, StockAmount
		,(case when StockAmount = 0 then '0' else '1'  end) as IsAvaliable 
		FROM tbl_GoodsItem
        ";
		$query = $this->mysql->query($QueryString);
		$Data = $query->result_array();
		$this->mysql->close();
		return $Data;
	}


	
}

?>