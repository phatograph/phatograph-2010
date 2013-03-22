<h3 class="manage-gallery">
    จัดการภาพบรรยากาศ
</h3>
<h3 class="manage-gallery-add border">
    เพิ่มรูปภาพใหม่
</h3>
<div>
    <?php echo form_open_multipart('admin/gallery/add_post', array()); ?>
        <div class="manage-gallery-box">
            <label for="userfile">เลือกรูปภาพ</label>
            <?php echo form_upload('userfile'); ?>
        </div>
        <div class="submitarea">
            <?php echo form_submit('submit','เพิ่มรูปภาพ', 'class = "button-green dm-150 p-3"'); ?>
            <?php echo anchor('admin/gallery','กลับหน้าจัดการรูปภาพ'); ?>
        </div>
<?php echo form_close(); ?>
</div>
<?php
    if ($this->session->flashdata('message')) {
        echo
        "<div class='responsearea'>"
            .$this->session->flashdata('message')
        ."</div>";
    }
?>