<?php

class Signin extends Controller {

    function Signin() {
        parent::Controller();
    }

    function index() {
        if($this->session->userdata('is_signed_in')) {
            redirect('admin/dashboard');
        }
        else {
            $data['title'] = 'SIGN IN';
            $data['main_content'] = 'authen/signin_view';
            $this->load->view('shared/admin_master', $data);
        }
    }
    function verify() {
        if($this->authen_model->validate()) {
            $data = array(
                    'username' => $this->input->post('username'),
                    'is_signed_in' => true
            );
            $this->session->set_userdata($data);
            redirect('admin/dashboard');
        }
        else {
            $this->session->set_flashdata('message','Invalid Username and/or Password');
            redirect('authen/signin');
        }
    }
}