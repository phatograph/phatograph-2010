<?php

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */

class House extends Controller {

    function House() {
        parent::Controller();
        require_once('./FirePHPCore/fb.php');
        $this->authen_model->is_signed_in();
    }

    function index(){
        redirect('admin/dashboard');
    }

    function manage($house_name){
        $data['house'] = $this->house_model->get_house_from_name($house_name);

        $data['title'] = 'DASHBOARD';
        $data['main_content'] = 'admin/house_view';
        $data['script'] = array('shared/tiny_mce/tiny_mce', 'dashboard_script');
        $this->load->view('shared/admin_master', $data);
    }
    function manage_post(){
        if($this->house_model->edit_house()){
            $this->session->set_flashdata('message', '<div class="success">ปรับข้อมูล '.$this->input->post('house_name').' เรียบร้อยแล้ว</div>');
            redirect('admin/house/manage/'.$this->input->post('house_name_eng'));
        }
        else {
            $this->session->set_flashdata('message', validation_errors('<div class="error">', '</div>'));
            redirect('admin/house/manage/'.$this->input->post('house_name_eng'));
        }
    }

}