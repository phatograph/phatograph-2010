<div class="pb-10" style="font-size:16px;"><strong>Manage Gallery</strong> |
<?php echo anchor('manage/gallery/add','Add new picture'); ?></div>

<?php
if ($this->session->flashdata('message')){
	echo "<div class='fw-b fc-red pb-10'>".$this->session->flashdata('message')."</div>";
}
?>

<div class="clearfix">
<?php

if(count($images) && is_array($images)){
	foreach($images as $key => $list)
	{
		echo '<div class="dm-100 fl mr-5 pb-10">';
		echo '<div class="dm-100 fl" style="height:145px; overflow-y:hidden;">';
		echo '<div class="dm-100 al-c fl mb-3" style="height:101px; overflow-x:hidden;">';
		echo anchor('manage/gallery/detail/'.$list['img_id'], '<img src="'.base_url().'images/upload/gallery/thumb_100x100/'.$list['img_name'].'" alt="img" />');
		echo '</div>';
		echo '<div class="dm-100 al-c fl fs-10" style="line-height:1.3em;">';
		echo anchor('manage/gallery/detail/'.$list['img_id'], $key.'. ['.$list['img_id'].'] '.$list['short_desc'].'</div>', 'class="fs-10"');
		echo '</div>';
		echo '<div class="dm-100 al-r fl">';
		echo anchor('manage/gallery/delete/'.$list['img_id'],'delete','class="fw-b fs-10"').'</div>';
		echo '</div>';
	}	
}
else{
	echo 'No records';	
}

?>
</div>
<span class="clearall"></span>

<div class="pt-10 dm-840 al-c"><?php echo $this->pagination->create_links(); ?></div>