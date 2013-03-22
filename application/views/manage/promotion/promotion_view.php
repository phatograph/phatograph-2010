<div class="clearfix pb-10">
	<div class="dm-620 fl" style="font-size:16px;">
		<strong>Manage Promotions</strong> |
		<?php echo anchor('manage/promotion/add','Add new promotion', 'class="aadd"'); ?>
		<span id="linkloader" class="ml-5"></span>
	</div>
</div>

<div class="clearfix">
	<div class="dm-620 fl">
		<div id="promotionlist" class="dm-620 fl">
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
		</div>
	</div>
	<div class="fl" style="width:308px;">
		<?php
		if ($this->session->flashdata('message')){
			echo "<div class='fw-b fs-10 fc-red pb-10'>".$this->session->flashdata('message')."</div>";
		}
		?>
		<div id="formfield">
		</div>
	</div>
</div>
<span class="clearall"></span>