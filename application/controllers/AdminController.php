<?php

class AdminController extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->helper('form');

        if ($this->session->userdata('logged_in')) {
            redirect(base_url() . "AdminController/ValidateApplicants");
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

    public function PrintApplicants() 
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('BatchModel');

        if ($this->session->userdata('logged_in')) {
            $this->data['batches'] = $this->BatchModel->getBatchList();
            $this->data['table'] = [(object) array("regid"=>' ',"name"=>' ', "gender"=>' ', "batch"=>' ', "contact"=>' ')];
            $this->load->view('adminPrintView', $this->data);

        } else {
            redirect(base_url() . 'AdminController/index');
        }

    }

    public function LoadTable($batch = ' ') 
    {
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('BatchModel');
        $this->load->model('Participant');

        if ($this->session->userdata('logged_in')) {
            
            $data['batches'] = $this->BatchModel->getBatchList(); 
            $data['table'] = $this->Participant->getParticipantList($batch);
            $this->load->view('adminPrintView', $data);

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
            $this->load->model('Participant');

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<p class="errormsg">', '</p>');
            $this->form_validation->set_rules('regid', 'Required', 'required');
            $this->form_validation->set_rules('trxID', 'Required', 'required');
            $this->form_validation->set_rules('amount', 'Add amount', 'required');

            if ($this->form_validation->run() == false) {
                $data["userinfo"] = (object) array("regid" => '', "name" => '', "contact" => '', "batch" => '', "total_amount" => '', "paid_amount" => '', "status" => null);
                $this->load->view('vaildateapplicantView', $data);
            } else {
                date_default_timezone_set('Asia/Dhaka');
                $date = date("Y-m-d H:i:s");
                $payment_data = [
                    "regid" => $this->input->post('regid'),
                    "trxID" => $this->input->post('trxID'),
                    "amount" => $this->input->post('amount'),
                    "moderator" => $this->session->userdata('username'),
                    "date" => $date,
                ];
                $status = $this->PaymentModel->add($payment_data);
                if ($status) {
                    $this->update_uesr_paid_amount($payment_data['regid'], $payment_data['amount']);
                }

                $data["userinfo"] = $this->Participant->getParticipantInfo($this->input->post('regid'));
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
        $new_amount = $data->paid_amount + $amount;
        $status = $this->Participant->update_paid_amount($regid, $new_amount);
        if ($status) {
            print_r($data);
            if ($new_amount >= $data->total_amount && !$data->status) {
                $status = $this->Participant->update_status($regid);
            }
        }
    }

    public function addRepresentative()
    {
        $this->load->helper('url');
        if ($this->session->userdata('logged_in')) {
            $this->load->helper('form');
            $this->load->model('BatchModel');

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<p class="errormsg">', '</p>');
            $this->form_validation->set_rules('batch', 'Batch', 'required');
            if(!empty($this->input->post('rep_phone'))){
                $this->form_validation->set_rules('rep_phone', 'Add amount', 'callback_contact_check');
            }
            if ($this->form_validation->run()) {
                $insertion_data = [
                    "batch" => $this->input->post('batch'),
                    "rep_name" => ($rep_name = $this->input->post('rep_name'))?$rep_name:'',
                    "rep_phone" => ($rep_phone = $this->input->post('rep_phone'))?$rep_phone:'',
                ];
                $status = $this->BatchModel->add($insertion_data);
                $data['representatives'] = $this->BatchModel->getBatchInfo();
                $this->load->view('addRepresentativeView', $data);
            } else {
                $data['representatives'] = $this->BatchModel->getBatchInfo();
                $this->load->view('addRepresentativeView', $data);
            }
            
        } else {
            redirect(base_url() . 'AdminController/index');
        }
    }

    public function contact_check($number)
    {
        // regex for contact number: /^(\+88)?(01)([5-9])([0-9]{8})$/
        // for regex help: https://regexr.com/
        if (preg_match('/^(\+88)?(01)([5-9])([0-9]{8})$/', $number)) {
            return true;
        } else {
            $this->form_validation->set_message('contact_check', 'Enter a Valid Number');
            return false;
        }
    }

    public function addModerator()
    {
        $this->load->helper('url');
        if ($this->session->userdata('logged_in')) {
            $this->load->helper('form');
            $this->load->model('ModeratorModel');

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<p class="errormsg">', '</p>');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('contact', 'Contact', 'required|callback_contact_check');

            if ($this->form_validation->run()) {
                $insertion_data = [
                    "name" => $this->input->post('name'),
                    "contact" => $this->input->post('contact'),
                    "pass" => '1111',
                ];
                $status = $this->ModeratorModel->add($insertion_data);
            }
            $data['moderators'] = $this->ModeratorModel->getModeratorList();
            $this->load->view('addModeratorView', $data);
        } else {
            redirect(base_url() . 'AdminController/index');
        }
    }

    public function changeBKash()
    {
        $this->load->helper('url');
        if ($this->session->userdata('logged_in')) {
            $this->load->helper('form');
            $this->load->model('BkashModel');

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<p class="errormsg">', '</p>');
            $this->form_validation->set_rules('contact', 'Contact', 'required|callback_contact_check');

            if ($this->form_validation->run()) {
                date_default_timezone_set('Asia/Dhaka');
                $date = date("Y-m-d H:i:s");
                $insertion_data = [
                    "contact" => $this->input->post('contact'),
                    "moderator" => $this->sssion->userdata('username'),
                    'date' => $date,
                    'status' => 'valid'
                ];
                $status = $this->BkashModel->add($insertion_data);
            }
            $data['bkash_nos'] = $this->BkashModel->get_all_bkash_no();
            $this->load->view('changeBKashView', $data);
        } else {
            redirect(base_url() . 'AdminController/index');
        }
    }

    public function changeBkashStatus($status, $number, $moderator)
    {
        $this->load->helper('url');
        if ($this->session->userdata('logged_in')) {
            $this->load->model('BkashModel');
            
            date_default_timezone_set('Asia/Dhaka');
            $date = date("Y-m-d H:i:s");
            $update_data = [
                'status' => ($status === 'valid')?'invalid':'valid',
                'moderator' => $moderator,
                'date' => $date,
            ];
            $update_status = $this->BkashModel->update_status($number, $update_data);
            redirect(base_url() . 'AdminController/changeBKash');
        } else {
            redirect(base_url() . 'AdminController/index');
        }
    }
}
