<?php

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Session $session
 */

class Authen_model extends Model {

    function Authen_model() {
        parent::Model();
    }
    function is_signed_in() {
        $is_signed_in = $this->session->userdata('is_signed_in');
        if(!isset($is_signed_in) || $is_signed_in != TRUE) {
            $this->session->set_flashdata('message', 'Please Sign in to Administrator area');
            redirect('authen/signin');
        }
    }

    function validate() {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $Q = $this->db->get('members');
        if($Q->num_rows() == 1) {
            return true;
        }
        return false;
    }

    function change_password() {
        $this->form_validation->set_rules('new_password','New Password','trim|required');
        $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required');

        if($this->form_validation->run()) {
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');
            if($new_password === $confirm_password) {
                $data = array(
                        'password' => md5($new_password)
                );
                $this->db->where('username', $this->input->post('username'));
                $this->db->update('members',$data);
                return true;
            }
        }
        return false;
    }

}