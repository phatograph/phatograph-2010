<?php

class Old_promotions_model extends Model {

    function Old_promotions_model() {
        parent::Model();
    }

    function get_promotion($id) {
        $data = array();
        $this->db->where('id',$id);
        $Q = $this->db->getwhere('promotions');
        if($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }
    function get_promotion_name($id) {
        $this->db->where('id',$id);
        $Q = $this->db->getwhere('promotions');
        if($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data['title'];
    }

    function get_all_promotions() {
        $data = array();
        $this->db->order_by('id');
        $Q = $this->db->get('promotions');
        if($Q->num_rows() > 0) {
            foreach($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function get_all_promotions_pagination($perpage, $segment) {
        $data = array();
        $this->db->order_by('id');
        $Q = $this->db->get('promotions', $perpage, $segment);
        if($Q->num_rows() > 0) {
            foreach($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function add_promotion() {
        $this->form_validation->set_rules('title','Title','trim|required|max_length[255]');
        $this->form_validation->set_rules('content','Content','trim|required');
        $this->form_validation->set_rules('price','Price','trim|required|is_natural');

        if($this->form_validation->run()) {
            $data = array(
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                    'price' => $this->input->post('price')
            );
            $this->db->insert('promotions',$data);
            return true;
        }
        else return false;
    }

    function edit_promotion() {
        $this->form_validation->set_rules('title','Title','trim|required|max_length[255]');
        $this->form_validation->set_rules('content','Content','trim|required');
        $this->form_validation->set_rules('price','Price','trim|required|is_natural');

        if($this->form_validation->run()) {
            $data = array(
                    'title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                    'price' => $this->input->post('price')
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('promotions',$data);
            return true;
        }
        else return false;
    }

    function delete_promotion($id) {
        $this->db->where('id', $id);
        $this->db->delete('promotions');
    }

}