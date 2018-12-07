<?php

class Register extends CI_Controller
{
    private function get_photo_config()
    {
        return [
            'upload_path' => './uploads/',
            'allowed_types' => 'jpg|png',
            'max_size' => 600,
            'max_width' => 800,
            'max_height' => 800,
        ];
    }

    private function getFeeRate()
    {
        return [
            'student' => 500,
            'spouse' => 300,
            'child' => 300,
            'other' => 500,
            'bkashChargeRate' => 0.02,
        ];
    }

    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload', $this->get_photo_config());
        $this->load->model("Participant");
        $this->load->model("BatchModel");
        $this->load->model("BkashModel");

        $this->data['batches'] = $this->BatchModel->getBatchList();

        // $form_maker_data -> Data required for initializing view
        $form_maker_data["Batch_Nb"] = $this->data['batches'];
        $form_maker_data["guest_option"] = ['Spouse', 'Child', 'Other'];

        // Form Validation Rules:
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="errormsg">', '</p>');
        $this->form_validation->set_rules('batch', 'Batch Year', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        if(!isset($_FILES['photo'])){
            $this->form_validation->set_rules('photo', 'Photo', 'callback_photo_check');
        }
        $this->form_validation->set_rules('father', 'Father\'s  Name', 'required');
        $this->form_validation->set_rules('mother', 'Mother\'s  Name', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required|callback_gender_check');
        $this->form_validation->set_rules('mstat', 'Marital Status', 'required|callback_marital_check');
        $this->form_validation->set_rules('occupation', 'Occupation', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('contact', 'contact', 'required|callback_contact_check');

        // Form Validation
        if ($this->form_validation->run() == false) {
            $this->load->view('registerView', $form_maker_data);
        } else {
            $guest_list = [
                ['guest_name' => $this->input->post('pname-1'), 'relation' => $this->input->post('prel-1'), 'age' => $this->input->post('page-1')],
                ['guest_name' => $this->input->post('pname-2'), 'relation' => $this->input->post('prel-2'), 'age' => $this->input->post('page-2')],
                ['guest_name' => $this->input->post('pname-3'), 'relation' => $this->input->post('prel-3'), 'age' => $this->input->post('page-3')],
                ['guest_name' => $this->input->post('pname-4'), 'relation' => $this->input->post('prel-4'), 'age' => $this->input->post('page-4')],
                ['guest_name' => $this->input->post('pname-5'), 'relation' => $this->input->post('prel-5'), 'age' => $this->input->post('page-5')],
            ];

            date_default_timezone_set('Asia/Dhaka');
            $date = date("Y-m-d H:i:s");

            $guest_info = $this->clean_guest_info($guest_list);
            $fees = $this->calculate_fee($guest_info);
            $rates = $this->getFeeRate();

            $data_from_form = [
                'userinfo' => [
                    'batch' => $this->input->post('batch'),
                    'batch_repname' => $this->BatchModel->getRepName($this->input->post('batch')),
                    'name' => $this->input->post('name'),
                    'photo' => $this->upload->data()['full_path'],
                    'father' => $this->input->post('father'),
                    'mother' => $this->input->post('mother'),
                    'gender' => $this->input->post('gender'),
                    'mstat' => $this->input->post('mstat'),
                    'occupation' => $this->input->post('occupation'),
                    'designation' => $this->input->post('designation'),
                    'contact' => $this->input->post('contact'),
                    'spouse_count' => $guest_info['spouse_count'],
                    'child_count' => $guest_info['child_count'],
                    'other_count' => $guest_info['other_count'],
                    'total_amount' => $fees['subtotal'],
                    'paid_amount' => 0,
                    'date' => $date,
                ],
                'guest' => $guest_info['guests']
            ];

            $instruction_data['reg_id'] = $this->Participant->add_participant($data_from_form);
            $instruction_data['student'] = ['count'=>1, 'rate'=>$rates['student'], 'fee'=>$fees['student']];
            $instruction_data['spouse'] = ['count'=>$guest_info['spouse_count'], 'rate'=>$rates['spouse'], 'fee'=>$fees['spouse']];
            $instruction_data['child'] = ['count'=>$guest_info['child_count'], 'rate'=>$rates['child'], 'fee'=>$fees['child']];
            $instruction_data['other'] = ['count'=>$guest_info['other_count'], 'rate'=>$rates['other'], 'fee'=>$fees['other']];
            $instruction_data['total'] = $fees['total'];
            $instruction_data['bkash_charge'] = $fees['bkash_charge'];
            $instruction_data['subtotal'] = $fees['subtotal'];
            $instruction_data['bkash'] = $this->BkashModel->get_bkash_no("valid");

            $this->load->view('Instructionpage', $instruction_data);
        }
    }

    private function loadpage()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model("BatchModel");
        
        $guest_list = [
            ['guest_name'=>'Spouse', 'relation'=>'Spouse', 'age'=>32], 
            ['guest_name'=>'Child-1', 'relation'=>'Child', 'age'=>2], 
            ['guest_name'=>'Child-2', 'relation'=>'Child', 'age'=>11], 
            ['guest_name'=>'Vatiza', 'relation'=>'Other', 'age'=>32],
            ['guest_name'=>'', 'relation'=>'', 'age'=>'']
        ];
        $rates = $this->getFeeRate();

        $guest_info = $this->clean_guest_info($guest_list);
        $fees = $this->calculate_fee($guest_info);

        $success['reg_id']=100;

        $success['student'] = ['count'=>1, 'rate'=>$rates['student'], 'fee'=>$fees['student']];
        $success['spouse'] = ['count'=>$guest_info['spouse_count'], 'rate'=>$rates['spouse'], 'fee'=>$fees['spouse']];
        $success['child'] = ['count'=>$guest_info['child_count'], 'rate'=>$rates['child'], 'fee'=>$fees['child']];
        $success['other'] = ['count'=>$guest_info['other_count'], 'rate'=>$rates['other'], 'fee'=>$fees['other']];
        $success['total'] = $fees['total'];
        $success['bkash_charge'] = $fees['bkash_charge'];
        $success['subtotal'] = $fees['subtotal'];

        $success['bkash']=[(object) ['number'=>'01824134362'],(object) ['number'=>'01715150643']];
        $this->load->view('Instructionpage', $success);
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

    private function clean_guest_info($guest_list)
    {
        $new_guest = [];
        $spouse_count = 0;
        $child_count = 0;
        $child_above_3 = 0;
        $child_count = 0;
        $other_count = 0;
        foreach ($guest_list as $guest) {
            if (!empty(($guest['relation']))) {
                if($guest['relation'] == 'Spouse'){
                    $spouse_count++;
                } elseif($guest['relation'] == 'Child'){
                    $child_count++;
                    if (!empty($guest['age']) && $guest['age'] > 3){
                        $child_above_3++;
                    }
                }  elseif($guest['relation'] == 'Other'){
                    $other_count++;
                }
                array_push($new_guest, $guest);
            }
        }
        $data =[
            'guests' => $new_guest, 
            'spouse_count'=>$spouse_count, 
            'child_count' => $child_count, 
            'child_above_3_count' => $child_above_3, 
            'other_count'=>$other_count
        ]; 
        return $data;
    }

    private function calculate_fee($guest_info)
    {
        $rates = $this->getFeeRate();

        $student = $rates['student'];
        $spouse = $guest_info['spouse_count'] * $rates['spouse'];
        $child_above_3 = $guest_info['child_above_3_count'] * $rates['child'];
        $other = $guest_info['other_count'] * $rates['other']; 
        $total = $student + $spouse + $child_above_3 + $other;
        $bkash_charge = $total * $rates['bkashChargeRate'];
        $subtotal = $total + $bkash_charge;

        return [
            'student' => $student, 
            'spouse' => $spouse, 
            'child' => $child_above_3, 
            'other' => $other,
            'total' => $total, 
            'bkash_charge' => $bkash_charge,
            'subtotal' => $subtotal,
        ];
    }

}
