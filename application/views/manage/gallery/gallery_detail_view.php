<div class="container-300 pb-20">
	<div class="fs-16 mb-10">
		<strong><?php echo $image['short_desc']; ?></strong>
	</div>
	<div class="bb-1-ccc fw-b fs-10">
		ID No.<?php echo $image['img_id'] ?>
	</div>
	<div class="al-r mb-10">
		<?php echo anchor('manage/gallery/edit_image/'.$image['img_id'],'edit image', 'class="fw-b fs-10"'); ?>
		<?php echo ' | '; ?>
		<?php echo anchor('manage/gallery/edit_desc/'.$image['img_id'],'edit content', 'class="fw-b fs-10"'); ?>
	</div>
	<div>
		<?php echo $image['long_desc']; ?>
	</div>
</div>
<div class="al-c fs-10 fw-b">
	<?php echo $image['img_name']; ?>
</div>
<div class="al-c pb-20">
	<img src="<?php echo base_url().$image['path']; ?>" alt="img" />
</div>