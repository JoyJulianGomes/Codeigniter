<?php

class AdminLoginController extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
    }
    public function Print()
    {
        
        $this->load->helper('url');
        $this->load->view('adminPrintView');
    }
    public function ValidateApplicants()
    {
        
        $this->load->helper('url');
        $this->load->view('vaildateapplicantView');
    }
}