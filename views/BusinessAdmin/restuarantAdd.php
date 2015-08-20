<!--Author: Pravin Kumar.P
Created on: 04/03/15
Modified on: 20/03/15
-->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Restaurants</a></li>
	<li class="active">Add Restaurants</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add New Restaurants <small> Enter the correct details here...</small></h1>
    <!-- end page-header -->
    
    <!-- begin row -->
    <div class="row">
	<!-- begin col-12 -->
	<div class="col-md-12">
	    <!-- begin panel -->
	    <p style="color:red"><b><?php echo $error; ?></b></p>
	    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
		<div class="panel-heading">
		    <div class="panel-heading-btn">
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		    </div>
		    <h4 class="panel-title">Add </h4>
		</div>
		<div class="panel-body">
                        <form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo site_url('branboxController/restuarantAdd');?>" class="form-horizontal col-md-offset-2">
			    <div class="row">
				<div class="col-md-3">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span>*</span> BranName</label>
					<input type="text" name="branName" placeholder="Bran Name" id="branName" class="form-control input-sm"/>
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span>*</span> Company Name</label>
					<input type="text" name="companyName"  placeholder="Company Name" id="companyName" class="form-control input-sm"/>
				    </div>
				</div>
				
			    </div>
			    <div class="row">
				<div class="col-md-6">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span>*</span> Address 1</label>
					<input type="text" name="address1" placeholder="Address 1" id="address1" class="form-control input-sm"/>
				    </div>
				</div>
			    </div>
			    <div class="row">
				<div class="col-md-6">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span>*</span> Address 2</label>
					<input type="text" name="address2"  placeholder="Address 2" id="address2" class="form-control input-sm"/>
				    </div>
				</div>
			    </div>
			    <div class="row">
				<div class="col-md-3">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span>*</span> State</label>
					<input type="text" name="state"  placeholder="State" id="state" class="form-control input-sm"/>
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span>*</span> City</label>
					<input type="text" name="city" placeholder="City" id="city" class="form-control input-sm"/>
				    </div>
				</div>
			    </div>
			    <div class="row">
				<div class="col-md-3">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span>*</span> Country</label>
					<input type="text" name="country"  placeholder="Country" id="country" class="form-control input-sm"/>
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span>*</span> Postal Code</label>
					<input type="text" name="postalCode"  placeholder="Postal Code" id="postalCode" class="form-control input-sm"/>
				    </div>
				</div>
			    </div>
			    <div class="row">
				<div class="col-md-3">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span>*</span> Phone</label>
					<input type="text" name="phone" placeholder="Phone" id="phone" class="form-control input-sm"/>
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span>*</span> Mobile</label>
					<input type="text" name="mobile"  placeholder="Mobile" id="mobile" class="form-control input-sm"/>
				    </div>
				</div>
			    </div>
			    <div class="row">
				<div class="col-md-3">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span>*</span> Email</label>
					<input type="text" name="email" placeholder="Email" id="email" class="form-control input-sm"/>
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="col-md-12 form-group">
					<label class="control-label"><span></span> Website</label>
					<input type="text" name="website" placeholder="Website" id="website" class="form-control input-sm"/>
				    </div>
				</div>
			    </div>
			    <div class="col-md-offset-1 col-md-7 p-t-5">
			    <fieldset>
				<button class="btn btn-sm btn-danger" type="button" onclick="window.history.back();">Cancel</button>
				<input type="submit" name="save" id="save" class="btn btn-sm btn-success" value="Save">
                            </fieldset>
                           </div> 
			</form>
		</div>
	    </div>
	    <!-- end panel -->
	</div>
	<!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->
<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->

<script type="text/javascript">
$(document).ready(function() {
    $('#form_validation').bootstrapValidator({
        framework: 'bootstrap',
	feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            branName: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The branName is required and can\'t be empty'
                    }
                }
            },
	    companyName: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The companyName is required and can\'t be empty'
                    }
                }
            },
	    address1: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The Address 1 is required and can\'t be empty'
                    }
                }
            },
	    address2: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The Address 2 is required and can\'t be empty'
                    }
                }
            },
	    state: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The State is required and can\'t be empty'
                    }
                }
            },
	    city: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The City is required and can\'t be empty'
                    }
                }
            },
	    country: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The Country is required and can\'t be empty'
                    }
                }
            },
	    postalCode: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The Postal Code is required and can\'t be empty'
                    }
                }
            },
	    phone: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The Phone is required and can\'t be empty'
                    }
                }
            },
	    mobile: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The Mobile is required and can\'t be empty'
                    }
                }
            },
	    email: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The Email is required and can\'t be empty'
                    }
                }
            },
	    website: {
		container: 'tooltip',
		validators: {
		    notEmpty: {
                        message: 'The Website is required and can\'t be empty'
                    }
                }
            },
	}
    })
});
</script>
</body>
</html>

