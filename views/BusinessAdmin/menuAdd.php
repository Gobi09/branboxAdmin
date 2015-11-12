<!--Author: gobi.C
Created on: 04/03/15
Modified on: 24/03/15
-->
<style>
        .container
        {
            position: absolute;
            top: 10%; left: 10%; right: 0; bottom: 0;
        }
        .action
        {
            width: 700px;
            height: 30px;
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

	<li><a href="javascript:;">Menu</a></li>
	<li class="active">Add Menu</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Menu <small> Enter the correct details here...</small></h1>
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
		    <h4 class="panel-title">Add Menu</h4>
		    
		</div>
		<div class="panel-body">
		    <?php foreach($getEditMenu as $data)  ?>
		    <div class="col-md-offset-1">
			<form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/menuAdd'); ?>" class="form-horizontal form12">
			    <div class="col-md-4">
				<div class="form-group">
				    <label class="col-md-4 control-label">Menu Name</label>
				    <div class="col-md-8">
					<input type="text" name="name" id="name" value=""  class="form-control" placeholder="Menu Name" />
				    </div>
				</div>
			    </div>
			    <div class="col-md-8">
				<div class="row p-b-20">
				    <div class="col-xs-12 col-sm-12">
					<img src="<?php echo site_url('assets/img/noimage.jpg')?>" class="img-responsive" id="dummy" onclick="$(this).addClass('hide');$('#original').removeClass('hide');$('#imagelabel').click();">
				    </div>
					<div class="col col-md-4 hide" id="original">
					    <div class="image-editor">
						<div class="cropit-image-preview-container">
						  <div class="cropit-image-preview"></div>
						</div>
						<div class="image-size-label">Resize image</div>
						<div class="col col-md-10 col-sm-5 col-xs-12">
						    <input type="range" class="cropit-image-zoom-input">
						</div>
					    <div class="p-t-30">
						<div class="col-md-8 col-xs-6 col-sm-3">
						    <input type="file" class="cropit-image-input" name="image" id="imagelabel" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" >
						    <label class="btn btn-sm btn-default" for="imagelabel">
							<span class="glyphicon glyphicon-folder-open"></span>
							Choose file
						    </label>    
						</div>
						<div class="col-md-4 col-xs-6 col-sm-3">
						    <a id="crop" class="btn btn-sm btn-warning">Crop Image</a>
						</div>
					    </div>
					    </div>
					</div>
					<input type="hidden" value="" name="menuImage" id="menuImage">
					<div class="col col-md-6 p-t-30 hide" id="preview">
					    <img src="<?php echo site_url('assets/img/noimage.jpg')?>" id="cropImage" class="img-responsive">
					    <div class="form-group p-t-10">
						<label class="col-md-3 control-label">Menu Status</label>
						<div class="col-md-9">
						    <label class="col-md-1 control-label">OFF</label>
						    <div class="col-md-2"><input type="checkbox"  data-render="switchery" data-theme="green" value="ON" name="status" id="status"  checked /></div>
						    <label class="col-md-4 control-label">ON</label>
						</div>
					    </div>
					    <div class="form-group">
						<label class="col-md-3 control-label">Menu Online Status</label>
						<div class="col-md-9">
						    <label class="col-md-1 control-label">OFF</label>
						    <div class="col-md-2"><input type="checkbox" data-render="switchery" data-theme="green"  value="ON" name="online" id="online" checked /></div>
						    <label class="col-md-4 control-label">ON</label>
						</div>
					    </div>
					</div>
				  
				</div>
			    </div>
			 <!-- <div class="form-group">
				<label class="col-md-3 control-label">Menu Image</label>
				<div class="col-md-5">
				    
  				    <img class="media-object superbox-img previewimage" id="show_image11" name="show_image" src=" <?php echo base_url("assets/img/user-15.jpg");?>">
				     <input id="filestyle-11" class="filestyle" type="file" name='image' onchange="PreviewImage();" data-buttonbefore="true" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
				    <div class="bootstrap-filestyle input-group">
					<span class="group-span-filestyle input-group-btn" tabindex="0">
					    <label id="new" class="btn btn-default" for="filestyle-11">
						<span class="glyphicon glyphicon-folder-open"></span>
						Choose file
					    </label>
					</span>
					<input class="form-control" id="filestyle-21"  type="text" readonly>
				    </div>
				    
				</div>
			    </div>-->
			    
			<!--<div class="">
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
				    <input type="hidden" value="" name="menuImage" id="menuImage">
			    </div>
			</div>-->
			    
			<!--    <div class="form-group">-->
			<!--	<label class="col-md-3 control-label">Menu Position</label>-->
			<!--	<div class="col-md-5">-->
			<!--	    <input type="number" name="position" id="position" class="form-control"   placeholder="Menu Position" />-->
			<!--	</div>-->
			<!--    </div>-->
			    
			    <div class="col-md-offset-2 col-md-6">
				 <div class="form-group">
				    <label class="col col-4"></label>
				    <button class="btn btn-md btn-danger " onclick="window.history.back();" type="button">Cancel</button>
				    <input type="button" class="btn btn-md btn-success" name="clear" onclick="form_reset();"id="clear" value="Reset" >
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
  
  //$("#status").bootstrapSwitch();
  //  alert();
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
                    },
		    
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

 //function PreviewImage() {
 //   var image =document.getElementById("filestyle-11").value;
 //   $('#filestyle-21').val(image);
 //   //alert('ahi');
 //     var oFReader = new FileReader();
 //         oFReader.readAsDataURL(document.getElementById("filestyle-11").files[0]);
 //  
 //         oFReader.onload = function (oFREvent) {
 //     var data1=document.getElementById("show_image11").src = oFREvent.target.result;
 //          
 //         };
 //   };
    

</script>
<script type="text/javascript">
    //$(document).ready(function(){
    //    $('[data-toggle="tooltip"]').tooltip();   
    //});
</script>


    <script type="text/javascript">

    //$(document).ready(function(){
    //
    //    $(".tip-top").tooltip({placement : 'top'});
    //
    //    $(".tip-right").tooltip({placement : 'right'});
    //
    //    $(".tip-bottom").tooltip({placement : 'bottom'});
    //
    //    $(".tip-left").tooltip({ placement : 'left'});
    //
    //});
	
	
    </script>
	<script type="text/javascript">
//    YUI().use('node', 'crop-box', function(Y){
//        var options =
//        {
//            imageBox: '.imageBox',
//            thumbBox: '.thumbBox',
//            spinner: '.spinner',
//            imgSrc: 'avatar.png'
//        }
//        var cropper = new Y.cropbox(options);
//        Y.one('.file').on('change', function(){
//            var reader = new FileReader();
//            reader.onload = function(e) {
//                options.imgSrc = e.target.result;
//                cropper = new Y.cropbox(options);
//            }
//            reader.readAsDataURL(this.get('files')._nodes[0]);
//            this.get('files')._nodes = [];
//        })
//        Y.one('#btnCrop').on('click', function(){
//            var img = cropper.getDataURL();
//	    menuImage
//	    $(".imageId").attr("src",img);
//	    $("#menuImage").val(img);
//	    
//            Y.one('.imageId').attr("src",img);
//        })
//      
//    })
$(function() {
    $('.image-editor').cropit({
      //exportZoom: 1.25,
      imageBackground: true,
      imageBackgroundBorderWidth: 20,
    });
    $('#crop').click(function() {
	var imageData = $('.image-editor').cropit('export');
	$('#cropImage').attr('src',imageData);
	$('#menuImage').val(imageData);
	$('#original').addClass('hide');
	$('#preview').removeClass('hide');
      
    });
});

</script>
	
</body>

</html>

