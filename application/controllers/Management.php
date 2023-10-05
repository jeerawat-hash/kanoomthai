<?php
class Management extends CI_Controller
{

        public function __construct()
        {
            parent::__construct();
            $this->load->library("session");
        } 
        public function index()
        {
                $this->load->view("login.php");    

                $MemberID = $this->session->userdata("MemberID");
                $MemberName = $this->session->userdata("MemberName");
                $MemberAuthorize = $this->session->userdata("MemberAuthorize");
        
                switch ($MemberAuthorize[0]) { 
                    case 'Dashboard':
                        redirect("Management/Dashboard");
                        break; 
                    case 'Maintain':
                        redirect("Management/Maintain");
                        break; 
                }
        } 
        public function Logout()
        {
                $this->session->sess_destroy();
                redirect("Management");
        }
        public function Dashboard()
        {

                $MemberID = $this->session->userdata("MemberID");
                $MemberName = $this->session->userdata("MemberName");
                $MemberAuthorize = $this->session->userdata("MemberAuthorize");
                if($MemberID == ""){
                    redirect("Management/Logout");
                } 
                $header["AccountPermit"] = $MemberAuthorize;
                $header['EmployeeName'] = $MemberName; 

                $header['page_name'] = 'จัดการรายการสั่งซื้อ';
                $header['page_focus'] = 'Dashboard';
                $header['page_menu'] = 0;
                $data['page_name'] = $header['page_name'];

                $this->load->view("manage/template/header.php", $header);
                $this->load->view("manage/pages/dashboard.php", $data);
                $this->load->view("manage/template/footer.php");
        }
        public function Maintain()
        {
                $MemberID = $this->session->userdata("MemberID");
                $MemberName = $this->session->userdata("MemberName");
                $MemberAuthorize = $this->session->userdata("MemberAuthorize");
                if($MemberID == ""){
                    redirect("Management/Logout");
                } 
                $header["AccountPermit"] = $MemberAuthorize;
                $header['EmployeeName'] = $MemberName; 

                $header['page_name'] = 'คลังสินค้าและราคาขาย';
                $header['page_focus'] = 'Maintain';
                $header['page_menu'] = 0;
                $data['page_name'] = $header['page_name'];

                $this->load->view("manage/template/header.php", $header);
                $this->load->view("manage/pages/manage.php", $data); 
                $this->load->view("manage/template/footer.php");
        }
        public function Account()
        {
                $MemberID = $this->session->userdata("MemberID");
                $MemberName = $this->session->userdata("MemberName");
                $MemberAuthorize = $this->session->userdata("MemberAuthorize");
                if($MemberID == ""){
                    redirect("Management/Logout");
                } 
                $header["AccountPermit"] = $MemberAuthorize;
                $header['EmployeeName'] = $MemberName; 

                $header['page_name'] = 'บัญชีผู้ใช้ระบบ';
                $header['page_focus'] = 'Account';
                $header['page_menu'] = 0;
                $data['page_name'] = $header['page_name'];

                $this->load->view("manage/template/header.php", $header);
                $this->load->view("manage/pages/account.php", $data); 
                $this->load->view("manage/template/footer.php");
        }
}
