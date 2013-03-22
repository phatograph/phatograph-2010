<div class="pb-10 fs-16"><strong>Add new promotion</strong></div>

<?php echo form_open('manage/promotion/add_post', array('id' => 'promotion_form')); ?>

<label for="title">title</label>
<?php echo form_input('title', set_value('title'), 'id="title"'); ?>
<label for="content">content</label>
<?php $tset = array(
		'name'      => 'content',
		'id'		=> 'content',
		'value'     => set_value('content'),
		'rows'		=> '5',
		'cols'      => '10',
		);
echo form_textarea($tset); ?>
<label for="price">price</label>
<?php echo form_input('price', set_value('price'), 'id="price"'); ?>
<?php echo form_submit('submit','save', 'id="addsubmit"'); ?>
<span id="submitloader" class="ml-5"></span>


<?php echo form_close(); ?>

<div id="errors" class="fw-b fc-red pt-10">
</div>