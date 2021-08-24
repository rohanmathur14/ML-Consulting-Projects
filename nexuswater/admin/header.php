<?php
$site_path = array(
    'base_url' => BASE_URL,
    'admin_url' => BASE_URL . 'admin/',
    'admin_image_url' => BASE_URL. 'images/admin/',
    'admin_css_url' => BASE_URL . 'css/admin/',
    'admin_js_url' => BASE_URL . 'js/admin/',
    'application_path' => BASEPATH . '../' . APPPATH
);

$current_url = current_url();

$LoginUserDetail = getSessionUserData('admin_id');
$loginUser	 = 0;
if(isset($LoginUserDetail) && $LoginUserDetail>0)
{
    $loginUser	 = $LoginUserDetail;
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title><?php if (!empty($title)) {
            echo $title;
        } else {
            echo 'Admin panel';
        } ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- STYLESHEETS --><!--[if lt IE 9]>

    <script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link rel="icon" href="<?php echo base_url('images/favicon.ico')?>" type="Icon">
    <link rel="stylesheet" type="text/css" href="<?php echo $site_path['admin_css_url']; ?>cloud-admin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $site_path['admin_css_url']; ?>themes/default.css" id="skin-switcher">

    <link rel="stylesheet" type="text/css" href="<?php echo $site_path['admin_css_url']; ?>responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $site_path['base_url']; ?>css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $site_path['base_url']; ?>css/responsive.css">
    <link href="<?php echo $site_path['admin_js_url']; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">


        <!-- FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>css/admin/custom.css">
    <!-- JQUERY -->

	<script src="<?php echo BASE_URL; ?>js/admin/jquery.min.js"></script>

    <script>window.jQuery || document.write('<script src="<?php echo $site_path['admin_js_url']; ?>jquery/jquery-2.0.3.min.js"><\/script>')</script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>js/bootstrap/formValidation.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>js/bootstrap/bootstrap.minSecond.js"></script>
    <!--<script type="text/javascript" src="<?php /*echo BASE_URL; */?>js/ajaxupload.3.5.js"></script>-->
    <script type="text/javascript" src="<?php echo BASE_URL; ?>js/jquery.form.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="<?php echo $site_path['admin_js_url']; ?>fancybox/jquery.fancybox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo $site_path['admin_js_url']; ?>fancybox/jquery.fancybox.pack.js"></script>


    <script type="text/javascript">
        //<![CDATA[
        var SiteUrl = '<?php echo BASE_URL; ?>';
        var siteUrl  = '<?php echo BASE_URL; ?>';
        var currentUrl = '<?php echo $current_url; ?>';
        var upload_path = '<?php echo upload_path() ;?>';
        var userID = '<?php echo $loginUser;?>';
        var current_timezone = '<?php echo getSessionUserData('current_timezone');?>';
        //]]>
    </script>
    <script src="<?php echo $site_path['admin_js_url']; ?>jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>

    <script src="<?php echo BASE_URL;?>js/dateFormat.min.js"></script>
    <!--<script src="<?php /*echo BASE_URL;*/?>js/timezone.js"></script>-->

    <script type="text/javascript" src="<?php echo $site_path['admin_js_url']; ?>colorbox/jquery.colorbox.min.js"></script>

	<script src="<?php echo $site_path['admin_js_url']; ?>script.js"></script>

    <script type="text/javascript">
        $(function(){
            $(".fancybox").fancybox();
        });
    </script>


</head>