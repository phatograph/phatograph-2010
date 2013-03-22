<?php

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */

class Dashboard extends Controller {

    function Dashboard() {
        parent::Controller();
        require_once('./FirePHPCore/fb.php');
        $this->authen_model->is_signed_in();
    }

    function index(){
        $data['promotion'] = $this->promotion_model->get_promotion(1);
        $data['houses'] = $this->house_model->get_all_houses();

        $data['title'] = 'DASHBOARD';
        $data['main_content'] = 'admin/dashboard_view';
        $data['script'] = array('shared/tiny_mce/tiny_mce', 'dashboard_script');
        $this->load->view('shared/admin_master', $data);
    }

    function promotion_post()
    {
        if($this->promotion_model->edit_promotion(1)){
            $this->session->set_flashdata('message', 'เปลี่ยนโปรโมชั่นเรียบร้อยแล้ว');
            redirect('admin/dashboard');
        }
        else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('admin/dashboard');
        }
    }

    function rate_post()
    {
        
    }

}