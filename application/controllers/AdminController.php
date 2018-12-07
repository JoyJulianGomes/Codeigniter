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

    public function print_pdf_list($batch, $status)
    {
        $this->load->helper('url');
        $this->load->helper('form');

        if ($this->session->userdata('logged_in')) {
            $this->load->helper('pdf_helper');
            $this->load->model('Participant');
            $data = $this->Participant->getParticipantListForPrinting($batch, $status);
            
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Online');
            $pdf->SetTitle($status.' Applicants Batch-'.$batch);
            $pdf->SetSubject('Registration');
            $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
            $pdf->SetHeaderData('', 0, 'List of '.$status.' Registration Batch-'.$batch, '', array(0,0,0), array(0,0,0)); //second array defines color of horizontal line for header
            $pdf->setFooterData(array(0,64,0), array(0,64,128));
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
            $pdf->setFontSubsetting(true);
            $pdf->SetFont('dejavusans', '', 8, '', true);
            $pdf->setPageOrientation('L');
            $pdf->AddPage();
            $html = $this->load->view('print_list.php', ['data' => $data], true);
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output($status.' Applicants Batch-'.$batch.'.pdf', 'I');
        } else {
            redirect(base_url() . 'AdminController/index');
        }


    }

    public function PrintApplicants($batch = null, $status='valid') 
    {
        $this->load->helper('url');
        $this->load->helper('form');
        
        if ($this->session->userdata('logged_in')) {
            $this->load->model('BatchModel');
            $this->load->model('Participant');

            $data['selectedBatch'] = $batch;
            $data['selectedStatus'] = $status;
            $data['batches'] = $this->BatchModel->getBatchList();
            if($batch != null){
                $data['table'] = $this->Participant->getParticipantListForPrinting($batch, $status);
            }
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
                    "number" => $this->input->post('contact'),
                    "moderator" => $this->session->userdata('username'),
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

    public function resetPassword()
    {
        $this->load->helper('url');
        if ($this->session->userdata('logged_in')) {
            $this->load->helper('form');
            $this->load->model('ModeratorModel');

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<p class="errormsg">', '</p>');
            $this->form_validation->set_rules('password', 'Old Password', 'required|callback_old_pass_match');
            $this->form_validation->set_rules('npass', 'New Password', 'required');
            $this->form_validation->set_rules('cpass', 'Confirm Password', 'required|callback_pass_match');

            $data = [];
            if ($this->form_validation->run()) {
                $update_data = [
                    'pass' => $this->input->post('npass')
                ];
                $status = $this->ModeratorModel->update($this->session->userdata('username'), $update_data);
                $data['status'] = ($status)?'Password Updated':'Could not update password';
            }
            $this->load->view('resetPasswordView', $data);
        }
    }

    public function old_pass_match($password)
    {
        $correct_pass_result = $this->ModeratorModel->getpass($this->session->userdata('username'));
        if($correct_pass_result->pass == $password){
            return true;
        } else {
            $this->form_validation->set_message('old_pass_match', 'Old Password Is Incorrect');
            return false;
        }
    }

    public function pass_match()
    {
        if($this->input->post('cpass')==$this->input->post('npass')){
            return true;
        } else {
            $this->form_validation->set_message('pass_match', 'Password and Confirm Password do not match');
            return false;
        }
    }
}
