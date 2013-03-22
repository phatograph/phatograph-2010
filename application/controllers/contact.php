<?php

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */

class Contact extends Controller {

    function Contact() {
        parent::Controller();
        require_once('./FirePHPCore/fb.php');
    }

    function index() {
        $data['main_content'] = 'contact_view';
        //$data['script'] = '';
        $this->load->view('shared/home_master', $data);
    }

}