<?php

class Gallery_model extends Model {
    
    function Gallery_model() {
        parent::Model();
        require_once('./FirePHPCore/fb.php');
    }

    var $upload_path = 'images/upload/gallery/';

    function get_image($id) {
        $data = array();
        $this->db->where('img_id',$id);
        $Q = $this->db->getwhere('gallery');
        if($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function get_image_from_name($img_name) {
        $data = array();
        $this->db->where('img_name', $img_name);
        $Q = $this->db->getwhere('gallery');
        if($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function get_image_name($id) {
        $pimg = $this->get_image($id);
        return $pimg['img_name'];
    }

    function get_all_images() {
        $data = array();
        $this->db->order_by('img_id');
        $Q = $this->db->get('gallery');
        if($Q->num_rows() > 0) {
            foreach($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function get_all_images_pagination($perpage, $segment) {
        $data = array();
        $this->db->order_by('img_id');
        $Q = $this->db->get('gallery', $perpage, $segment);
        if($Q->num_rows() > 0) {
            foreach($Q->result_array() as $row) {
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
    }

    function add_image() {
        $result['success'] = '0';
        $result['error'] = '';

        $this->load->library('upload', $this->get_image_config());

        $this->form_validation->set_rules('short_desc','Short description','trim|required|max_length[255]');
        $this->form_validation->set_rules('long_desc','Long description','trim|required|');

        if ($this->form_validation->run()) {
            if($this->upload->do_upload()) {
                $image = $this->upload->data();
                $data = array(
                        'img_name' => $image['file_name'],
                        'path' => $this->upload_path.$image['file_name'],
                        'short_desc' => $this->input->post('short_desc'),
                        'long_desc' => $this->input->post('long_desc'),
                );
                $this->db->insert('gallery',$data);

                $this->get_thumbnail_resize($image['file_name'],'100','100', $image['image_width'], $image['image_height']);

                $result['success'] = 1;
            }
            else {
                $result['error'] = array('error' => $this->upload->display_errors());
            }
        }
        return $result;

    }

    function edit_image_desc() {
        $this->form_validation->set_rules('short_desc','Short description','trim|required|max_length[255]');
        $this->form_validation->set_rules('long_desc','Long description','trim|required|');

        if ($this->form_validation->run()) {
            $data = array(
                    'short_desc' => $this->input->post('short_desc'),
                    'long_desc' => $this->input->post('long_desc'),
            );
            $this->db->where('img_id', $this->input->post('img_id'));
            $this->db->update('gallery',$data);
            return true;
        }
        else return false;
    }

    function edit_image_image() {
        $old_image = $this->get_image($this->input->post('img_id'));
        unlink('./'.$this->upload_path.$old_image['img_name']);
        unlink('./'.$this->upload_path.'thumb_100x100/'.$old_image['img_name']);

        $result['success'] = '0';
        $result['error'] = '';

        $this->load->library('upload', $this->get_image_config());

        if($this->upload->do_upload()) {
            $image = $this->upload->data();
            $data = array(
                    'img_name' => $image['file_name'],
                    'path' => $this->upload_path.$image['file_name'],
                    'short_desc' => $this->input->post('short_desc'),
                    'long_desc' => $this->input->post('long_desc'),
            );
            $this->db->where('img_id', $this->input->post('img_id'));
            $this->db->update('gallery',$data);

            $this->get_thumbnail_resize($data['img_name'],'100','100', $image['image_width'], $image['image_height']);

            $result['success'] = 1;
        }
        else {
            $result['error'] = array('error' => $this->upload->display_errors());
            return $result;
        }
        return $result;
    }

    function delete_image($id) {
        $image = $this->get_image($id);
        unlink('./'.$this->upload_path.$image['img_name']);
        unlink('./'.$this->upload_path.'thumb_100x100/'.$image['img_name']);

        $this->db->where('img_id', $id);
        $this->db->delete('gallery');
    }

    function get_image_config() {
        $config['upload_path'] = './'.$this->upload_path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1024';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['remove_spaces'] = true;
        //$config['encrypt_name'] = true;
        $config['overwrite'] = false;

        return $config;
    }

    function get_thumbnail_resize($source_name, $x, $y, $ix, $iy) {
        $config['image_library'] = 'GD2';
        $config['source_image'] = './'.$this->upload_path.$source_name;
        $config['new_image'] = './'.$this->upload_path.'thumb_'.$x.'x'.$y.'/'.$source_name;
        $config['quality'] = '100%';

        if($ix > $iy)						// the image is landscape
        {
            $config['width'] = $iy;
        }
        else if($iy > $ix)					// the image is portrait
        {
            $config['height'] = $ix;
        }
        else {
            $config['width'] = $ix;
            $config['height'] = $iy;
        }
        $this->load->library('image_lib', $config);
        $this->image_lib->crop();

        $this->image_lib->clear();

        $config['image_library'] = 'GD2';
        $config['quality'] = '100%';
        $config['source_image'] = './'.$this->upload_path.'thumb_'.$x.'x'.$y.'/'.$source_name;
        $config['maintain_ratio'] = TRUE;
        $config['height'] = $y;
        $config['width'] = $x;

        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }
}