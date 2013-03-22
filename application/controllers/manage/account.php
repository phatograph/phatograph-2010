<?php

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */

class Account extends Controller {

    function Account() {
        parent::Controller();
        $this->authen_model->is_signed_in();
    }

    function index() {
        $data['title'] = 'CHANGE PASSWORD';
        $data['header_content'] = 'CHANGE PASSWORD';
        $data['main_content'] = 'account/account_view';
        $this->load->view('shared/manage_master', $data);
    }

    function change_password() {
        if($this->authen_model->validate()) {
            if($this->authen_model->change_password()) {
                $this->session->set_flashdata('message','Password changed');
            }
            else {
                $this->session->set_flashdata('message','New password is required and/or is not matched');
            }
        }
        else {
            $this->session->set_flashdata('message','Invalid old Password');
        }
        redirect('manage/account');
    }

}