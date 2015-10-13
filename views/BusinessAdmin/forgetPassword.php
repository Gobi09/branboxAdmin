<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
 <?php  //echo count($data1); exit; ?>
<head>
	<meta charset="utf-8" />
	<title>Messages</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<!-- <div id="page-loader" class="fade in"><span class="spinner"></span></div>-->
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin error -->
        <div class="error">
          <?php if(count($data1)== '2') { ?>
	 <div class="error-code m-b-5"><h2>Success</h2></div>
            	<div class="error-content">
		 	<div class="error-message">Your Password Reset Successfully</div>
		</div>
	</div>
	
        <?php }else if(count($data)=='1') { ?>
            <div class="error-code m-b-5"><h2>Enter Youe New password Here</h2></div>
            <div class="error-content">
		
		<form method="post" action="<?php echo base_url('branboxController/forgetPassword/'.$data[0]['businessId']."/".$data[0]['verificationcode']."/".$data[0]['id'])?>">
			<div class="error-message">
				<div class="col-md-12">
					<div class="form-group">
					    <label class="col-md-2 control-label"></label>
					    <div class="col-md-5">
						<input type="password" name="forpass" id="forpass" placeholder="Your New Password" class="form-control">
					    </div>   
					    <div class="col-md-2">
						<input  type="submit" class="btn btn-success" name="update" value="update">
					    </div> 
					</div>
				    </div>
			</div>
			
		</form>
            </div>
        </div>
        
	<?php } else { ?>
	  <div class="error-code m-b-5"><h2>Sorry Please Try again Later</h2></div>
            	<div class="error-content">
		 	<div class="error-message">This Link was Expired</div>
		</div>
	</div>
		 
	<?php }  ?>
                
       <!-- end error -->
        
        <!-- begin theme-panel -->
        <!-- end theme-panel -->
        
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/crossbrowserjs/html5shiv.js"></script>
		<script src="<?php echo base_url(); ?>assets/crossbrowserjs/respond.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url(); ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	
</body>

<!-- Mirrored from seantheme.com/color-admin-v1.6/admin/html/extra_404_error.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Mar 2015 08:13:57 GMT -->
</html>

