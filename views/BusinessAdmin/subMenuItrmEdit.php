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

	<li><a href="javascript:;">Sub Menu Item</a></li>
	<li class="active">Edit Sub Menu Item</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Edit Sub Menu Item <small> Enter the correct details here...</small></h1>
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
		    <h4 class="panel-title">Edit Sub Menu Item</h4>
		    
		</div>
		<div class="panel-body">
		     <div id="alert"></div>
		   <?php foreach($getSubMenuItemEdit as $item)?>
		    <form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/subMenuItemEdit/'.$menuId."/".$subMenuId."/".$item['id']); ?>" class="form-horizontal form12">
			<div class="col-md-offset-1">
			    <div class="form-group">
				<label class="col-md-3 control-label">Menu Name</label>
				<div class="col-md-3">
				    <select name="menuId" id="menuId" class="form-control">
					<option selected="" disabled="">Select Menu</option>
					<?php foreach($getMenu as $data) {?>
					<option  value="<?php echo $data['id']; ?>" <?php if($item['menuId']==$data['id'])echo "selected"; ?> ><?php echo $data['name']; ?></option>
					<?php } ?>
				    </select>
				</div>
			    </div>
			     <div class="form-group">
				<label class="col-md-3 control-label">Sub Menu Name</label>
				<div class="col-md-3">
				    <select name="subMenuId" id="subMenuId" class="form-control">
					<option selected="" disabled="">Select Sub Menu</option>
					<?php foreach($getSubMenu as $data) {?>
					<option  value="<?php echo $data['id']; ?>" <?php if($item['subMenuId']==$data['id'])echo "selected"; ?> ><?php echo $data['name']; ?></option>
					<?php } ?>
				    </select>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Sub Menu Item Name</label>
				<div class="col-md-3">
				    <input type="text" name="name" id="name" value="<?php echo $item['name']; ?>" class="form-control" placeholder="Sub Menu Name" />
				</div>
			    </div>
			    <div class="row p-b-10">
				<div class="col-md-offset-2">
				    <div class="col-xs-12 col-sm-12">
					<input type="hidden" name="oldImage" id="" value="<?php echo $item['image']?>" >
					<img class="img-responsive" name="show_image" src="<?php echo $item['image'];?>" onclick="$(this).addClass('hide');$('#original').removeClass('hide');$('#imagelabel').click();">
				    </div>
				    <div class="col-md-4 hide" id="original">
					<div class="image-editor">
					    <div class="cropit-image-preview-container">
					      <div class="cropit-image-preview"></div>
					    </div>
					    <div class="image-size-label">Resize image</div>
					    <div class="col-md-12 col-sm-6 col-xs-12">
						<input type="range" class="cropit-image-zoom-input">
					    </div>
					
					<div class="">
					    <div class="col-md-7 col-xs-6 col-sm-6">
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
				    <div class="col-md-6 hide" id="preview">
					<img src="<?php echo site_url('assets/img/noimage.jpg')?>" id="cropImage" class="img-responsive">
					<input type="hidden" name="subMenuItemImage" id="subMenuItemImage">
				    </div>
				</div>
			    </div>
<!--			   <div class="form-group">-->
<!--				<label class="col-md-3 control-label">Sub MenuItem Image</label>-->
<!--				<div class="col-md-5">-->
<!--				    <input type="hidden" name="oldImage" id="" value="<?php echo $item['image']?>" >-->
<!--  				    <img class="media-object superbox-img previewimage" id="show_image11" name="show_image" src=" <?php echo $item['image'];?>">-->
<!--				     <input id="filestyle-11" class="filestyle" type="file" name='image' onchange="PreviewImage();" data-buttonbefore="true"  style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">-->
<!--				    <div class="action">-->
<!--				-->
<!--			-->
<!--				-->
<!--				-->
<!--			    </div>-->
<!--				    -->
<!--				</div>-->
<!--			    </div>-->
		    <!--    <div class="">-->
		    <!--	<div class="imageBox hide" id="changeImage" >-->
		    <!--	    <div class="thumbBox"><h3><center>Please select the image</center></h3></div>-->
		    <!--	    <div class="spinner" style="display: none"></div>-->
		    <!--	</div>-->
		    <!--	<div class="action">-->
		    <!--	    -->
		    <!--	    <input type="file" class="file" onclick="changeImage();" name="image" style="float:left; width: 250px">-->
		    <!--	    <input type="button" class="btn btn-primary" name="crop" id="btnCrop" value="Crop" style="float: right">-->
		    <!--	    -->
		    <!--	</div>-->
		    <!--	<div class="cropped">-->
		    <!--	    <input type="hidden" name="oldImage" id="" value="<?php echo $item['image']?>" >-->
		    <!--	    <img src="<?php echo base_url("upload/item/".$item['image']);?>" class="imageId"  alt="" >-->
		    <!--		<input type="hidden" value="" name="subMenuItemImage" id="subMenuItemImage">-->
		    <!--	</div>-->
		    <!--    </div>-->
			
			<?php //foreach($getSubMenuItemGIngrediantEdit as $ing) { ?>
		    <!--     <div class="form-group odd">-->
		    <!--	<label class="col-md-4 control-label"></label>-->
		    <!--	<div class="col-md-5">-->
		    <!--	    <input type="hidden" name="ingredientsId[]" id="ingredientsId" value="<?php echo $ing['id']; ?>" class="form-control" />-->
		    <!--	    <input type="text" name="ingredients[]" id="ingredients" value="<?php echo $ing['ingredients']; ?>" class="form-control"  placeholder="Garnish" />-->
		    <!--	</div>-->
		    <!--	<div class="col-md-2 checkbox">-->
		    <!--	    <a href="<?php echo site_url("branboxController/subMenuItemIngrediantsDelete/".$ing['id']."/".$ing['menuId']."/".$ing['subMenuId']."/".$ing['itemId']) ?>" id="delete_box"><button type="button" class="btn btn-remove btn-danger btn-sm " data-template="textbox">Remove</button></a>-->
		    <!--	</div>-->
		    <!--    </div>-->
			<?php //} ?>
		    <!--     <div class="form-group odd hide" id="optionTemplate">-->
		    <!--	<label class="col-md-4 control-label"></label>-->
		    <!--	<div class="col-md-5">-->
		    <!--	    <input type="text" name="ingredients1[]" id="ingredients" class="form-control"  placeholder="Garnish" />-->
		    <!--	</div>-->
		    <!--	<div class="col-md-3 checkbox">-->
		    <!--	    <button type="button" class="btn btn-danger btn-sm removeButton" onclick="removerow($(this));" data-template="textbox">Remove</button>-->
		    <!--	</div>-->
		    <!--    </div>-->
			    <div class="form-group">
			       <label class="col-md-3 control-label">Item Price</label>
			       <div class="col-md-3">
				   <input type="text" name="price" id="price" value="<?php echo $item['price']; ?>" class="form-control"  placeholder="Price" />
			       </div>
			   </div>
			   <div class="form-group">
			       <label class="col-md-3 control-label">Item Tax</label>
			       <div class="col-md-3">
				   <input type="text" name="tax" id="tax" class="form-control" value="<?php echo $item['tax']; ?>"  placeholder="Tax" />
			       </div>
			   </div>
			   <div class="form-group">
			       <label class="col-md-3 control-label">Item Offers</label>
			       <div class="col-md-3">
				   <input type="text" name="offers" id="offers" class="form-control" value="<?php echo $item['offers']; ?>" placeholder="Offers" />
			       </div>
			   </div>
		    <!--    <div class="form-group">-->
		    <!--	<label class="col-md-3 control-label">Sub Menu Item Position</label>-->
		    <!--	<div class="col-md-9">-->
		    <!--	    <label class="col-md-1 control-label">OFF</label>-->
		    <!--	    <div class="col-md-2"><input type="number" name="positions" id="positions" class="form-control" value="<?php echo $item['positions']; ?>" placeholder="Sub Menu Position" /></div>-->
		    <!--	    <label class="col-md-1 control-label">ON</label>-->
		    <!--	</div>-->
		    <!--    </div>-->
			    <div class="form-group">
				<label class="col-md-3 control-label">Sub Menu Item Status</label>
				<div class="col-md-9">
				    <label class="col-md-1 control-label">OFF</label>
				    <div class="col-md-2"><input type="checkbox" data-render="switchery" data-theme="green"  name="status" id="status" value="ON" <?php if($item['status']=="ON") echo "checked"; ?>  /></div>
				    <label class="col-md-1 control-label">ON</label>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Sub Menu Item Online Status</label>
				<div class="col-md-9">
				    <label class="col-md-1 control-label">OFF</label>
				    <div class="col-md-2"><input type="checkbox" data-render="switchery" data-theme="green" name="online" id="online" value="ON"  <?php if($item['online']=="ON") echo "checked"; ?> /></div>
				    <label class="col-md-1 control-label">ON</label>
				</div>
				<div class="col-md-5"></div>
			    </div>
			    <div class="table-responsive col-md-8" >
				<table class="table table-bordered">
				    <thead>
					<tr>
					    <th>Ingredients</th>
					    <th>price</th>
					    <th>catogory</th>
					    <th><button type="button" class="btn btn-primary btn-sm addButton" data-template="textbox"><i class="fa fa-plus"></i></button></th>
					</tr>
				    </thead>
				    <tbody>
					 <?php foreach($getSubMenuItemGIngrediantEdit as $ing) { ?>
					<tr class="odd">
					    <input type="hidden" name="ingredientsId[]" id="ingredientsId" value="<?php echo $ing['id']; ?>" class="form-control" />
					    <td><span><input type="text" name="ingredients[]" id="ingredients" class="form-control"  value="<?php echo $ing['ingredients']; ?>"   placeholder="ingredients"/></span></td>
					    <td><span><input type="text" name="ingPrice[]" id="ingPrice" class="form-control" value="<?php echo $ing['price']; ?>"  placeholder="Price"/></span></td>
					    <td><span><select  class="form-control" name="category[]">
						    <option selected disabled>select</option>
						    <option value="base" <?php if($ing['category']=="base")echo "selected"; ?> >Base</option>
						    <option value="default" <?php if($ing['category']=="default")echo "selected"; ?>>default</option>
						    <option value="addon" <?php if($ing['category']=="addon")echo "selected"; ?>>Addon</option>
						</select></span>
					    </td>
					    <td><a href="<?php echo site_url("branboxController/subMenuItemIngrediantsDelete/".$ing['id']."/".$ing['menuId']."/".$ing['subMenuId']."/".$ing['itemId']) ?>" id="delete_box"><button type="button" class="btn btn-remove btn-danger btn-sm " data-template="textbox"><i class="fa fa-trash"></i></button></a></td>
					</tr>
					  <?php } ?>
					<tr class="odd hide" id="optionTemplate">
					    <input type="hidden" name="ingredients1[]" id="" class="form-control"  placeholder="" />
					    <td><span><input type="text" name="ingredients[]" id="ingredients" class="form-control"  placeholder="ingredients"/></span></td>
					    <td><span><input type="text" name="ingPrice[]" id="ingPrice" class="form-control"  placeholder="Price"/></span></td>
					    <td><span><select  class="form-control" name="category[]">
						<option  selected disabled >select</option>
						<option value="base">Base</option>
						<option value="default">Default</option>
						<option value="addon">Addon</option>
					    </select></span></td>
					    
					    <td><button type="button" class="btn btn-danger btn-sm removeButton" onclick="removerow($(this));" data-template="textbox"><i class="fa fa-trash"></i></button></td>
					</tr>
				    </tbody>
				</table>
			    </div>
			    <div class="col-md-offset-3 col-md-8">
				<div class="form-group">
				   <label class="col col-4"></label>
				   <button class="btn btn-md btn-danger " onclick="window.history.back();" type="button"> Cancel </button>
				   <input type="submit" class="btn btn-md btn-success" name="proceed" id="submit_but" value="Save" >
				</div>
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
            
	    menuId: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    },
                }
            },
	    subMenuId: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    },
                }
            },
	    
	    name: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    },
                }
            },
	    
	    price: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
                }
            },
	     tax: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
                }
            },
	    offers: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
                }
            },
	    positions: {
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
	    "ingredients[]":{
		group:"td",
		 validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
                }
	    },
	    "ingPrice[]":{
		group:"td",
		 validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
                }
	    },
	    
	    "category[]":{
		group:"td",
		 validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
                }
	    }
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
<script>
    $('#form_validation').on('click', '#delete_box', function(e) {
     e.preventDefault();
	    var link = $(this).attr('href');
	    var $row = $(this).parents('.odd');
	  bootbox.confirm("Are you sure you want to delete?", function(confirmed) {   
		   if (confirmed)
		   {
                    loadLoader();
			var getURL=link;
			
			$.ajax({
			    type: "POST",
                            //dataType: 'json',
			    url: getURL,
			    success: function (response) {
			       if (response==1) {
				    $('#alert').append('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> A single Ingrediants is Deleted Successfully.</div>');
				    $row.remove();
			       }else{
				    $('#alert').append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong>Unable to Delete Ingrediants.</div>');
			       }
                               unLoader();
			        moveToTop()
			       	setTimeout(function(){ $('#alert').empty(); }, 8000);
			    }
			    });  
		    }    
		});
     });
    function moveToTop(){
      $("html, body").animate({ scrollTop: 0 }, 600);
      return false;
   }
   function loadLoader() {
    $('panel-body').addClass('loading').loader('show', { overlay: true });
}
function unLoader() {
    $('panel-body').removeClass('loading').loader('hide');
}
</script>
<script type="text/javascript">
    //$(document).ready(function(){
    //    $('[data-toggle="tooltip"]').tooltip();   
    //});
</script>


    <script type="text/javascript">

    $(document).ready(function(){
	
	var menuId= $("#menuId").val();
	var subMenuId= $("#subMenuId").val();
	    $.ajax({
	    type: "POST",
	    data: {menuId:menuId},
	    url: "<?php echo base_url(); ?>branboxController/ajaxGetSubMenu",
	    success: function(response){
		console.log(response);
	       $("#subMenuId").html(response);
	       $("#subMenuId").val(subMenuId);
	    },
	    });

        //$(".tip-top").tooltip({placement : 'top'});
        //
        //$(".tip-right").tooltip({placement : 'right'});
        //
        //$(".tip-bottom").tooltip({placement : 'bottom'});
        //
        //$(".tip-left").tooltip({ placement : 'left'});

    });
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
//	    subMenuItemImage
//	    $(".imageId").attr("src",img);
//	    $("#subMenuItemImage").val(img);
//	    
//            Y.one('.imageId').attr("src",img);
//        })
//      
//    })
//    function changeImage()
//    {
//	 $("#show_image11").addClass("hide");
//	
//	$("#changeImage").removeClass("hide");
//	
//    }
$(function() {
    $('.image-editor').cropit({
      //exportZoom: 1.25,
      imageBackground: true,
      imageBackgroundBorderWidth: 20,
    });
    $('#crop').click(function() {
	var imageData = $('.image-editor').cropit('export');
	$('#cropImage').attr('src',imageData);
	$('#subMenuItemImage').val(imageData);
	$('#original').addClass('hide');
	$('#preview').removeClass('hide');
      
    });
});	
</script>
</body>

</html>

