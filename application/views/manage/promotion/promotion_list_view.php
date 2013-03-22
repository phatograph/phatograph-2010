<?php

if(count($promotions) && is_array($promotions)){
	foreach($promotions as $key => $list)
	{
		echo '<div id="promotion-'.$list['id'].'" class="promotionline dm-600 fl pt-5 pb-5 bb-1-f1">';
		echo '<div class="dm-50 fl">'.$list['id'].'</div>';
		echo '<div class="dm-350 fl">'.anchor('manage/promotion/detail/'.$list['id'], $list['title'], 'class="adetail"').' <span class="fs-10">('.p_money_format($list['price']).' baht)</span></div>';
		echo '<div class="aclick dm-200 fl al-r">'.anchor('manage/promotion/edit/'.$list['id'],'edit', array('class'=>'aedit fs-11','id'=>'e'.$list['id']));
		echo ' | ';
		echo anchor('manage/promotion/delete/'.$list['id'],'delete','class="fs-11"').'</div>';
		echo '</div>';
	}	
}
else{
	echo 'No records';	
}

?>
<div id="promotion_pagination" class="pt-30 dm-620 fl al-c">
	<?php echo $this->pagination->create_links(); ?>
</div>