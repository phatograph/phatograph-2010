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

class House_model extends Model {

    function House_model() {
        parent::Model();
        require_once('./FirePHPCore/fb.php');
    }

    function get_all_houses() {
        $data = array();
        $this->db->order_by('house_id');
        $Q = $this->db->get('houses');
        if($Q->num_rows() > 0) {
            foreach($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function get_house_from_name($house_name) {
        $data = array();
        $this->db->where('house_name_eng', $house_name);
        $Q = $this->db->getwhere('houses');
        if($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function edit_house() {
        $this->form_validation->set_rules('house_weekday_price','ราคาสำหรับวันธรรมดา','trim|required|is_natural');
        $this->form_validation->set_rules('house_weekday_person','จำนวนคนสำหรับวันธรรมดา','trim|required|is_natural');
        $this->form_validation->set_rules('house_weekend_price','ราคาสำหรับวันหยุด','trim|required|is_natural');
        $this->form_validation->set_rules('house_weekend_person','จำนวนคนสำหรับวันหยุด','trim|required|is_natural');
        $this->form_validation->set_message('required', 'กรุณาใส่%s');
        $this->form_validation->set_message('is_natural', 'กรุณาใส่%s เป็นเลขจำนวนเต็มบวกเท่านั้น');

        if($this->form_validation->run()) {
            if(isset($_POST['house_breakfast']))
                $house_breakfast = 1;
            else
                $house_breakfast = 0;
            $data = array(
                    'house_id' => $this->input->post('house_id'),
                    'house_weekday_price' => $this->input->post('house_weekday_price'),
                    'house_weekday_person' => $this->input->post('house_weekday_person'),
                    'house_weekend_price' => $this->input->post('house_weekend_price'),
                    'house_weekend_person' => $this->input->post('house_weekend_person'),
                    'house_breakfast' => $house_breakfast
            );
            $this->db->where('house_id', $data['house_id']);
            $this->db->update('houses',$data);
            return true;
        }
        else return false;
    }

}