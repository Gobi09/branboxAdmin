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
				<form class="form-horizontal form12" id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/aboutUs');?>">
				    <div class="col-md-8">
					<div class="form-group">
					    <label class="col-md-3 control-label">Title</label>
					    <div class="col-md-6">
						<input type="text" class="form-control" name="title" id="title" value="<?php if(isset($edit[0]['title'])) echo $edit[0]['title']; else echo ""; ?>">
						
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-md-3 control-label">Image</label>
					    <div class="col-md-6">
						<img class="media-object superbox-img previewimage" name="show_image" id="show_image11" src="<?php if(isset($edit[0]['image']))echo $image_url.$edit[0]['image']; else echo base_url("assets/img/user-15.jpg");?>">
						<input type="file" class="filestyle" name="image" id="image" onchange="PreviewImage();" data-buttonbefore="true" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
						<div class="bootstrap-filestyle input-group">
						    <span class="group-span-filestyle input-group-btn" tabindex="0">
							<label class="btn btn-default" id="new" for="image">
							    <span class="glyphicon glyphicon-folder-open"></span>
							    Choose file
							</label>
						    </span>
						    <input type="text" class="form-control" id="oldfile" name="oldfile" value="<?php if(isset($edit[0]['image'])) echo $edit[0]['image']; else echo "";?>" readonly>
						</div>
					    </div>
					</div>
				    </div>
				    <div class="col-md-12">
					<div class="form-group">
					    <label class="col-md-2 control-label">Description</label>
					    <div class="col-md-9">
						<textarea class="ckeditor" name="description" id="description"><?php if(isset($edit[0]['description'])) echo $edit[0]['description']; else echo "";?></textarea>
					    </div>    
					</div>
				    </div>
				    <div class="col-md-8">
					 <input type="hidden" name="gobio" value="sdfassdsssssssssssfd">
					    <input type="file" id="preview" name="About[]" class="col-md-12 " onchange="attachment(this);" >
					<legend>About Us Gallery Images<button type="button" onclick="addImage()" class="pull-right btn btn-primary"><i class="fa  fa-plus"></i></button></legend>
					    <div class="row">
						<div class="row AdjustPadding" id="image1" style="padding-bottom:20px;" >						    
						    <div class="col-md-12" id="gallery">
							<div class="col-md-4 ImageViewer AdjustPadding" style="padding-bottom:20px;"  >
							    <img src="<?php echo site_url('assets/img/gallery/user-15.jpg');?>" class="col-md-12 previewimage " id="dummy1" style="height: 185px;" >
								<input type="file" id="preview" name="Aboutgalleryimage1[]" class="col-md-12 " onchange="attachment(this);" >
							   
								
							</div>
						    </div>
						</div>
					    </div>
				    </div>
				    <div class="col-md-12 col-md-offset-3 p-t-10">
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
	    function PreviewImage()
	    {
		var image =document.getElementById("image").value;
		$('#oldfile').val(image);
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("image").files[0]);
		oFReader.onload = function (oFREvent)
		{
		    var data1=document.getElementById("show_image11").src = oFREvent.target.result;
		};
	    };
	</script>
	
	<script>

    function attachments()
    {
	
	$(".removeButton").on('click',function(){
	   
	    var $row = $(this).parents('.ImageViewer');
	    $row.remove();
	});
    }
    
    function addImage(){
    $('<div class="col-md-4 col-sm-4 col-xs-12 ImageViewer" style="padding-bottom:20px;"  ><img src="<?php echo site_url('assets/img/gallery/user-15.jpg');?>" class="col-md-12 previewimage" id="dummy1" style="height: 185px;" ><input type="file" id="preview" name="Aboutgalleryimage[]" onchange="attachment(this)" ><p></p><div class="col-md-12 " ><a  onclick ="" class="pull-right btn btn-danger removeButton" data-template="textbox"><i class="fa fa-trash"></i></a> </div>	').appendTo("#gallery");	
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
    
</script>
	
	
    </body>
</html>

