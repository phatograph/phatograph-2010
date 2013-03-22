<?php

class Dashboard extends Controller {

    function Dashboard() {
        parent::Controller();
        $this->authen_model->is_signed_in();
    }

    function index() {
        $data['title'] = 'DASHBOARD';
        $data['header_content'] = 'DASHBOARD';
        $data['script'] = 'dashboard_script';
        $data['main_content'] = 'manage/dashboard_view';
        $this->load->view('shared/admin_master', $data);
    }

}