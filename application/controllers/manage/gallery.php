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

    private $title = 'GALLERY';
    private $header_content = 'GALLERY';

    function Gallery() {
        parent::Controller();
        $this->authen_model->is_signed_in();

        require_once('./FirePHPCore/fb.php');
    }

    function index() {
        $config['base_url'] = base_url().'/manage/gallery/index';
        $config['total_rows'] = $this->db->get('gallery')->num_rows();
        $config['per_page'] = 8;
        $config['num_links'] = 3;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);

        $data['images'] = $this->gallery_model->get_all_images_pagination($config['per_page'], $this->uri->segment(4));

        $data['title'] = $this->title;
        $data['header_content'] = $this->header_content;
        $data['main_content'] = 'gallery/gallery_view';

        $this->load->view('shared/manage_master', $data);
    }

    function add() {
        $data['error']['error'] = '';
        $data['title'] = $this->title.' ADD';
        $data['header_content'] = $this->header_content;
        $data['main_content'] = 'gallery/gallery_add_view';

        $this->load->view('shared/manage_master', $data);
    }

    function add_post() {
        $data['error']['error'] = '';
        $result = $this->gallery_model->add_image();

        if($result['success'] == 1) {
            $this->session->set_flashdata('message', 'Image is added');
            redirect('manage/gallery');
        }
        else {
            $data['error'] = $result['error'];
            $data['title'] = $this->title.' ADD';
            $data['header_content'] = $this->header_content;
            $data['main_content'] = 'gallery/gallery_add_view';
            $this->load->view('shared/manage_master', $data);
        }
    }

    function detail($id) {
        $data['image'] = $this->gallery_model->get_image($id);

        $data['title'] = $this->title.' DETAIL';
        $data['header_content'] = $this->header_content;
        $data['main_content'] = 'gallery/gallery_detail_view';
        $this->load->view('shared/manage_master', $data);
    }

    function edit_desc($id) {
        $data['error']['error'] = '';
        $data['image'] = $this->gallery_model->get_image($id);

        $data['title'] = $this->title.' EDIT DESC';
        $data['script'] = array('shared/tiny_mce/tiny_mce');
        $data['header_content'] = $this->header_content;
        $data['main_content'] = 'gallery/gallery_edit_desc_view';
        $this->load->view('shared/manage_master', $data);
    }

    function edit_desc_post($id) {
        if($this->gallery_model->edit_image_desc()) {
            $this->session->set_flashdata('message', $this->get_flashdata($id, 'description editted'));
            redirect('manage/gallery');
        }
        else {
            $data['image'] = $this->gallery_model->get_image($id);

            $data['title'] = $this->title.' EDIT DESC';
            $data['header_content'] = $this->header_content;
            $data['main_content'] = 'gallery/gallery_edit_desc_view';
            $this->load->view('shared/manage_master', $data);
        }
    }

    function edit_image($id) {
        $data['error']['error'] = '';
        $data['image'] = $this->gallery_model->get_image($id);

        $data['title'] = $this->title.' EDIT IMAGE';
        $data['header_content'] = $this->header_content;
        $data['main_content'] = 'gallery/gallery_edit_image_view';
        $this->load->view('shared/manage_master', $data);
    }
    function edit_image_post($id) {
        $data['error']['error'] = '';
        $result = $this->gallery_model->edit_image_image();
        if($result['success'] == 1) {
            $this->session->set_flashdata('message', $this->get_flashdata($id, 'image editted'));
            redirect('manage/gallery');
        }
        else {
            $data['image'] = $this->gallery_model->get_image($id);

            $data['error'] = $result['error'];
            $data['title'] = $this->title.' EDIT IMAGE';
            $data['header_content'] = $this->header_content;
            $data['main_content'] = 'gallery/gallery_edit_image_view';
            //print_r($data);
            $this->load->view('shared/manage_master', $data);
        }
    }

    function delete($id) {
        $this->session->set_flashdata('message', $this->get_flashdata($id, 'deleted'));

        $this->gallery_model->delete_image($id);
        redirect('manage/gallery');
    }

    function get_flashdata($id, $method) {
        $img = $this->gallery_model->get_image($id);
        return 'Image [(ID:'.$img['img_id'].') '.$img['img_name'].'] '.$method;
    }

}