<!-- begin #content -->
<style>
    #pagination{
margin: 40 40 0;
}
ul.tsc_pagination li a
{
border:solid 1px;
border-radius:3px;
-moz-border-radius:3px;
-webkit-border-radius:3px;
padding:6px 9px 6px 9px;
}
ul.tsc_pagination li
{
padding-bottom:1px;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
color:#FFFFFF;
box-shadow:0px 1px #EDEDED;
-moz-box-shadow:0px 1px #EDEDED;
-webkit-box-shadow:0px 1px #EDEDED;
}
ul.tsc_pagination
{
margin:4px 0;
padding:0px;
height:100%;
overflow:hidden;
font:12px 'Tahoma';
list-style-type:none;
}
ul.tsc_pagination li
{
float:left;
margin:0px;
padding:0px;
margin-left:5px;
}
ul.tsc_pagination li a
{
color:black;
display:block;
text-decoration:none;
padding:7px 10px 7px 10px;
}
ul.tsc_pagination li a img
{
border:none;
}
ul.tsc_pagination li a
{
color:#0A7EC5;
border-color:#8DC5E6;
background:#F8FCFF;
}
ul.tsc_pagination li a:hover,
ul.tsc_pagination li a.current
{
text-shadow:0px 1px #388DBE;
border-color:#3390CA;
background:#58B0E7;
background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
}

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
	<li class="active">Add Gallery list</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Gallery</h1>
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
		    <h4 class="panel-title">Add Image To Gallery</h4>
		</div>
		<div class="panel-body" id="crop-avatar">
		    <p style="color: #EB4688"><?php if (isset($error_message)) { echo $error_message; } ?></p>		   
		    <div class="col-md-offset-1 col-md-7">
			<form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/imageListAdd'); ?>" class="form-horizontal">
			   <div id="uploadphotomodal" class="modal fade" role="dialog">
				<div class="modal-dialog">
				    <!-- Modal content-->
				    <div class="modal-content">
					<div class="modal-header">
					    <button type="button" class="close" data-dismiss="modal">&times;</button>
					    <h4 class="modal-title">Modal Header</h4>
					</div>
					<div class="modal-body">
					    <p>Some text in the modal.</p>
					</div>
					<div class="modal-footer">
					    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				    </div>
				</div>
			    </div>
			    <div class="form-group">
				<label class="control-label"><center>Please Upload profile pic</center></label>
				<!-- Current avatar class="avatar-view"-->
				<div class="avatar-view fileupload" title="Change the avatar">
				    <img src="<?=site_url()?>assets/img/noimage.jpg" alt="Avatar">
				    <input type="hidden" name="USER_IMAGE_FILE" class="imageUrl" />
				</div>
				<!-- Loading state -->
				<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Image Status</label>
				<div class="col-md-5">
				    <input type="checkbox" data-render="switchery" data-theme="green" name="active" id="active" value="ON" checked />
				</div>
			    </div>
			    <div class="col-md-offset-3 col-md-6">
				 <div class="form-group">
				    <label class="col col-4"></label>
				    <button class="btn btn-md btn-danger " onclick="window.history.back();" type="button">Cancel</button>
				    <input type="submit" class="btn btn-md btn-success" name="clear" id="clear" value="Reset" >
				    <input type="submit" class="btn btn-md btn-success"  name="add" id="submit_but" value="Upload Images" >
				 </div>
			      </div>
			</form>
			<!--<div class="container" id="crop-avatar">-->
			<!-- Cropping modal -->
			<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
			<div class="modal-dialog modal-lg">
			    <div class="modal-content">
				<form class="avatar-form" action="<?=site_url('helpers/crop_helper.php')?>" enctype="multipart/form-data" method="post">
				    <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
				    </div>
				    <div class="modal-body">
					<div class="avatar-body">
					    <!-- Upload image and data -->
					    <div class="avatar-upload">
						<input type="hidden" class="avatar-src" name="avatar_src" />
						<input type="hidden" class="avatar-data" name="avatar_data" />
						<label for="avatarInput">Local upload</label>
						<input type="file" class="avatar-input" id="avatarInput" name="avatar_file" />
					    </div>
					    <!-- Crop and preview -->
					    <div class="row">
						<div class="col-md-9">
						    <div class="avatar-wrapper"></div>
						</div>
						<div class="col-md-3">
						    <div class="avatar-preview preview-lg"></div>
						    <div class="avatar-preview preview-md"></div>
						    <div class="avatar-preview preview-sm"></div>
						</div>
					    </div>
					    <div class="row avatar-btns">
						<div class="col-md-9">
						    <div class="btn-group">
							<button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
							<button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
							<button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
							<button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
						    </div>
						    <div class="btn-group">
							<button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
							<button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
							<button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
							<button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
						    </div>
						</div>
						<div class="col-md-3">
						    <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
						</div>
					    </div>
					</div>
				    </div>
				    <?php $galleryName = $this->branboxModel->getImageNameNumber();
				    foreach($galleryName as $name) { 
				    $imageName = explode('.',$name['name'])[0];
				    $imageNumber[] = end(explode('-',$imageName));
				    }
				    $arr2 = range(1,max($imageNumber));                                                    
				    $missing = array_diff($arr2,$imageNumber);
				    if(empty($missing))
				    {
					echo $max = max($imageNumber) + 1;
				    }else{
					echo $max = $missing[1];
				    }
				    ?>
				    <input type="hidden" name="ImageName" value="gallery-<?php echo $max;?>">
				    <!-- <div class="modal-footer">
				    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div> -->
				</form>
			    </div>
			</div>
		    </div>
			
		    <!-- Cropping modal -->
		    </div>
		<!--    <div class="row">-->
		<!--	<div class="col-md-12">-->
		<!--	    <div class="col-md-3 ">-->
		<!--		-->
		<!--	    </div>-->
		<!--	    -->
		<!--	</div>-->
		<!--    </div>-->
		    
		    
		    <div class="row">
			<div class="col-md-12">
			<?php if(count($results) > 0)
			    {
				foreach($results as $viewShowResult)
				{
				?>
				<div class="col-md-3 ">
				    <img class="" style="width:100%;height:150px" src="<?php echo ($viewShowResult['link']);?>" >
				    <!--<p class="image-caption">-->
					<h5 class="title"><?php $imgname=explode("/",$viewShowResult['link']); $count=count($imgname); echo $imgname[$count-1]; ?> <br></h5>
					<h5 class="title">Size:<?php echo $viewShowResult['size']?> <br></h5>
					<button <?php if($viewShowResult['active'] == "ON") echo 'class="btn btn-success m-r-5"'; else  echo 'class="btn btn-danger"';  ?> name="active" id="active-<?php echo $viewShowResult['id']; ?>"><?php echo $viewShowResult['active']; ?></button>
					<script>
					$("#active-<?php echo $viewShowResult['id']; ?>").click(function() {
					    var menuId=<?php echo $viewShowResult['id']; ?>;
					    $.ajax({
						type: "POST",
						dataType: "json",
						data: {menuId:menuId},
						url: "<?php echo base_url(); ?>branboxController/ajaxGalleryActive",
						success: function(json){
						    if (json.active=="ON")
						    {
							$("#active-<?php echo $viewShowResult['id']; ?>").html(json.active);
							$("#active-<?php echo $viewShowResult['id']; ?>").removeAttr("class");
							$("#active-<?php echo $viewShowResult['id']; ?>").attr("class","btn btn-success");
						    }
						    else
						    {
							$("#active-<?php echo $viewShowResult['id']; ?>").html(json.active);
							$("#active-<?php echo $viewShowResult['id']; ?>").removeAttr("class");
							$("#active-<?php echo $viewShowResult['id']; ?>").attr("class","btn btn-danger");
						    }
						
						},
					    });
					});
					</script>
					<a href="<?php echo base_url('branboxController/imageDelete/'.$viewShowResult['id'])?>" id="delete_box" class="btn btn-xs btn-inverse" <?php ?> >  <i class="fa  fa-trash-o" >  </i>  </a>
				    <!--</p>-->
				</div>
			    <?php 
			    }
			    }
			    ?>
			</div>
		    </div>
		    <div id="pagination">
			<ul class="tsc_pagination">
			
			<!-- Show pagination links -->
			<?php foreach ($links as $link) {
			echo "<li>". $link."</li>";
			} ?>
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
//image for burtlan start
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
    
    $("#faq_title").click(function(){
    var title = $(this).text();

    $.ajax({
        url: 'imageListView',
        data: ({'title': title}),
        dataType: 'json', 
        type: "post",
        success: function(data){
                      response = jQuery.parseJSON(data);            
                   console.log(response); }             
    });
    });
//image for burtlan end
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
	    galleryImage
	    $(".imageId").attr("src",img);
	    $("#galleryImage").val(img);
	    
            Y.one('.imageId').attr("src",img);
        })
      
    })
</script>
	
</body>

</html>

