<?php $this->load->view('shared/header'); ?>

<script type="text/javascript" src ="<?php echo base_url().'/script/home_script.js'; ?>"></script>

<div class="container">
    <div class="wrapper">
        <div class="clearfix">
            <div class="siteinfo">
                <a href="<?= base_url() ?>">
                    <h1>
                        Phatograph.com
                    </h1>
                </a>
                <div class="content">
                    <?php $this->load->view($main_content); ?>
                </div>

            </div>
            <div class="menu">
                <div class="clearfix">
                    <div class="menubox">
                        <?php echo anchor(base_url(), 'Home'); ?>
                        <div class="info">phatograph.com</div>
                    </div>
                    <!--<div class="menubox">
                        <?php echo anchor('archives', 'Archives'); ?>
                        <div class="info">my experiments</div>
                    </div>-->
                    <div class="menubox">
                        <?php echo anchor('home/projects', 'Projects', 'class="expandable"'); ?>
                        <div class="info">ongoing projects</div>
                        <div class="submenu">
                            <ul>
                                <li><?php echo anchor('http://kiangdaoresort.com/', 'Kiangdao Resort'); ?></li>
                                <li><?php echo anchor('http://formarchitect.net', 'Form Architect'); ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="menubox">
                        <?php echo anchor('portfolio', 'Portfolio', 'class="expandable"'); ?>
                        <div class="info">recent works</div>
                        <div class="submenu">
                            <ul>
                                <li><?php echo anchor('portfolio/cscu_openhouse_2007', 'CSCU Open House 2007'); ?></li>
                                <li><?php echo anchor('portfolio/cscu_ms_plan_ads', 'CSCU MD. Plan Newspaner Ads.'); ?></li>
                                <li><?php echo anchor('portfolio/cscu_notebook_ui_dsgn', 'CSCU 2301350 Notebook UI Design'); ?></li>
                                <li><?php echo anchor('portfolio/workpoint_plate', 'Workpoint Studio Plate for ASA Competition'); ?></li>
                                <li><?php echo anchor('portfolio/cscu_13_yearbook', 'CSCU #13 Yearbook'); ?></li>
                                <li><?php echo anchor('portfolio/sakchai_design', 'Sakchai Solution Site design'); ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="menubox">
                        <?php echo anchor('about', 'About'); ?>
                        <div class="info">phatography !</div>
                    </div>
                    <div class="menubox">
                        <?php echo anchor('contact', 'Contact'); ?>
                        <div class="info">want any site ?</div>
                    </div>
                </div>
                <span class="clearall"></span>
            </div>
        </div>
        <span class="clearall"></span>
    </div>
    <div class="footer">
        <div class="content">Copyright &#169 2010 Phatograph Project</div>
        <div class="subs">powered by CodeIgniter and Doctrine.</div>
    </div>
</div>

<?php $this->load->view('shared/footer'); ?>