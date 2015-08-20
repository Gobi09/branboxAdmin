 <!--
    functionality By: Ezhilarasan T
    Created on: 20/06/15
    Modified on: 20/06/15-->
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Application</a></li>
	<li><a href="javascript:;">Define</a></li>
	<li><a href="javascript:;">Address</a></li>
	<li class="active">Add Table list</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Table list  <small> Enter the correct details here...</small></h1>
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
		    <h4 class="panel-title">Add Table list</h4>
		</div>
		<div class="panel-body">
		    <p style="color: #EB4688"><?php if (isset($error_message)) { echo $error_message; } ?></p>		   
		    <form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/tableListAdd'); ?>" class="form-horizontal">
			<!--<div class="col-md-offset-1 col-md-10">-->
			<input type="hidden" id="row_contains" name="row_contains" value="1" />			    
			<div class="form-group">
			    <label class="col-md-3 control-label">Name</label>
			    <div class="col-md-4">				    
				<input type="text" value="<?php //echo $row['name']; ?>" name="name" id="name" class="form-control" placeholder="Name" />
			    </div>
			</div>
			  <div class="form-group">
			    <label class="col-md-3 control-label">Feature</label>
			    <div class="col-md-9">
				<textarea class="form-control ckeditor" name="feature" id="feature" rows="4" cols="50"><?php //echo $feature; ?></textarea>				    
			    </div>
			</div>
			<div class="form-group">
			    <label class="col-md-3 control-label">Image</label>
			    <!--<div class="col-md-4">-->
			    <div class="form-group">
				<!--<label class="col-md-3 control-label">Sub Menu Image</label>-->
				<div class="col-md-5">
				    <img class="media-object superbox-img previewimage" id="show_image11" name="show_image" src="<?php echo base_url("assets/img/user-15.jpg");?>">
				    <input id="filestyle-11" class="filestyle" type="file" name='image' onchange="PreviewImage();" data-buttonbefore="true" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
				    <div class="bootstrap-filestyle input-group">
					<span class="group-span-filestyle input-group-btn" tabindex="0">
					    <label id="new" class="btn btn-default" for="filestyle-11">
						<span class="glyphicon glyphicon-folder-open"></span>
						Choose file
					    </label>
					</span>
					<input class="form-control" id="filestyle-21" value="" type="text" readonly>
				    </div>					
				</div>
			    </div>				    
			</div>
			 <div class="form-group">
				<label class="col-md-3 control-label">price</label>
				<div class="col-md-5">
				    <input  name="price" type="text" id="price" class="form-control">
				    <!--<input type="text" data-toggle="tooltip" data-placement="top" data-original-title="Format is -90.0000&deg;N or +90.0000&deg;S" name="ct_latitude" id="ct_latitude"  class="form-control" placeholder="CT_LATITUDE" />-->
				</div>    
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Status</label>
				<div class="col-md-4">
				    <input checked="checked" name="status" data-render="switchery" data-theme="green" value="ON" type="checkbox" >
				    <!--<input type="text" data-toggle="tooltip" data-placement="top" data-original-title="Format is -90.0000&deg;N or +90.0000&deg;S" name="ct_latitude" id="ct_latitude"  class="form-control" placeholder="CT_LATITUDE" />-->
				</div>    
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Online</label>
				<div class="col-md-4">
				    <input checked="checked" name="online" data-render="switchery" data-theme="green" value="ON" type="checkbox" >
				    <!--<input type="text" data-toggle="tooltip" data-placement="top" data-original-title="Format is -90.0000&deg;N or +90.0000&deg;S" name="ct_longitude" id="ct_longitude" class="form-control" placeholder="CT_LONGITUDE" />-->
				</div>    
			    </div>
                          
			 
			    <div class="col-md-offset-3 col-md-6">
				 <div class="form-group">
				    <label class="col col-4"></label>
				    <button class="btn btn-md btn-danger " onclick="window.history.back();" type="button"> Cancel </button>
				    <button class="btn btn-md btn-info " onclick=" form_reset();" id="clear_data" type="button"> Reset </button>
				    <input type="submit" class="btn btn-md btn-success"  name="add" id="submit_but" value="Save" >
				 </div>
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
//image for burtlan end
</script>
	<script type="text/javascript">
    $(document).ready(function(){
          FormSliderSwitcher.init();
    });
</script>
	
</body>

</html>

