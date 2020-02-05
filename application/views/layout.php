<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo site_url('favicon.png'); ?>" >
    <title><?php echo isset($page_title)?$page_title:SITE_NAME; echo ' | '.SITE_NAME; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo CDN_PATH.'portal/css/icons/icomoon/styles.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo CDN_PATH.'portal/css/style.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo CDN_PATH.'portal/css/bootstrap.min.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo CDN_PATH.'portal/css/core.min.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo CDN_PATH.'portal/css/colors.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo CDN_PATH.'portal/css/colors.min.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo CDN_PATH.'portal/css/components.min.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo CDN_PATH.'portal/css/extras/sweetalert.css'; ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo CDN_PATH.'portal/css/extras/sweetalert.min.css'; ?>" rel="stylesheet" type="text/css">

<?php if(isset($add_css) && !empty($add_css)){
    foreach($add_css as $cssObj){ ?>
<link href="<?php echo CDN_PATH.'portal/css/'.$cssObj; ?>" rel="stylesheet" type="text/css">
<?php   }
} ?>


    <script src="<?php echo CDN_PATH.'portal/js/core/libraries/jquery.min.js'; ?>"></script>
    <script src="<?php echo CDN_PATH.'portal/js/plugins/notifications/sweetalert.js'; ?>"></script>
    <script src="<?php echo CDN_PATH.'portal/js/plugins/notifications/sweetalert.min.js'; ?>"></script>
</head>
<body>
	<div class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url(); ?>" ><?php echo SITE_NAME; ?></a>

                <ul class="nav navbar-nav visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">
            
            <div class="page-content">
                <!-- Main sidebar -->
                <div class="sidebar sidebar-main">
                    <div class="sidebar-content">
                        <!-- Main navigation -->
                        <div class="sidebar-category sidebar-category-visible">
                            <div class="category-content no-padding">
                                <?php $current_url = ' '.uri_string(); 
                                	$ex = explode('/', $current_url);
                                	$lastSegment = end($ex);
                                ?>
                                <ul class="navigation navigation-main navigation-accordion">
                                    <li <?php echo strpos($lastSegment, 'media')?'class="active"':''; ?> ><a href="<?php echo base_url('media'); ?>"><i class="icon-media"></i> <span>Media Manager</span></a></li>
                                    <li <?php echo ($lastSegment == 'sample')?'class="active"':''; ?> ><a href="<?php echo base_url('media/sample'); ?>"><i class="icon-file-media"></i> <span>Sample Form</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /main navigation -->
                    </div>
                </div>
                
                <div class="content-wrapper">
                     <div class="page-header">

                                <div class="page-header-content">

                                    <div class="page-title">

                                        <h4><span class="text-semibold">

                                         <?php echo isset($page_icon)?$page_icon:''; ?> &nbsp;<?php echo isset($meta_title)?$meta_title:''; ?> </span></h4>

                                    </div>

                                    <div class="heading-elements">

                                        <div class="heading-btn-group">
					                       <?php if(($lastSegment  ==  'media')){ ?>
                                            <!--  if you need to upload muliple images chanhe single to multiple -->
					                       <?php } ?>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        <div class="content">
                        <?php $this->load->view('notification'); ?>
                        <div class="panel">
                            <?php $this->load->view($template_file); ?>
                        </div>
                    
                        <div class="footer text-muted">
                                &copy; <?php echo date('Y'); ?>. <?php echo SITE_NAME; ?> by <a href="#" target="_blank">Gulshan Sharma</a>
                        </div>
                    </div>
                </div>
            </div>
	</div>
	<!-- /page container -->
<script src="<?php echo CDN_PATH.'portal/js/core/libraries/bootstrap.min.js'; ?>"></script>
<script src="<?php echo CDN_PATH.'portal/js/core/app.min.js'; ?>"></script>
<script src="<?php echo CDN_PATH.'portal/js/core/common.js'; ?>"></script>
<script>
    var SITE_URL = "<?php echo base_url(); ?>";
</script>

<?php if(isset($add_js) && !empty($add_js)){
    foreach($add_js as $jsObj){ ?>
<script type="text/javascript"  src="<?php echo CDN_PATH.'portal/js/'.$jsObj; ?>" ></script>
<?php   }
} ?>

<!--script src="<?php //echo site_url('assets/js/custom.js'); ?>"></script-->

<?php if(isset($add_custom_js)){
    echo '<script>'.$add_custom_js.'</script>';
} ?>
    

</body>
</html>
