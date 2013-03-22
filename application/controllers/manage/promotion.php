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

    private $title = 'PROMOTION';
    private $header_content = 'PROMOTION';

    function Promotion() {
        parent::Controller();
        $this->authen_model->is_signed_in();

        require_once('./FirePHPCore/fb.php');
    }

    function index() {
        $config['base_url'] = base_url().'/manage/promotion/index';
        $config['total_rows'] = $this->db->get('promotions')->num_rows();
        $config['per_page'] = 5;
        $config['num_links'] = 3;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);

        $data['promotions'] = $this->promotion_model->get_all_promotions_pagination($config['per_page'], $this->uri->segment(4));

        $data['title'] = $this->title;
        $data['script'] = array('promotion_script');
        $data['header_content'] = $this->header_content;
        $data['main_content'] = 'promotion/promotion_view';

        $this->load->view('shared/manage_master', $data);
    }

    function list_promotions() {
        $config['base_url'] = base_url().'/manage/promotion/list_promotions';
        $config['total_rows'] = $this->db->get('promotions')->num_rows();
        $config['per_page'] = 5;
        $config['num_links'] = 3;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);

        $data['promotions'] = $this->promotion_model->get_all_promotions_pagination($config['per_page'], $this->uri->segment(4));

        $data['main_content'] = 'promotion/promotion_list_view';
        $this->load->view('manage/'.$data['main_content'], $data);
    }

    function add() {
        $data['title'] = $this->title;
        $data['header_content'] = $this->header_content;
        $data['main_content'] = 'promotion/promotion_add_view';

        if($this->input->post('ajax') == 1) {
            $this->load->view('manage/'.$data['main_content'], $data);
        }
        else {
            $this->load->view('shared/manage_master', $data);
        }
    }

    function add_post() {
        if($this->promotion_model->add_promotion()) {
            if($this->input->post('ajax') == 1) {
                echo '1'.'Promotion ['.$this->input->post('title').'] added';
            }
            else {
                $this->session->set_flashdata('message', 'Promotion is added');
                redirect('manage/promotion');
            }
        }
        else {
            echo validation_errors();
        }
    }

    function detail($id) {
        $data['title'] = $this->title;
        $data['header_content'] = $this->header_content;
        $data['main_content'] = 'promotion/promotion_detail_view';

        $data['promotion'] = $this->promotion_model->get_promotion($id);

        if($this->input->post('ajax') == 1) {
            $this->load->view('manage/'.$data['main_content'], $data);
        }
        else {
            $this->load->view('shared/manage_master', $data);
        }
    }

    function edit($id) {
        $data['title'] = $this->title;
        $data['header_content'] = $this->header_content;
        $data['main_content'] = 'promotion/promotion_edit_view';

        $data['promotion'] = $this->promotion_model->get_promotion($id);

        if($this->input->post('ajax') == 1) {
            $this->load->view('manage/'.$data['main_content'], $data);
        }
        else {
            $this->load->view('shared/manage_master', $data);
        }
    }

    function edit_post($id) {
        if($this->promotion_model->edit_promotion()) {
            if($this->input->post('ajax') == 1) {
                echo '1'.$this->get_flashdata($this->input->post('id'), 'is editted');
            }
            else {
                $this->session->set_flashdata('message', $this->get_flashdata($id, 'is editted'));
                redirect('manage/promotion');
            }
        }
        else {
            echo validation_errors();
        }
    }

    function delete($id) {
        $this->session->set_flashdata('message', $this->get_flashdata($id, 'is deleted'));

        $this->promotion_model->delete_promotion($id);
        redirect('manage/promotion');
    }

    function get_flashdata($id, $method) {
        $promotion = $this->promotion_model->get_promotion($id);
        return 'Promotion [(ID:'.$promotion['id'].') '.$promotion['title'].'] '.$method;
    }

}