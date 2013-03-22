<?php

class Email_model extends Model {

    function Email_model() {
        parent::Model();
        require_once('./FirePHPCore/fb.php');
    }

    function dosendmail() {
        $this->form_validation->set_rules('name','ชื่อ','trim|required|max_length[255]');
        $this->form_validation->set_rules('tel','เบอร์โทรศัพท์','trim|required|is_natural');
        $this->form_validation->set_rules('email','อีเมล','trim|required|valid_email');
        $this->form_validation->set_rules('subject','หัวข้อ','trim|required|max_length[255]');
        $this->form_validation->set_rules('detail','รายละเอียด','trim|required');

        $this->form_validation->set_message('required', '- กรุณาใส่%s');
        $this->form_validation->set_message('is_natural', '- กรุณาใส่แค่ตัวเลขเท่านั้น');
        $this->form_validation->set_message('valid_email', '- กรุณาใส่อีเมลให้ถูกต้อง<br />&nbsp;&nbsp;<span class="fs-10"><u>ตัวอย่าง</u>:&nbsp; mail@hotmail.com</span>');

        if ($this->form_validation->run()) {

            $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'wangrungarun@gmail.com',
                    'smtp_pass' => '',
                    'mailtype' => 'html'
            );

            $data['name'] = $this->input->post('name');
            $data['tel'] = $this->input->post('tel');
            $data['email'] = $this->input->post('email');
            $data['subject'] = $this->input->post('subject');
            $data['detail'] = $this->input->post('detail');

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            $this->email->from('wangrungarun@gmail.com', 'Kiangdao Resort');
            $this->email->to('phatograph@hotmail.com');
            $this->email->subject($data['subject']);
            $this->email->message(
                    '<html><head><title>'.
                    $data['subject'].
                    '</title></head><body>'.
                    '<p><strong>From :</strong> '.$data['name'].'<br />'.
                    '<strong>Tel :</strong> '.$data['tel'].'<br />'.
                    '<strong>E-mail :</strong> '.$data['email'].'</p>'.
                    '<p>'.$data['detail'].
                    '</p>'.
                    '</body></html>'
            );

            if($this->email->send()) {
                //$this->session->set_flashdata('message','Your email was sent.');
                echo '1ได้รับข้อมูลเรียบร้อยแล้ว';
            }
            else {
                echo '- การส่งอีเมลผิดพลาด กรุณาลองอีกครั้ง';
            }
        }
        else {
            echo validation_errors();
        }
    }

}