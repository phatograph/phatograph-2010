<?php

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */

class Archives extends Controller {

    function  __construct() {
        parent::Controller();
        require_once('./FirePHPCore/fb.php');
    }

    function index() {

    }

}