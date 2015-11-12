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
            width: 400px;
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
	<li class="active">Edit Menu</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit Menu <small> Enter the correct details here...</small></h1>
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
		    <h4 class="panel-title">Edit Menu</h4>
		    
		</div>
		<div class="panel-body">
		    <?php foreach($getEditMenu as $data)  ?>
		    <div class="col-md-offset-1">
			<form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/menuEdit/'.$data['id']); ?>" class="form-horizontal form12">
			    <div class="col-md-4">
				<div class="form-group">
				    <label class="col-md-4 control-label">Menu Name</label>
				    <div class="col-md-8">
					<input type="text" name="name" id="name" value="<?php echo $data['name']?>"  class="form-control" placeholder="Menu Name" />
				    </div>
				</div>
			    </div>
			    <div class="col-md-8">
				<div class="row p-b-20">
					<div class="col-xs-12 col-sm-12">
						<input type="hidden" name="oldImage" id="" value="<?php echo $data['image']?>" >
						<img class="img-responsive" name="show_image" src="<?php echo $data['image'];?>" onclick="$(this).addClass('hide');$('#original').removeClass('hide');$('#imagelabel').click();">
					</div>
					<div class="col-md-4 hide" id="original">
					    <div class="image-editor">
						<div class="cropit-image-preview-container">
						  <div class="cropit-image-preview"></div>
						</div>
						<div class="image-size-label">Resize image</div>
						<div class="col col-md-12 col-sm-5 col-xs-12">
						    <input type="range" class="cropit-image-zoom-input">
						</div>
						<div class="p-t-30">
						    <div class="col-md-8 col-xs-6 col-sm-3">
							<input type="file" class="cropit-image-input" name="image" id="imagelabel" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" >
							<label class="btn btn-sm btn-default" for="imagelabel">
							    <span class="glyphicon glyphicon-folder-open"></span>
							    Choose file
							</label>
							    <input type="hidden" name="oldImage" id="" value="<?php echo $data['image']?>" >
							    <input type="hidden" value="" name="menuImage" id="menuImage">
						    </div>
						    <div class="col-md-4 col-xs-6 col-sm-3">
							<a id="crop" class="btn btn-sm btn-warning">Crop Image</a>
						    </div>
						</div>
					    </div>
					</div>
					<div class="col col-md-6 hide" id="preview">
					    <img src="<?php echo site_url('assets/img/noimage.jpg')?>" id="cropImage" class="img-responsive">
					    <div class="row p-t-20">
						<div class="form-group">
						    <label class="col-md-3 control-label">Menu Status</label>
						    <div class="col-md-9">
							<label class="col-md-1 control-label">OFF</label>
							<div class="col-md-2"><input type="checkbox" data-render="switchery" data-theme="green" <?php if($data['status']=="ON") echo "checked"; ?> value="ON" name="status" id="status" data-change="check-switchery-state-text" /></div>
							<label class="col-md-4 control-label">ON</label>
						    </div>
						</div>
						<div class="form-group">
						    <label class="col-md-3 control-label">Menu Online Status</label>
						    <div class="col-md-9">
							<label class="col-md-1 control-label">OFF</label>
							<div class="col-md-2"><input type="checkbox" data-render="switchery" data-theme="green" <?php if($data['online']=="ON")echo "checked";?> value="ON" name="online" id="online"  /></div>
							<label class="col-md-4 control-label">ON</label>
						    </div>
						</div>
					    </div>
					</div>
				</div>
			    </div>
			    <!--<div class="">
			    <div class="imageBox hide" id="changeImage" >
				<div class="thumbBox"><h3><center>Please select the image</center></h3></div>
				<div class="spinner" style="display: none"></div>
			    </div>
			    <div class="action">
				
				<input type="file" class="file" onclick="changeImage();" name="image" style="float:left; width: 250px">
				<input type="button" class="btn btn-primary" name="crop" id="btnCrop" value="Crop" style="float: right">
				
			    </div>
			    <div class="cropped">
				<input type="hidden" name="oldImage" id="" value="<?php echo $data['image']?>" >
				<img src="<?php echo base_url("upload/menu/".$data['image']);?>" class="imageId"  alt="" >
				    <input type="hidden" value="" name="menuImage" id="menuImage">
			    </div>
			</div>-->
			
			    <div class="col-md-offset-3 col-md-6">
				 <div class="form-group">
				    <label class="col col-4"></label>
				    <button class="btn btn-md btn-danger " onclick="window.history.back();" type="button">Cancel</button>
				    <input type="submit" id="update" class="btn btn-md btn-success" name="proceed" id="submit_but" value="Update" >
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
//function changeImage()
//{
//     $("#show_image11").addClass("hide");
//    
//    $("#changeImage").removeClass("hide");
//    
//}
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
 //   

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
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
    //update button disabled Starts
 
    //update button disabled Ends
    $(function() {
    $('.image-editor').cropit({
      //exportZoom: 1.25,
      imageBackground: true,
      imageBackgroundBorderWidth: 20,
    });
    $('#crop').click(function() {
	var imageData = $('.image-editor').cropit('export');
	console.log(imageData);
	$('#cropImage').attr('src',imageData);
	$('#menuImage').val(imageData);
	$('#original').addClass('hide');
	$('#preview').removeClass('hide');
      
    });
});
</script>	
	
</body>

</html>

