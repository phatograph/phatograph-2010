<?php

class Image_model extends Model {

    function Image_model() {
        parent::Model();
        require_once('./FirePHPCore/fb.php');
    }

    var $upload_path = 'images/gallery/uploaded/';

    function get_image($id) {
        $data = array();
        $this->db->where('image_id',$id);
        $Q = $this->db->getwhere('images');
        if($Q->num_rows() > 0) {
            $data = $Q->row_array();
        }
        $Q->free_result();
        return $data;
    }

    function get_all_images(){
        $data = array();
        $this->db->order_by('image_id');
        $Q = $this->db->get('images');
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
        if($this->upload->do_upload()) {
            $image = $this->upload->data();
            $data = array(
                'image_name' => $image['file_name'],
                'image_path' => $this->upload_path.$image['file_name'],
            );
            $this->db->insert('images',$data);
            
            $this->get_thumbnail_resize($image['file_name'],120,120, $image['image_width'], $image['image_height']);

            $result['success'] = 1;
        }
        else {
            $result['error'] = array('error' => $this->upload->display_errors('<div class="error">','</div>'));
        }
        return $result;
    }

    function delete_image($image_id) {
        $image = $this->get_image($image_id);
        unlink('./'.$this->upload_path.$image['image_name']);
        unlink('./'.$this->upload_path.'thumb_120x120/'.$image['image_name']);

        $this->db->where('image_id', $image_id);
        $this->db->delete('images');
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