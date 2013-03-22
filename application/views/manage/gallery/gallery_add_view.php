<div class="pb-10 fs-16"><strong>Add new picture</strong></div>

<?php echo form_open_multipart('manage/gallery/add_post', array('id' => 'promotion_form')); ?>

<label for="userfile">image</label>
<?php echo form_upload('userfile'); ?><br />
<label for="short_desc">short desc</label>
<?php echo form_input('short_desc', set_value('short_desc')); ?><br />
<label for="long_desc">long desc</label>
<?php $tset = array(
		'name'        => 'long_desc',
		'value'       => set_value('short_desc'),
		'rows'		=> '5',
		'cols'        => '20',
		);
echo form_textarea($tset); ?><br />
<?php echo form_submit('submit','add image'); ?>


<?php echo form_close(); ?>

<?php echo $error['error']; ?>
<?php echo validation_errors(); ?>