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
		<div class="panel-body">
		    <p style="color: #EB4688"><?php if (isset($error_message)) { echo $error_message; } ?></p>		   
		    <div class="col-md-offset-1 col-md-7">
			<form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/imageListAdd'); ?>" class="form-horizontal">
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
				    <input type="hidden" value="" name="galleryImage" id="galleryImage">
			    </div>
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

