<?php

class Formtest extends CI_Controller
{
    public function submit()
    {
        $this->load->helper('url');
        $this->load->model('Participant');
        if ($this->Participant->add()) {
            echo "TRUE";
        } else {
            echo "false";
        }
    }
    public function index()
    {
        $this->load->helper(array('form', 'url'));

        $batches = [2008, 2009, 2010];
        $data = ["Batch_Nb"=>$batches];

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="errormsg">', '</p>');
        $this->form_validation->set_rules('Batch', 'Batch Year', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('formtest', $data);
        } else {
            echo "Success";
        }
    }
    public function index2()
    {

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required',
        //     array('required' => 'You must provide a %s.')
        // );
        // $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        // $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('formtest');
        } else {
            $this->load->view('register');
        }
    }
}
