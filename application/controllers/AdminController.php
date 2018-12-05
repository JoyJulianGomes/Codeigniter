<?php

class AdminController extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->view('adminLoginView');
    }

    public function login_validation()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('ModeratorModel');

        $this->form_validation->set_rules('username', "Username", 'required');
        $this->form_validation->set_rules('password', "Password", 'required');

        if ($this->form_validation->run()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if($this->ModeratorModel->can_login($username, $password)) {
                $session_data = ['username' => $username, 'logged_in' => true];
                $this->session->set_userdata($session_data);
                redirect(base_url().'index.php/'.'AdminController/print');
            } else {
                $this->load->view('adminLoginView', ['login_error'=>"Incorrect username or password"]);
            }
        } else {
            $this->load->view('adminLoginView');
        }
    }

    public function logout(){
        $this->load->helper('url');
        $this->session->unset_userdata(['username', 'logged_in']);
        redirect(base_url().'index.php/'.'AdminController/index');
    }

    function print() {
        $this->load->helper('url');

        //check if logged in
        if($this->session->userdata('logged_in')){
            $this->load->view('adminPrintView');
        } else {
            redirect(base_url(). 'index.php'. 'AdminController/index');
        }

    }
    public function ValidateApplicants()
    {

        $this->load->helper('url');
        $this->load->helper('form');  
        $this->load->model('AdminModel');
        
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="errormsg">', '</p>');
        $this->form_validation->set_rules('regid', 'Required', 'required');
        $this->form_validation->set_rules('trxID', 'Required', 'required');
        $this->form_validation->set_rules('amount', 'Add amount', 'required');

        if($this->form_validation->run() == false)
        {
                // $this->data["userinfo"] =["regid"=>' ',"name"=>' ', "batch"=>' ', "total_amount"=>' ', "paid_amount"=>' ', "status"=>' ']; 
                $this->load->view('vaildateapplicantView');
        }
        else
        {
                $this->data["userinfo"] = $this->AdminModel->getParticipantInfo($this->input->post('regid') );
                print_r($this->data["userinfo"]);
                $this->load->view('vaildateapplicantView', $this->data);
                // foreach( $this->AdminModel->getParticipantInfo() as $user )
                // {
                //     echo $user["name"];
                // }
        }
    }
}
