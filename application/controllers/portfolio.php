<?php

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */

class Portfolio extends Controller {

    function Portfolio() {
        parent::Controller();
        require_once('./FirePHPCore/fb.php');
    }

    function cscu_openhouse_2007() {
        $data['main_content'] = 'portfolio/portfolio_master';
        $data['port_content'] = 'cscu_openhouse_2007_view';
        $data['script'] = array('portfolio_script', 'shared/lightbox/js/jquery.lightbox-0.5');
        $data['css'] = 'script/shared/lightbox/css/jquery.lightbox-0.5';
        $this->load->view('shared/home_master', $data);
    }

    function cscu_ms_plan_ads() {
        $data['main_content'] = 'portfolio/portfolio_master';
        $data['port_content'] = 'cscu_ms_plan_ads_view';
        $data['script'] = array('portfolio_script', 'shared/lightbox/js/jquery.lightbox-0.5');
        $data['css'] = 'script/shared/lightbox/css/jquery.lightbox-0.5';
        $this->load->view('shared/home_master', $data);
    }

    function cscu_notebook_ui_dsgn() {
        $data['main_content'] = 'portfolio/portfolio_master';
        $data['port_content'] = 'cscu_ui_dsgn_view';
        $data['script'] = array('portfolio_script', 'shared/lightbox/js/jquery.lightbox-0.5');
        $data['css'] = 'script/shared/lightbox/css/jquery.lightbox-0.5';
        $this->load->view('shared/home_master', $data);
    }

    function workpoint_plate(){
        $data['main_content'] = 'portfolio/portfolio_master';
        $data['port_content'] = 'workpoint_plate_view';
        $data['script'] = array('portfolio_script', 'shared/lightbox/js/jquery.lightbox-0.5');
        $data['css'] = 'script/shared/lightbox/css/jquery.lightbox-0.5';
        $this->load->view('shared/home_master', $data);
    }

    function cscu_13_yearbook() {
        $data['main_content'] = 'portfolio/portfolio_master';
        $data['port_content'] = 'cscu_13_yearbook_view';
        $data['script'] = array('portfolio_script', 'shared/lightbox/js/jquery.lightbox-0.5');
        $data['css'] = 'script/shared/lightbox/css/jquery.lightbox-0.5';
        $this->load->view('shared/home_master', $data);
    }

    function sakchai_design() {
        $data['main_content'] = 'portfolio/portfolio_master';
        $data['port_content'] = 'sakchai_design_view';
        $data['script'] = array('portfolio_script', 'shared/lightbox/js/jquery.lightbox-0.5');
        $data['css'] = 'script/shared/lightbox/css/jquery.lightbox-0.5';
        $this->load->view('shared/home_master', $data);
    }

    function underconstr(){
        $data['main_content'] = 'underconstr_view';
        $this->load->view('shared/home_master', $data);
    }

}