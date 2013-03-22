<div class="fw-b fs-16 al-c pt-20 pb-10">Change Password</div>
<div class="container-300 bd-1-ccc">
	<div class="ps-10 pt-20 pb-10 clearfix">
		<?php echo form_open('manage/account/change_password'); ?>
		<div class="dm-280 fl mb-10 pb-10 bb-1-ccc">
			<div class="dm-100 fl fw-b fs-10 al-r mr-10">
				<label for="password" class="fs-10">old password :</label>
			</div>
			<div class="dm-170 fl">
				<?php echo form_password('password'); ?>
			</div>
		</div>
		<div class="dm-280 fl mb-3">
			<div class="dm-100 fl fw-b al-r mr-10">
				<label for="new_password" class="fs-10">new password :</label>
			</div>
			<div class="dm-170 fl">
				<?php echo form_password('new_password'); ?>
			</div>
		</div>
		<div class="dm-280 fl mb-10">
			<div class="dm-100 fl fw-b fs-10 al-r mr-10">
				<label for="confirm_password" class="fs-10">confirm password :</label>
			</div>
			<div class="dm-170 fl">
				<?php echo form_password('confirm_password'); ?>
			</div>
		</div>
		<div class="dm-280 fl al-c">
			<?php echo form_hidden('username', $this->session->userdata('username')); ?>
			<?php echo form_submit('submit', 'change password'); ?>
		</div>
		<?php echo form_close(); ?>
	</div>
	<span class="clearall"></span>
<?php
if ($this->session->flashdata('message')){
	echo "<div class='fw-b fs-10 pb-10 fc-red al-c'>".$this->session->flashdata('message')."</div>";
}
?>
</div>
<div class="container-300 pb-20 al-r fw-b fs-10">
	powered by codeigniter
</div>