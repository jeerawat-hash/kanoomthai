<?php
class Goodsitem extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->mysql = $this->load->database("mysql", true);
		$this->load->library("session"); 
	}

    public function GetDataAllGoodsItem()
	{
		$QueryString = " 
        SELECT GoodsItemID,GoodsItemName,Unit,PricePerUnit,StockAmount,Image FROM tbl_GoodsItem
        where StockAmount
        ";
		$query = $this->mysql->query($QueryString);
		$Data = $query->result_array();
		$this->mysql->close();
		return $Data;
	} 


	
}

?>