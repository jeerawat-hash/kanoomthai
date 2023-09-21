<?php
class Goodsitem extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->mssql = $this->load->database("mysql", true);
		$this->load->library("session"); 
	}

    public function GetDataAllGoodsItem()
	{
		$QueryString = " 
        SELECT GoodsItemID,GoodsItemName,Unit,PricePerUnit,StockAmount FROM tbl_GoodsItem
        where StockAmount
        ";
		$query = $this->mssql->query($QueryString);
		$Data = $query->result_array();
		$this->mssql->close();
		return $Data;
	}

}

?>