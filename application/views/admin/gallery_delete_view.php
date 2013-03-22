<h3 class="manage-gallery">
    จัดการภาพบรรยากาศ
</h3>
<h3 class="manage-gallery-add">
    <?php echo $image['image_name']; ?><br />
    ลบรูปภาพนี้ ?
</h3>
<div>
    <?php echo form_open_multipart('admin/gallery/delete_post/'.$image['image_id'], array()); ?>
        <div class="manage-gallery-box submitarea">
            <?php echo form_hidden('image_id', $image['image_id']); ?>
            <?php echo form_submit('submit','ลบรูปภาพ', 'class = "button-red dm-100 p-3"'); ?>
            <?php echo anchor('admin/gallery','กลับหน้าจัดการรูปภาพ'); ?>
        </div>
        <div class="manage-gallery-box">
            <img src="<?php echo base_url().$image['image_path']; ?>" alt="<?php echo $image['image_name']; ?>" />
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