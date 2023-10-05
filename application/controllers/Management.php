<?php
class Management extends CI_Controller
{


        public function index()
        {
                $this->load->view("login.php");   
        } 
        public function Dashboard()
        {
                $header["AccountPermit"] = array("Dashboard", "Maintain", "Account");
                $header['EmployeeName'] = "TEST";
                $header['EmployeeIMG'] = "";
                $header['EmployeePosition'] = "-";

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
                $header["AccountPermit"] = array("Dashboard", "Maintain", "Account");
                $header['EmployeeName'] = "TEST";
                $header['EmployeeIMG'] = "";
                $header['EmployeePosition'] = "-";

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
                $header["AccountPermit"] = array("Dashboard", "Maintain", "Account");
                $header['EmployeeName'] = "TEST";
                $header['EmployeeIMG'] = "";
                $header['EmployeePosition'] = "-";

                $header['page_name'] = 'บัญชีผู้ใช้ระบบ';
                $header['page_focus'] = 'Account';
                $header['page_menu'] = 0;
                $data['page_name'] = $header['page_name'];

                $this->load->view("manage/template/header.php", $header);
                $this->load->view("manage/pages/account.php", $data); 
                $this->load->view("manage/template/footer.php");
        }
}
