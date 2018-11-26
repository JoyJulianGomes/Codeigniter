<?php
class Register extends CI_Controller
{
    public function submit()
    {
        $this->load->helper('url');
        $this->load->model('Participant');
        if( $this->Participant->add()){
            echo "TRUE";
        } else {
            echo "false";
        }
    }
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('register');
    }
}
