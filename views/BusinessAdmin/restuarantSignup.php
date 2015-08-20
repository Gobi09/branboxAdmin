<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Branbox Admin</title>
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
<style>
	.signup {
    background: rgba(0, 0, 0, 0.4) none repeat scroll 0 0;
    border-radius: 4px;
    color: #ccc;
    margin: 30px auto;
    position: relative;
    width: 450px;
</style>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<div class="login-cover">
	    <div class="login-cover-image"><img src="<?php echo base_url(); ?>assets/img/back/bg123.jpg" data-id="login-cover-image" alt="" /></div>
	    <div class="login-cover-bg"></div>
	</div>
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login signup" data-pageload-addclass="animated flipInX">
            <!-- begin brand -->
            <div class="login-header">
               
	    </div>
            <!-- end brand -->
            <div class="login-content">
		<div class="brand" slign="center">
                    <span class=""><img src="<?php echo base_url(); ?>assets/img/logo.jpg" data-id="login-cover-image" alt=""  style="height: 33px" /></span><br>
		    <br>
                </div>
                <form action="<?php echo base_url(); ?>branboxController/restuarantSignup" method="POST" class="margin-bottom-0">
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> BranName</label>
			<input type="text" name="branName" placeholder="Bran Name" id="branName" class="form-control input-sm"/>
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> Company Name</label>
			<input type="text" name="companyName"  placeholder="Company Name" id="companyName" class="form-control input-sm"/>
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> Address 2</label>
			<input type="text" name="address1"  placeholder="Address 1" id="address1" class="form-control input-sm"/>
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> Address 2</label>
			<input type="text" name="address2"  placeholder="Address 2" id="address2" class="form-control input-sm"/>
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> State</label>
			<input type="text" name="state"  placeholder="State" id="state" class="form-control input-sm"/>
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> City</label>
			<input type="text" name="city" placeholder="City" id="city" class="form-control input-sm"/>	
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> Country</label>
			<input type="text" name="country"  placeholder="Country" id="country" class="form-control input-sm"/>
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> Postal Code</label>
			<input type="text" name="postalCode"  placeholder="Postal Code" id="postalCode" class="form-control input-sm"/>
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> Phone</label>
			<input type="text" name="phone" placeholder="Phone" id="phone" class="form-control input-sm"/>
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> Mobile</label>
			<input type="text" name="mobile"  placeholder="Mobile" id="mobile" class="form-control input-sm"/>
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> Email</label>
			<input type="text" name="email" placeholder="Email" id="email" class="form-control input-sm"/>
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span>*</span> Password</label>
			<input type="password" name="password" placeholder="Password" id="password" class="form-control input-sm"/>
		    </div>
		    <div class="form-group m-b-20">
			<label class="control-label"><span></span> Website</label>
			<input type="text" name="website" placeholder="Website" id="website" class="form-control input-sm"/>
		    </div>
		    <div class="login-buttons">	
			<fieldset>
				<button class="btn btn-sm btn-danger" type="button" onclick="window.history.back();">Cancel</button>
				<input type="submit" name="save" id="save" class="btn btn-sm btn-success" value="Save">
                            </fieldset>
		    </div>
		    
		</form>
	    </div>
        </div>
        <!-- end login -->
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
	<script src="<?php echo base_url(); ?>assets/js/login-v2.demo.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

<script>
$(document).ready(function() {
	App.init();
	LoginV2.init();
});
</script>
</body>
</html>

