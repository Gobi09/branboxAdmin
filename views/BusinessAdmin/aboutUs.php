	    
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
    <?php $image_url=base_url().'upload/aboutUs/';?>
	    <div class="content" id="content">
		<!-- begin page-header -->
		<h1 class="page-header">About Us<small> Enter the correct details here...</small></h1>
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
				<h4 class="panel-title">About Us</h4>
			    </div>
			    <div class="panel-body">
				<form class="form-horizontal" id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/aboutUs');?>">
				    <div class="row">
					<div class="col-md-8">
					    <div class="form-group">
						<label class="col-md-3 control-label">Title</label>
						<div class="col-md-6">
						    <input type="text" class="form-control" name="title" id="title" value="<?php if(isset($edit[0]['title'])) echo $edit[0]['title']; else echo ""; ?>">
						</div>
					    </div>
					</div>
					<div class="col-md-8">
					    <div class="form-group">
						<label class="col-md-3 control-label">Description</label>
						<div class="col-md-6">
						    <textarea class="form-control" rows="4"  name="description" id="description"><?php if(isset($edit[0]['description'])) echo $edit[0]['description']; else echo "";?></textarea>
						</div>    
					    </div>
					</div>
				    </div>
				    <div class="row">
					<div class="col-md-4 col-sm-5 col-md-offset-2">
					    <h5>About Us Image</h5>
					    <input type="hidden" name="oldImage" id="" value="<?php echo $edit[0]['image']?>" >
					    <img class="superbox-img previewimage img-responsive" id="show_image11" name="show_image" src="<?php if($edit[0]['image']) { echo $edit[0]['image']; }else{ echo site_url('/assets/img/noimage.jpg'); } ?>" onclick="$(this).addClass('hide');$('#original').removeClass('hide');$('#imagelabel').click();" >
					    <div class="col-md-10 col-sm-5 hide" id="original">
						<div class="image-editor">
						    <div class="cropit-image-preview-container">
						      <div class="cropit-image-preview"></div>
						    </div>
						    <div class="image-size-label">Resize image</div>
						    <div class="col-md-12 col-sm-12 col-xs-12">
							<input type="range" class="cropit-image-zoom-input">
						    </div>
						    <div class="p-t-30">
							<div class="col-md-6 col-sm-9 col-xs-6">
							    <input type="file" class="cropit-image-input" name="image" id="imagelabel" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" >
							    <label class="btn btn-default btn-sm" for="imagelabel">
								<span class="glyphicon glyphicon-folder-open"></span>
								Choose file
							    </label>
							</div>
							<div class="col-md-4 col-xs-6 col-sm-3">
							    <div class="col col-md-1">
								<a id="crop" class="btn btn-sm btn-warning">Crop Image</a>
							    </div>
							</div>
						    </div>
						</div>
					    </div>
					    <div class="hide" id="preview">
						<img src="<?php echo site_url('assets/img/noimage.jpg')?>" id="cropImage" class="img-responsive">
						<input type="hidden" name="aboutusImage" id="aboutusImage">
					    </div> 
					</div>
				    </div>
					<!-- <div class="">-->
					<!--    <div class="imageBox hide" id="changeImage" >-->
					<!--	<div class="thumbBox"><h3><center>Please select the image</center></h3></div>-->
					<!--	<div class="spinner" style="display: none"></div>-->
					<!--    </div>-->
					<!--    <div class="action">-->
					<!--	<input type="file" class="file" onclick="changeImage();" name="image" style="float:left; width: 250px" >-->
					<!--	<input type="button" name="crop" class="btn btn-primary" id="btnCrop" value="Crop" style="float: right">-->
					<!--    </div>-->
					<!--    <div class="cropped">-->
					<!--	<input type="hidden" name="oldImage" id="" value="<?php echo $edit[0]['image']?>" >-->
					<!--	<img src="<?php echo base_url("upload/aboutUsGallery/".$edit[0]['image']);?>" class="imageId"  alt="" >-->
					<!--	    <input type="hidden" name="aboutusImage" id="aboutusImage">-->
					<!--    </div>-->
					<!--</div>-->
					<input type="hidden" name="oldImage" id="" value="<?php echo $edit[0]['image']?>" >
					<input type="hidden" name="oldfile" value="<?php echo $edit[0]['image']?>">
					<input type="hidden" name="tableId" value="<?php echo $edit[0]['id']?>">		
			    		<?php
					$businessId = $this->session->userdata('businessId');
					$data = $this->branboxModel->getAboutUsTableOnUI($businessId);
					$image = end(explode('/',$data[0]['image']));
					if($image){
					    $endImageName = end(explode('_',$image));
					    $imageNo = explode('.',$endImageName)[0];
					    if($imageNo == 1)
					    {
						$imageName = 'banner_2.jpg';    
						}else{
						$imageName = 'banner_1.jpg';    
					    }
					    
					}else{
					    $imageName = 'banner_1.jpg';    
					}
					
					?>
					<input type="hidden" name="imageName" value="<?php echo $imageName;?>">
				    <div class="row">
					<div class="col-md-8 p-t-10">
					    <legend>About Us Gallery Images <button type="button" onclick="addImage()" class="pull-right btn btn-primary"><i class="fa  fa-plus"></i></button></legend>
					    <div class="row">
						<div class="row AdjustPadding" id="image1" style="padding-bottom:20px;" >						    
						    <div class="col-md-12" id="gallery">
						    <?php
						    if(count($aboutGallery) > 0) {
							foreach($aboutGallery as $data) { ?>
							<div class="col-md-4 ImageViewer AdjustPadding" style="padding-bottom:20px;"  >
							    <img src="<?php echo $data['imageUrl'];?>" class="col-md-12 previewimage " id="dummy1" style="height: 185px;" >
								<div>&nbsp;</div>
								<input type="hidden" name="oldAboutUsImages[]" value="<?php echo $data['imageUrl'] ?>">
							     <a  class="pull-right btn btn-danger" data-template="textbox" href="<?php echo site_url('branboxController/aboutGalleryTrash/'.$data['id']);?>"><i class="fa fa-trash"></i></a>
							</div>
							<input type="hidden"  name="Aboutgalleryimagevalue" class="col-md-12 " value="1" >
							    
						<?php }  } ?>
						    
						    </div>
						</div>
					    </div>
					</div>
				    </div>
				    <div class="col-md-12 p-t-10">
					<fieldset>
					    <input type="submit" class="btn btn-sm btn-success" name="Update" value="<?php if(isset($edit[0]['description'])) echo "Update"; else echo "Save";?>">
					    <button type="button" class="btn btn-sm btn-danger" onclick="window.history.back();">Cancel</button>
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
	<script>
	//    function PreviewImage()
	//    {
	//	var image =document.getElementById("image").value;
	//	$('#oldfile').val(image);
	//	var oFReader = new FileReader();
	//	oFReader.readAsDataURL(document.getElementById("image").files[0]);
	//	oFReader.onload = function (oFREvent)
	//	{
	//	    var data1=document.getElementById("show_image11").src = oFREvent.target.result;
	//	};
	//    };
	</script>
	
	<script>

	    $(".removeButton").on('click',function(){
	   
	    var $row = $(this).parents('.ImageViewer');
	    $row.remove();
	});
    function attachments()
    {
	
	$(".removeButton").on('click',function(){
	   
	    var $row = $(this).parents('.ImageViewer');
	    $row.remove();
	});
    }
    
    function addImage(){
	$('<div class="col-md-4 col-sm-4 col-xs-12 ImageViewer" style="padding-bottom:20px;"><img src="<?php echo site_url('assets/img/gallery/user-15.jpg');?>" class="col-md-12 previewimage" id="dummy1" style="height: 185px;" ><input type="hidden"  name="Aboutgalleryimagevalue" class="col-md-12" value="2" ><input type="file" id="preview" name="Aboutgalleryimage[]" onchange="attachment(this)" ><p></p><div class="col-md-12 " ><a  onclick ="" class="pull-right btn btn-danger removeButton" data-template="textbox"><i class="fa fa-trash"></i></a> </div>').appendTo("#gallery");	
	attachments();
    }
    
    function attachment($this) {
  var imgval=$('#preview').val();
$('#dummy1').val(imgval);
    var oFReader = new FileReader();
    oFReader.readAsDataURL($this.files[0]);
    oFReader.onload = function (oFREvent) {
    $($this).parents('.ImageViewer').find('img').attr("src",  oFREvent.target.result);
    
    };
    };
    
    
    function attachmenter($this) {
    var imgval=$('#previewer').val();
    var oFReader = new FileReader();
    oFReader.readAsDataURL($this.files[0]);
    oFReader.onload = function (oFREvent) {
    $($this).parents('.viewer').find('img').attr("src",  oFREvent.target.result);
    
    };
 };
//YUI().use('node', 'crop-box', function(Y){
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
//	    aboutusImage
//	    $(".imageId").attr("src",img);
//	    $("#aboutusImage").val(img);
//	    
//            Y.one('.imageId').attr("src",img);
//        })
//      
//    })
    function changeImage()
{
     $("#show_image11").addClass("hide");
    
    $("#changeImage").removeClass("hide");
    
}
$(function() {
    $('.image-editor').cropit({
      //exportZoom: 1.25,
      imageBackground: true,
      imageBackgroundBorderWidth: 20,
    });
    $('#crop').click(function() {
	var imageData = $('.image-editor').cropit('export');
	$('#cropImage').attr('src',imageData);
	$('#aboutusImage').val(imageData);
	$('#original').addClass('hide');
	$('#preview').removeClass('hide');
      
    });
});
</script>
	
	
    </body>
</html>

