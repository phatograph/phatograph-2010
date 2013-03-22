<?php

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */

class Promotion extends Controller {

    function Promotion() {
        parent::Controller();
        require_once('./FirePHPCore/fb.php');
        $this->authen_model->is_signed_in();
    }

    function index(){
        $data['promotion'] = $this->promotion_model->get_promotion(1);

        $data['title'] = 'DASHBOARD | PROMOTION';
        $data['main_content'] = 'admin/promotion_view';
        $data['script'] = array('shared/tiny_mce/tiny_mce', 'dashboard_script');
        $this->load->view('shared/admin_master', $data);
    }

    function promotion_post()
    {
        if($this->promotion_model->edit_promotion(1)){
            $this->session->set_flashdata('message', '<div class="success">เปลี่ยนโปรโมชั่นเรียบร้อยแล้ว</div>');
            redirect('admin/promotion');
        }
        else {
            $this->session->set_flashdata('message', validation_errors('<div class="error">', '</div>'));
            redirect('admin/promotion');
        }
    }

}