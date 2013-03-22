<?php

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */

class Gallery extends Controller {

    function Gallery() {
        parent::Controller();
        require_once('./FirePHPCore/fb.php');
        $this->authen_model->is_signed_in();
    }

    function index() {
        $data['images'] = $this->image_model->get_all_images();

        $data['title'] = 'DASHBOARD';
        $data['main_content'] = 'admin/gallery_view';
        $data['script'] = array('gallery_script','shared/lightbox/js/jquery.lightbox-0.5');
        $data['css'] = 'script/shared/lightbox/css/jquery.lightbox-0.5';
        $this->load->view('shared/admin_master', $data);
    }

    function add() {

        $data['title'] = 'DASHBOARD';
        $data['main_content'] = 'admin/gallery_add_view';
        $data['script'] = array();
        $this->load->view('shared/admin_master', $data);
    }

    function add_post() {
        $result = $this->image_model->add_image();

        if($result['success'] == 1) {
            $this->session->set_flashdata('message', '<div class="success">เพิ่มรูปภาพเรียบร้อยแล้ว</div>');
            redirect('admin/gallery');
        }
        else {
            $this->session->set_flashdata('message', $result['error']['error']);
            redirect('admin/gallery/add');
        }
    }

    function delete($image_id) {
        $data['image'] = $this->image_model->get_image($image_id);

        $data['title'] = 'DASHBOARD';
        $data['main_content'] = 'admin/gallery_delete_view';
        $data['script'] = array();
        $this->load->view('shared/admin_master', $data);
    }

    function delete_post($image_id) {
        $this->image_model->delete_image($image_id);

        $this->session->set_flashdata('message', '<div class="success">ลบรูปภาพเรียบร้อยแล้ว</div>');
        redirect('admin/gallery');
    }

}