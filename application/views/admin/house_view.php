<h3 class="manage-rate">
    จัดการราคาห้องพัก
</h3>
<?php echo form_open('admin/house/manage_post'); ?>
<div class="housebox">
    <div class="housename">
        <?php echo $house['house_name']; ?>
    </div>
    <div class="houseinfo">
        <strong>วันจันทร์ - วันพฤหัส</strong>  หลังละ
        <?php echo form_input('house_weekday_price', $house['house_weekday_price'], 'style="width:3em;"'); ?>
        บาท / คืน /
        <?php echo form_input('house_weekday_person', $house['house_weekday_person'], 'style="width:2em;"'); ?> ท่าน
        |
        <strong>วันศุกร์ - วันอาทิตย์</strong>  หลังละ
        <?php echo form_input('house_weekend_price', $house['house_weekend_price'], 'style="width:3em;"'); ?>
        บาท / คืน /
        <?php echo form_input('house_weekend_person', $house['house_weekend_person'], 'style="width:2em;"'); ?> ท่าน
        |
        <strong>อาหารเช้า</strong>
        <?php
            if($house['house_breakfast'] == 1) echo form_checkbox('house_breakfast', '1', 'true');
            else echo form_checkbox('house_breakfast', '1');
        ?>
    </div>
</div>
<div class="submitarea">
    <?php echo form_hidden('house_id', $house['house_id']); ?>
    <?php echo form_hidden('house_name', $house['house_name']); ?>
    <?php echo form_hidden('house_name_eng', $house['house_name_eng']); ?>
    <?php echo form_submit('submit','Save Rate', 'class = "button-green dm-150 p-3"'); ?>
    <?php echo anchor('admin/dashboard','กลับหน้าหลัก'); ?>
</div>
<?php echo form_close(); ?>
<?php
    if ($this->session->flashdata('message')) {
        echo
        "<div class='responsearea'>"
            .$this->session->flashdata('message')
        ."</div>";
    }
?>