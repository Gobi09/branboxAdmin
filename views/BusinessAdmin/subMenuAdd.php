
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
            height: 300px;
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

	<li><a href="javascript:;">Sub Menu</a></li>
	<li class="active">Add Sub Menu</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Sub Menu <small> Enter the correct details here...</small></h1>
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
		    <h4 class="panel-title">Add Sub Menu</h4>
		    
		</div>
		<div class="panel-body">
		   
		    <div class="col-md-offset-1 col-md-7">
			<form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/subMenuAdd'); ?>" class="form-horizontal form12">
			    <div class="form-group">
				<label class="col-md-4 control-label">Menu Name</label>
				<div class="col-md-5">
				    <select name="menuId" id="menuId" class="form-control">
					<option selected="" disabled="">Select Menu</option>
					<?php foreach($getMenu as $data) {?>
					<option  value="<?php echo $data['id']; ?>" ><?php echo $data['name']; ?></option>
					<?php } ?>
				    </select>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-4 control-label">Sub Menu Name</label>
				<div class="col-md-5">
				    <input type="text" name="name" id="name"  class="form-control" placeholder="Menu Name" />
				</div>
			    </div>
			   <div class="">
			   <!--<label class="">Menu Image</label>-->
			    <div class="imageBox">
				
				<div class="thumbBox"><h3><center>Please select the image</center></h3></div>
				<div class="spinner" style="display: none"></div>
			    </div>
			    <div class="action">
				
				<input type="file" class="file" name="image" style="float:left; width: 250px">
				<input class="btn btn-primary" type="button" id="btnCrop" value="Crop" style="float: right">
				
			    </div>
			    <div class="cropped">
				<img src="" class="imageId"  alt="" >
				    <input type="hidden" value="" name="subMenuImage" id="subMenuImage">
			    </div>
			</div>
			<!--    <div class="form-group">-->
			<!--	<label class="col-md-4 control-label">Sub Menu Position</label>-->
			<!--	<div class="col-md-5">-->
			<!--	    <input type="number" name="position" id="position" class="form-control"  placeholder="Menu Position" />-->
			<!--	</div>-->
			<!--    </div>-->
			    
			    <div class="form-group">
				<label class="col-md-4 control-label">Sub Menu Status</label>
				<div class="col-md-8">
				    <label class="col-md-1 control-label">OFF</label>
				    <div class="col-md-2"><input type="checkbox" data-render="switchery" data-theme="green" name="status"  id="status"  value="ON"  checked /></div>
				    <label class="col-md-1 control-label">ON</label>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-4 control-label">Sub Menu Online Status</label>
				<div class="col-md-8">
				    <label class="col-md-1 control-label">OFF</label>
				    <div class="col-md-2"><input type="checkbox" data-render="switchery" data-theme="green" name="online" id="online" value="ON" checked /></div>
				    <label class="col-md-1 control-label">ON</label>
				</div>
			    </div>
			    <div class="col-md-offset-3 col-md-6">
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
            name: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    },
                }
            },
	    image: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
                }
            },
	    position: {
                validators: {
                    notEmpty: {
                       message: 'It is required and can\'t be empty'
                    }
		}
            },
	    status: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
                }
            },
	    online: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
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
    
function changeImage()
{
     $("#show_image11").addClass("hide");
    
    $("#changeImage").removeClass("hide");
    
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
	    subMenuImage
	    $(".imageId").attr("src",img);
	    $("#subMenuImage").val(img);
	    
            Y.one('.imageId').attr("src",img);
        })
      
    })
</script>	
	
</body>

</html>

