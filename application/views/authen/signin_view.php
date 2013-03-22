<div class="authencontent">
    <h3>Administrator login</h3>
    <div class="loginzone">
        <div class="wrapper clearfix">
            <?php echo form_open('authen/signin/verify'); ?>
            <div class="line">
                <div class="left">
                    <label for="username">username</label>
                </div>
                <div class="right">
                    <?php echo form_input('username', set_value('username')); ?>
                </div>
            </div>
            <div class="line">
                <div class="left">
                    <label for="password">password</label>
                </div>
                <div class="right">
                    <?php echo form_password('password', set_value('password')); ?>
                </div>
            </div>
            <div class="line submit">
                <div class="left">
                    &nbsp;
                </div>
                <div class="right">
                    <?php echo form_submit('submit', 'sign in', 'class = "button-green p-3 dm-80"'); ?>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
        <span class="clearall"></span>
        <?php
            if ($this->session->flashdata('message')) {
                echo "<div class='fw-b fs-10 pt-10 fc-red al-c'>".$this->session->flashdata('message')."</div>";
            }
        ?>
    </div>
</div>