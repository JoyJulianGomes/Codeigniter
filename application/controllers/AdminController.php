<?php

class AdminLoginController extends CI_Controller
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

            if ($this->ModeratorModel->can_login($username, $password)) {
                $session_data = ['username' => $username, 'logged_in' => true];
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'index.php/' . 'AdminController/print');
            } else {
                $this->load->view('adminLoginView', ['login_error' => "Incorrect username or password"]);
            }
        } else {
            $this->load->view('adminLoginView');
        }
    }

    public function logout()
    {
        $this->load->helper('url');
        $this->session->unset_userdata(['username', 'logged_in']);
        redirect(base_url() . 'index.php/' . 'AdminController/index');
    }

    function print() 
    {
        $this->load->helper('url');

        //check if logged in
        if ($this->session->userdata('logged_in')) {
            $this->load->view('adminPrintView');
        } else {
            redirect(base_url() . 'index.php' . 'AdminController/index');
        }

    }

    public function ValidateApplicants()
    {
        $this->load->helper('url');
        $this->load->model('PaymentModel');
        $this->load->view('vaildateapplicantView');


        //check if logged in
        if ($this->session->userdata('logged_in')) {
            $data = ['regid'=>11, 'trxID'=>'BFG012987', 'amount'=>1100];
            $status = $this->PaymentModel->add($data);
            if($status){
                $this->update_uesr_paid_amount($data['regid'], $data['amount']);
            }
        } else {
            redirect(base_url() . 'index.php' . 'AdminController/index');
        }
    }

    private function update_uesr_paid_amount($regid, $amount)
    {
        $this->load->model('Participant');
        $data = $this->Participant->get_payable_and_paid_amount($regid);
        $new_amount = $data->paid_amount+$amount;
        $status = $this->Participant->update_paid_amount($regid, $new_amount);
        if($status){
            if($new_amount == $data->total_amount && !$data->status){
                $this->Participant->update_status($regid);
            }
        }
    }
}
