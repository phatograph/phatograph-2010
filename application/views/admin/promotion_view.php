<h3 class="manage-promotion">
    จัดการโปรโมชั่น
</h3>
<?php echo form_open('admin/promotion/promotion_post'); ?>
<div class="pb-10">
    <?php
        $tset = array(
            'name'        => 'content',
            'value'       => $promotion['content']
        );
        echo form_textarea($tset);
    ?>
</div>
<div class="submitarea">
    <?php echo form_submit('submit','Save Promotion', 'class = "button-green dm-150 p-3"'); ?>
    <?php echo anchor('admin/dashboard','กลับหน้าหลัก'); ?>
</div>
<?php echo form_close(); ?>
<?php
    if ($this->session->flashdata('message')) {
        echo
        '<div class="responsearea">'
            .$this->session->flashdata('message')
        .'</div>';
    }
?>