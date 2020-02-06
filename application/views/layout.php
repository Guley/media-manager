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
		<a href="https://github.com/Guley/media-manager" class="github-corner" tabindex="-1"><svg width="80" height="80" viewBox="0 0 250 250" style=" position: absolute; top: 0; right: 0; border: 0; fill: #151513; color: #fff;"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a>
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
