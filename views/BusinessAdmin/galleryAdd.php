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
/*cropper image*/

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
		<div class="panel-body">
		    <p style="color: #EB4688"><?php if (isset($error_message)) { echo $error_message; } ?></p>		   
		    <div class="col-md-offset-1">
			<form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/imageListAdd'); ?>" class="form-horizontal">
			    <div class="row">
				<div class="col col-md-4" id="original">
				    <div class="image-editor">
					<div class="cropit-image-preview-container">
					  <div class="cropit-image-preview"></div>
					</div>
					<div class="image-size-label">Resize image</div>
					<div class="col col-md-10 col-sm-6 col-xs-12">
					    <input type="range" class="cropit-image-zoom-input">
					</div>
				    
				    <div class="p-t-30">
					<div class="col col-md-6 col-xs-6 col-sm-6">
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
				<div class="col col-md-6 p-t-30 hide" id="preview">
				    <img src="<?php echo site_url('assets/img/noimage.jpg')?>" id="cropImage" class="img-responsive">
				    <div class="col col-md-12 col-sm-12 col-xs-12 p-t-20">
					<input type="checkbox" name="active" onchange="if($(this).prop('checked')) { $(this).val('ON'); }else{ $(this).val('OFF'); }" id="active" value="ON" data-render="switchery" data-theme="default" checked />
					Image Status
					<!--<input type="hidden" name="active" id="active" value="ON" />-->
				    </div>
				</div>
				<input type="hidden" value="" name="galleryImage" id="galleryImage">
			    </div>
			    
			    <div class="col-md-offset-3 col-md-6 p-t-20">
				 <div class="form-group">
				    <label class="col col-4"></label>
				    <button class="btn btn-md btn-danger " onclick="window.history.back();" type="button">Cancel</button>
				    <input type="submit" class="btn btn-md btn-success" name="clear" id="clear" value="Reset" >
				    <input type="submit" class="btn btn-md btn-success"  name="add" id="submit_but" value="Upload Images" >
				 </div>
			      </div>
			</form>
		    </div>
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
    FormSliderSwitcher.init();
$("#faq_title").click(function(){
    var title = $(this).text();
    $.ajax({
        url: 'imageListView',
        data: ({'title': title}),
        dataType: 'json', 
        type: "post",
        success: function(data){
            response = jQuery.parseJSON(data);            
        }             
    });
});
$(function() {
    $('.image-editor').cropit({
      //exportZoom: 1.25,
      width: 300,
      height: 300,
      imageBackground: true,
      imageBackgroundBorderWidth: 20,
    });
    $('#crop').click(function() {
	var imageData = $('.image-editor').cropit('export');
	$('#cropImage').attr('src',imageData);
	$('#galleryImage').val(imageData);
	$('#original').addClass('hide');
	$('#preview').removeClass('hide');
      
    });
});
</script>
</body>
</html>

