
<!--Author: gobi.C
Created on: 04/03/15
Modified on: 24/03/15
-->

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">

	<li><a href="javascript:;">Sub Menu Item</a></li>
	<li class="active">Add Sub Menu Item</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Sub Menu Item <small> Enter the correct details here...</small></h1>
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
		    <h4 class="panel-title">Add Sub Menu Item</h4>
		    
		</div>
		<div class="panel-body">
		   
		    <div class="col-md-offset-1 col-md-8">
			<form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/subMenuItemAdd'); ?>" class="form-horizontal form12">
			    <div class="form-group">
				<label class="col-md-3 control-label">Menu Name</label>
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
				<label class="col-md-3 control-label">Sub Menu Name</label>
				<div class="col-md-5">
				    <select name="subMenuId" id="subMenuId" class="form-control">
					
				    </select>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Sub Menu Item Name</label>
				<div class="col-md-5">
				    <input type="text" name="name" id="name"  class="form-control" placeholder="Sub Menu Name" />
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Sub Menu Item Image</label>
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
			    
			     <div class="form-group">
				<label class="col-md-3 control-label">Item Price</label>
				<div class="col-md-5">
				    <input type="text" name="price" id="price" class="form-control"  placeholder="Price" />
				</div>
			    </div>
			    
			    <div class="form-group">
				<label class="col-md-3 control-label">Item Tax</label>
				<div class="col-md-5">
				    <input type="text" name="tax" id="tax" class="form-control"  placeholder="Tax" />
				</div>
			    </div>
			        <div class="form-group">
				<label class="col-md-3 control-label">Item Offers</label>
				<div class="col-md-5">
				    <input type="text" name="offers" id="offers" class="form-control"  placeholder="Offers" />
				</div>
			    </div>
			    
			    <div class="form-group">
				<label class="col-md-3 control-label">Sub Menu Item Status</label>
				<div class="col-md-9">
				    <label class="col-md-1 control-label">OFF</label>
				    <div class="col-md-2"><input type="checkbox" data-render="switchery" data-theme="green" name="status" id="status" value="ON" checked /></div>
				    <label class="col-md-1 control-label">ON</label>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Sub Menu Item Online Status</label>
				<div class="col-md-9">
				    <label class="col-md-1 control-label">OFF</label>
				    <div class="col-md-2"><input type="checkbox" data-render="switchery" data-theme="green" name="online" id="online" value="ON"  checked /></div>
				    <label class="col-md-1 control-label">ON</label>
				</div>
			    </div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Item Ingredients</label>
				<div class="col-md-8">
				    <div class="col-md-6" id="ing">
					<input type="text" name="ingredients[]" id="ingredients" class="form-control"  placeholder="ingredients" />
				    </div>
				    <div class="col-md-6">
					<label class="col-md-2 control-label">Price</label>
					<div class="col-md-10">
					    <input type="text" name="ingPrice[]" id="ingPrice" class="form-control"  placeholder="Price" />
					</div>
				    </div>
				</div>
				<div class="col-md-1 checkbox">
				    <button type="button" class="btn btn-primary btn-sm addButton" data-template="textbox"><i class="fa fa-plus"></i></button>
				</div>
			    </div>
			    <div class="form-group odd hide" id="optionTemplate">
				<label class="col-md-3 control-label"></label>
				<div class="col-md-8">
				    <div class="col-md-6">
					<input type="text" name="ingredients[]" id="ingredients" class="form-control"  placeholder="ingredients" />
				    </div>
				    <div class="col-md-6">
					<label class="col-md-2 control-label">Price</label>
					<div class="col-md-10">
					    <input type="text" name="ingPrice[]" id="ingPrice" class="form-control"  placeholder="Price" />
					</div>
				    </div>
				</div>
				<div class="col-md-1 checkbox">
				    <button type="button" class="btn btn-danger btn-sm removeButton" onclick="removerow($(this));" data-template="textbox"><i class="fa fa-trash"></i></button>
				</div>
			    </div>
			   <div class="col-md-offset-6 col-md-12">
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
	    
	    image: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
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
		group:"#ing",
		validators:{
		    notEmpty:{
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
$(".addButton").click(function(){
    var $template = $('#optionTemplate');
    $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template);
});

function removerow($this){
    var $row   = $this.parents('.odd');
     $row.remove();
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
	
</body>

</html>

