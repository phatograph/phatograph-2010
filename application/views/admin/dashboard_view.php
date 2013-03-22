<div class="clearfix">
    <div class="managebox">
        <h3 class="manage-promotion">
            จัดการราคาห้องพัก
        </h3>
        <div class="managebody">
            <div class="line">
                <?php echo anchor('admin/promotion', 'เปลี่ยนโปรโมชั่น'); ?>
            </div>
        </div>
    </div>
    <div class="vsep"></div>
    <div class="managebox">
        <h3 class="manage-rate">
            จัดการราคาห้องพัก
        </h3>
        <div class="managebody house">
            <?php if(isset($houses) && is_array($houses)) {
                foreach ($houses as $key => $list){
            ?>
                <?php if($list['is_house'] == 1) { ?>
                    <div class="line">
                        <?php echo anchor('admin/house/manage/'.$list['house_name_eng'], $list['house_name']); ?>
                    </div>
                <?php } ?>
            <?php }
                }
            ?>
        </div>
    </div>
    <div class="vsep"></div>
    <div class="managebox">
        <h3 class="manage-gallery">
            จัดการภาพบรรยากาศ
        </h3>
        <div class="managebody">
            <div class="line">
                <?php echo anchor('admin/gallery', 'จัดการรูปภาพ'); ?>
            </div>
        </div>
    </div>
</div>
<span class="clearall"></span>