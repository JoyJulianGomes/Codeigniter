<?php

class AdminController extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        if ($this->session->userdata('logged_in')) {
            redirect(base_url()."AdminController/ValidateApplicants");
        } else {
            $this->load->view('adminLoginView');
        }
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
                redirect(base_url() . 'AdminController/ValidateApplicants');
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
        redirect(base_url() . 'AdminController/index');
    }

    public function print() 
    {
        $this->load->helper('url');

        if ($this->session->userdata('logged_in')) {
            $this->load->view('adminPrintView');
        } else {
            redirect(base_url() . 'AdminController/index');
        }

    }

    public function ValidateApplicants()
    {
        $this->load->helper('url');
        if ($this->session->userdata('logged_in')) {
            $this->load->helper('form');  
            $this->load->model('PaymentModel');
            $this->load->model('AdminModel');
            
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<p class="errormsg">', '</p>');
            $this->form_validation->set_rules('regid', 'Required', 'required');
            $this->form_validation->set_rules('trxID', 'Required', 'required');
            $this->form_validation->set_rules('amount', 'Add amount', 'required');

            if($this->form_validation->run() == false)
            {
                $data["userinfo"] = (object) array("regid"=>'',"name"=>'', "contact"=>'', "batch"=>'', "total_amount"=>'', "paid_amount"=>'', "status"=>null); 
                $this->load->view('vaildateapplicantView', $data);
            } else {
                date_default_timezone_set('Asia/Dhaka');
                $date = date("Y-m-d H:i:s");
                $payment_data = [
                    "regid"=>$this->input->post('regid'),
                    "trxID"=>$this->input->post('trxID'),
                    "amount"=>$this->input->post('amount'),
                    "moderator"=>$this->session->userdata('username'),
                    "date"=>$date,
                ];
                $status = $this->PaymentModel->add($payment_data);
                if($status){
                    $this->update_uesr_paid_amount($payment_data['regid'], $payment_data['amount']);
                }
                
                $data["userinfo"] = $this->AdminModel->getParticipantInfo($this->input->post('regid'));
                $this->load->view('vaildateapplicantView', $data);
            }
        } else {
            redirect(base_url() . 'AdminController/index');
        }
    }

    private function update_uesr_paid_amount($regid, $amount)
    {
        $this->load->model('Participant');
        $data = $this->Participant->get_payable_and_paid_amount($regid);
        $new_amount = $data->paid_amount+$amount;
        $status = $this->Participant->update_paid_amount($regid, $new_amount);
        if($status){
            print_r($data);
            if($new_amount >= $data->total_amount && !$data->status){
                $status = $this->Participant->update_status($regid);
            }
        }
    }
}
