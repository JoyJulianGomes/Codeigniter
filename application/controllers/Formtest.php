<?php

class Formtest extends CI_Controller
{
    private function get_photo_config()
    {
        return [
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => 2048,
            'max_width' => 2048,
            'max_height' => 1920,
        ];
    }
    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload', $this->get_photo_config());
        $this->load->model("Participant");
        $this->load->model("BkashModel");
    
        $this->data['batches'] = $this->Participant->getBatch();

        // $form_maker_data -> Data required for initializing view
        $form_maker_data["Batch_Nb"] = $this->data['batches'];
        $form_maker_data["guest_option"]= ['Spouse', 'Child'];

        // Form Validation Rules:
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="errormsg">', '</p>');
        $this->form_validation->set_rules('batch', 'Batch Year', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('photo', 'Photo', 'callback_photo_check');
        $this->form_validation->set_rules('father', 'Father\'s  Name', 'required');
        $this->form_validation->set_rules('mother', 'Mother\'s  Name', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required|callback_gender_check');
        $this->form_validation->set_rules('mstat', 'Marital Status', 'required|callback_marital_check');
        $this->form_validation->set_rules('occupation', 'Occupation', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('contact', 'contact', 'required|callback_contact_check');

        // Form Validation
        if ($this->form_validation->run() == false) {
            $this->load->view('formtest', $form_maker_data);
        } else {
            // $data_from_form -> user data to be inserted in test.userinfo
            $data_from_form = [
                'batch' => $this->input->post('batch'),
                'name' => $this->input->post('name'),
                'photo' => array('upload_data' => $this->upload->data()),
                'father' => $this->input->post('father'),
                'mother' => $this->input->post('mother'),
                'gender' => $this->input->post('gender'),
                'mstat' => $this->input->post('mstat'),
                'occupation' => $this->input->post('occupation'),
                'designation' => $this->input->post('designation'),
                'contact' => $this->input->post('contact'),
                'guest' => [
                    'guest_1' => ['guest_name' => $this->input->post('pname-1'), 'relation' => $this->input->post('prel-1'), 'age' => $this->input->post('page-1')],
                    'guest_2' => ['guest_name' => $this->input->post('pname-2'), 'relation' => $this->input->post('prel-2'), 'age' => $this->input->post('page-2')],
                    'guest_3' => ['guest_name' => $this->input->post('pname-3'), 'relation' => $this->input->post('prel-3'), 'age' => $this->input->post('page-3')],
                    'guest_4' => ['guest_name' => $this->input->post('pname-4'), 'relation' => $this->input->post('prel-4'), 'age' => $this->input->post('page-4')],
                    'guest_5' => ['guest_name' => $this->input->post('pname-5'), 'relation' => $this->input->post('prel-5'), 'age' => $this->input->post('page-5')],
                ],
            ];

            // #TODO call data insertion function here
            $success = $this->Participant->add_participant($data_from_form);
            $success['bkash'] = $this->BkashModel->get_bkash_no("valid");


            // #TODO on insertion success load payment instruction view
            $this->load->view('Instructionpage', $success);

            // #TODO on insertion failure load register view
        }
    }
    public function photo_check($field)
    {
        if (!$this->upload->do_upload('photo')) {
            $this->form_validation->set_message('photo_check', $this->upload->display_errors('<p class="errormsg">', '</p>'));
            return false;
        } else {
            return true;
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
    public function marital_check($str)
    {
        if ($str == 'married' || $str == 'unmarried') {
            return true;
        } else {
            $this->form_validation->set_message('marital_check', 'Invalid Marital Status');
            return false;
        }
    }
    public function gender_check($str)
    {
        if ($str == 'male' || $str == 'female') {
            return true;
        } else {
            $this->form_validation->set_message('gender_check', 'Invalid Gender');
            return false;
        }
    }
}
