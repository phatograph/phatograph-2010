<div class="pb-10 fs-16"><strong>Edit description of <?php echo $image['short_desc']; ?></strong></div>

<?php echo form_open_multipart('manage/gallery/edit_desc_post/'.$image['img_id'], array('id' => 'promotion_form')); ?>

<label for="short_desc">short desc</label>
<?php echo form_input('short_desc', $image['short_desc']); ?><br />
<label for="long_desc">long desc</label>
<div class="dm-400">
<?php $tset = array(
		'name'      => 'long_desc',
		'value'     => $image['long_desc']
		);
echo form_textarea($tset); ?>
<script type="text/javascript">
	$(function() {
		tinyMCE.init({
			theme : "advanced",
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,hr,|,link,unlink,|,bullist,numlist,|,outdent,indent,|,code",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			mode: "textareas",
			convert_newlines_to_brs : true,
			width : 400
		});
	});
</script>
</div>
<?php echo form_hidden('img_id', $image['img_id']) ?>
<?php echo form_submit('submit','edit image'); ?>


<?php echo form_close(); ?>

<?php echo validation_errors(); ?>