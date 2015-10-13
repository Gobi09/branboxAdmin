<!--Author: gobi.C
Created on: 04/03/15
Modified on: 24/03/15
-->
<style>
        .container
        {
          
            top: 0%; left: 0%; right: 0; bottom: 0;
        }
        .action
        {
            width: 400px;
            height: 88px;
            margin: 10px 0;
        }
        .cropped>img
        {
            margin-right: 10px;
	    padding-bottom: 10px;
        }
    </style>
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">

	<li><a href="javascript:;">Customer</a></li>
	<li class="active">Add Customer</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add New Customer <small> Enter the correct details here...</small></h1>
    <!-- end page-header -->
    
    <!-- begin row -->
    <div class="row">
	<!-- begin col-12 -->
	<div class="col-md-12">
	    <!-- begin panel -->
	    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
		<div class="panel-heading">
		    <div class="panel-heading-btn">
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		    </div>
		    <h4 class="panel-title">Add New Customer</h4>
		</div>
		<div class="panel-body">
		    <div class="col-md-offset-1 col-md-12">
			<form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/endUserAdd'); ?>" class="form-horizontal form12">
			    <div class="form-group">
				<label class="col-md-3 control-label">Customer name</label>
				<div class="col-md-3">
				    <input type="text" name="userName" id="userName"  class="form-control" placeholder="Customer Name" />
				</div>
			    </div>
			     <div class="form-group">
				<label class="col-md-3 control-label">Mobile Number</label>
				<div class="col-md-3">
				    <input type="text" name="phoneNumber" id="phoneNumber"  class="form-control" placeholder="Mobile Number" />
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Email</label>
				<div class="col-md-3">
				    <input type="text" name="email" id="email"  class="form-control" placeholder="Email" />
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">DOB</label>
				<div class="col-md-3">
				    <input type="text" name="dateOfBirth" id="dateOfBirth"  class="form-control" placeholder="DOB" />
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Address1</label>
				<div class="col-md-3">
				    <input type="text" name="address1" id="address1"  class="form-control" placeholder="address1" />
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Address2</label>
				<div class="col-md-3">
				    <input type="text" name="address2" id="address2"  class="form-control" placeholder="address2" />
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">City</label>
				<div class="col-md-3">
				    <input type="text" name="city" id="city"  class="form-control" placeholder="City" />
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">State</label>
				<div class="col-md-3">
				    <input type="text" name="state" id="state"  class="form-control" placeholder="State" />
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Country</label>
				<div class="col-md-3">
				    <input type="text" name="country" id="country"  class="form-control" placeholder="Country" />
				</div>
			    </div>
			   
			    <div class="col-md-offset-3 col-md-12">
				 <div class="form-group">
				    <label class="col col-4"></label>
				    <button class="btn btn-md btn-danger " onclick="window.history.back();" type="button"> Cancel </button>
				    <button class="btn btn-md btn-info " onclick=" form_reset();" id="clear_data" type="button"> Reset </button>
				    <input type="submit" class="btn btn-md btn-success" name="proceed" id="submit_but" value="Save" >
				 </div>
			      </div>
			</form>
		    </div>
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
    FormSliderSwitcher.init();
    $('#form_validation').bootstrapValidator({
    
        message: 'This value is not valid',
	container: 'tooltip',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh fa-spin'
        },
        fields: {
            
	    userName: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    },
                }
            },
	    phoneNumber: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    },
		    regexp: {
                        regexp: /^[0-9-]+$/,
                        message: 'Numbers{-} only and space not allowed'
                    },
                }
            },
	    email: {
		trigger:"blur",
                validators: {
		    
                    notEmpty: {
                        message: 'The customer Mail is required and can\'t be empty'
                    },
		    regexp: {
                        regexp: /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/,
                        message: 'Enter Valid Emnil address'
                    },
                }
            },
	    
	   
	}
    });
});

function form_reset() {
    $('#form_validation').trigger("reset");
	$('#form_validation').bootstrapValidator();
	$('#form_validation').data('bootstrapValidator').resetForm();

 $('#cn_code').removeAttr('disabled');
  $('#proceed').removeAttr('disabled');
 
}

 function PreviewImage() {
    var image =document.getElementById("filestyle-11").value;
    $('#filestyle-21').val(image);
    //alert('ahi');
      var oFReader = new FileReader();
          oFReader.readAsDataURL(document.getElementById("filestyle-11").files[0]);
   
          oFReader.onload = function (oFREvent) {
      var data1=document.getElementById("show_image11").src = oFREvent.target.result;
           
          };
};
$(".addButton").click(function(){
    var $template = $('#optionTemplate');
    $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
	$name   = $clone.find('[name="ingredients[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
	$name   = $clone.find('[name="ingPrice[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
	$name   = $clone.find('[name="category[]"]');
	$('#form_validation').bootstrapValidator('addField', $name);
});

function removerow($this){
    var $row   = $this.parents('.odd');
     $row.remove();
}
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>


    <script type="text/javascript">

    $(document).ready(function(){

        $(".tip-top").tooltip({placement : 'top'});

        $(".tip-right").tooltip({placement : 'right'});

        $(".tip-bottom").tooltip({placement : 'bottom'});

        $(".tip-left").tooltip({ placement : 'left'});

    });

    </script>
    <script>
	$("#menuId").change(function(){
	    var menuId= $(this).val();
	    $.ajax({
	    type: "POST",
	    data: {menuId:menuId},
	    url: "<?php echo base_url(); ?>branboxController/ajaxGetSubMenu",
	    success: function(response){
		console.log(response);
	       $("#subMenuId").html(response);
	    },
	    });
	});
	
    </script>
	<script type="text/javascript">
    YUI().use('node', 'crop-box', function(Y){
        var options =
        {
            imageBox: '.imageBox',
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: 'avatar.png'
        }
        var cropper = new Y.cropbox(options);
        Y.one('.file').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e) {
                options.imgSrc = e.target.result;
                cropper = new Y.cropbox(options);
            }
            reader.readAsDataURL(this.get('files')._nodes[0]);
            this.get('files')._nodes = [];
        })
        Y.one('#btnCrop').on('click', function(){
            var img = cropper.getDataURL();
	    subMenuItemImage
	    $(".imageId").attr("src",img);
	    $("#subMenuItemImage").val(img);
	    
            Y.one('.imageId').attr("src",img);
        })
      
    })
    $('#price').on('blur', function(){
	$('.currency').formatCurrency();
    })	
</script>
</body>

</html>

