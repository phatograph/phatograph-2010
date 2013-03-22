<div class="pb-10 fs-16"><strong>Edit image of <?php echo $image['short_desc']; ?></strong></div>

<?php echo form_open_multipart('manage/gallery/edit_image_post/'.$image['img_id'], array('id' => 'promotion_form')); ?>

<label for="short_desc">new image</label>
<?php echo form_upload('userfile'); ?><br />

<?php echo form_hidden('img_id', $image['img_id']) ?>
<?php echo form_hidden('short_desc', $image['short_desc']) ?>
<?php echo form_hidden('long_desc', $image['long_desc']) ?>
<?php echo form_submit('submit','edit image'); ?>


<?php echo form_close(); ?>

<?php echo $error['error']; ?>
<?php echo validation_errors(); ?>