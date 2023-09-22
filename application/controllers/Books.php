<?php
 
class Books extends CI_Controller {
 
	function __construct()
    {
        parent::__construct();
        $this->load->library("session");
    }
	public function index()
	{
		$BookingSessionID = $this->session->userdata("BookingSessionID"); 
        $CustomerID = $this->session->userdata("CustomerID"); 
        $CustomerName = $this->session->userdata("CustomerName"); 
        $TableID = $this->session->userdata("TableID"); 
        $TableName = $this->session->userdata("TableName"); 

		$Header["BookingSessionID"] = $BookingSessionID;
		$Header["CustomerID"] = $CustomerID;
		$Header["CustomerName"] = $CustomerName;
		$Header["TableID"] = $TableID;
		$Header["TableName"] = $TableName;

		$this->load->view('books',$Header);
	}
	public function Logout()
    {
        $this->session->sess_destroy();
        //redirect("Login");
    } 
}
