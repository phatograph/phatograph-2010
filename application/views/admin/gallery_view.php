<div class="gallerycontent">
    <h3 class="manage-gallery">
        จัดการภาพบรรยากาศ
    </h3>
    <div class="displayimage">
        <div class="clearfix">
        <?php
            if(count($images) && is_array($images)){
                foreach($images as $key => $list)
                {
                    echo '<div class="imagebox">';
                        echo '<a class="lightbox" href="'.base_url().'images/gallery/uploaded/'.$list['image_name'].'">';
                            echo '<img alt="'.$list['image_name'].'" src="'.base_url().'images/gallery/uploaded/thumb_120x120/'.$list['image_name'].'" alt="'.$list['image_name'].'" title="'.$list['image_name'].'" />';
                        echo '</a>';
                        echo '<div class="deletebox">';
                            echo anchor('admin/gallery/delete/'.$list['image_id'], '<img src="'.base_url().'images/admin/cross.png" alt="del" title="delete '.$list['image_name'].'" />');
                        echo '</div>';
                    echo '</div>';
                }
            }
            else{
                echo '<div class="norecords">';
                    echo 'ไม่มีรูปภาพ กรุณาเพิ่มรูปภาพ';
                echo '</div>';
            }
        ?>
        </div>
        <span class="clearall"></span>
    </div>
    <div class="addimage">
        <?php echo anchor('admin/gallery/add','เพิ่มรูปภาพ'); ?>
        |
        <?php echo anchor('admin/dashboard','กลับหน้าหลัก'); ?>
    </div>
    <?php
        if ($this->session->flashdata('message')) {
            echo
            "<div class='responsearea'>"
                .$this->session->flashdata('message')
            ."</div>";
        }
    ?>
</div>