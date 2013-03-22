<div class="pb-10 fs-16"><strong>Edit (ID:<?php echo $promotion['id']; ?>) <?php echo $promotion['title']; ?></strong></div>

<?php echo form_open('manage/promotion/edit_post/'.$promotion['id'], array('id' => 'promotion_form')); ?>

<label for="title">title</label>
<?php echo form_input('title', $promotion['title'], 'id="title"'); ?>
<label for="content">content</label>
<?php $tset = array(
		'name'      => 'content',
		'id'		=> 'content',
		'value'     => $promotion['content'],
		'rows'		=> '5',
		'cols'      => '20'
		);
echo form_textarea($tset); ?>

<label for="price">price</label>
<?php echo form_input('price', $promotion['price'], 'id="price"'); ?>

<input type="hidden" name="id" id="id" value="<?php echo $promotion['id'] ?>" />
<?php echo form_submit('submit','save', 'id="editsubmit"'); ?>
<span id="submitloader" class="ml-5"></span>

<?php echo form_close(); ?>

<div id="errors" class="fw-b fc-red pt-10">
</div>