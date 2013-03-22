<?php

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Session $session
 */

class Promotion_model extends Model {

    function Promotion_model() {
        parent::Model();
        require_once('./FirePHPCore/fb.php');
    }

    function get_promotion($id) {
        $data = array();
        $this->db->where('promotion_id',$id);
        $Q = $this->db->getwhere('promotions');
        if($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function edit_promotion($id) {
        $this->form_validation->set_rules('content','รายละเอียดโปรโมชั่น','trim|required');
        $this->form_validation->set_message('required', 'กรุณาใส่%s');
        if($this->form_validation->run()) {
            $data = array(
                    'content' => $this->input->post('content')
            );
            $this->db->where('promotion_id', $id);
            $this->db->update('promotions',$data);
            return true;
        }
        else return false;
    }

}