<?php echo doctype('xhtml1-trans'); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <?php
        echo link_tag('css/style.css');
        echo link_tag('css/grid.css');
        ?>

        <?php
        if(isset($css)) {
            if(is_array($css)) {
                foreach($css as $key => $list) {
                    echo '<link type="text/css" rel="stylesheet" href="'.base_url().$list.'.css" />';
                }
            }
            else {
                echo '<link type="text/css" rel="stylesheet" href="'.base_url().$css.'.css" />';
            }
        }
        ?>


        <script type="text/javascript" src="<?php echo base_url(); ?>script/shared/jquery/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>script/shared/jquery/jQueryColor.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>script/shared/jquery/jQueryEasing.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>script/shared/jquery/jQueryUI.js"></script>

        <!--
        <script src="http://www.google.com/jsapi?key=ABQIAAAA5dpHl-_3L3mnILVo97idIBQkPQFeXg_9OmnGk7SIoDuHaRxqgBQO8-YQeIpwmy-ZCvEwc-io44vHvA" type="text/javascript"></script>
        <script type="text/javascript">
            google.load("jquery", "1.4.2");
            google.load("jqueryui", "1.7.2");
        </script>
        -->

        <!--[if lt IE 7]>
            <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta3)/IE7.js"></script>
        <![endif]-->

        <script type="text/javascript">
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <script type="text/javascript">
            try {
                var pageTracker = _gat._getTracker("UA-15209814-1");
                pageTracker._setDomainName(".phatograph.com");
                pageTracker._trackPageview();
            } catch(err) {}
        </script>

        <meta name="google-site-verification" content="Gy6bvU9qWijTgCknpDVe-hLORa74F-FLBSsoAoynGKI" />

        <?php
        if(isset($script)) {
            if(is_array($script)) {
                foreach($script as $key => $list) {
                    echo '<script type="text/javascript" src="'.base_url().'script/'.$list.'.js"></script>';
                }
            }
            else {
                echo '<script type="text/javascript" src="'.base_url().'script/'.$script.'.js"></script>';
            }
        }
        ?>

        <title>Phatograph</title>
    </head>
    <body>