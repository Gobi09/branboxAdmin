	    <?php $image_url=base_url().'upload/offer/';?>
	    <div class="content" id="content">
		<!-- begin page-header -->
		<h1 class="page-header">Edit Offer<small> Enter the correct details here...</small></h1>
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
				<h4 class="panel-title">Edit Offer</h4>
			    </div>
			    <div class="panel-body">
				<form class="form-horizontal form12" id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/offerEdit/'.$edit[0]['id']);?>">
				    <div class="col-md-8">
					<div class="form-group">
					    <label class="col-md-3 control-label">Title</label>
					    <div class="col-md-6">
						<input type="text" class="form-control" name="title" id="title" value="<?php echo $edit[0]['title'];?>">
					    </div>
					</div>
					
					<div class="form-group">
					    <label class="col-md-3 control-label">Item Name</label>
					    <div class="col-md-6">
						<select name="itemId" id="itemId" onchange="changeItem($(this))" class="form-control">
						    <option selected="" disabled="">Select Menu</option>
						    <?php foreach($getSubMenuItem as $data) {?>
						    <option  value="<?php echo $data['id'].'s'.$data['menuId'].'s'.$data['subMenuId'].'s'.$data['image']; ?>" <?php if($edit[0]['itemId']==$data['id'])echo "selected";?> ><?php echo $data['name']; ?></option>
						    <?php } ?>
						</select>
					    </div>
					</div>
					
					<div class="form-group">
					    <label class="col-md-3 control-label">Image</label>
					    <div class="col-md-6">
						<img class="media-object superbox-img previewimage" name="show_image" id="show_image11" src="<?php echo $edit[0]['image'];?>">
						<!--<input type="file" class="filestyle" name="image" id="image" onchange="PreviewImage();" data-buttonbefore="true" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
						<div class="bootstrap-filestyle input-group">
						    <span class="group-span-filestyle input-group-btn" tabindex="0">
							<label class="btn btn-default" id="new" for="image">
							    <span class="glyphicon glyphicon-folder-open"></span>
							    Choose file
							</label>
						    </span>
						    <input type="text" class="form-control" id="oldfile" name="oldfile" value="<?php echo $edit[0]['image'];?>" readonly>
						</div>-->
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-md-3 control-label">Price</label>
					    <div class="col-md-6">
						<input type="text" class="form-control" name="price" id="price" value="<?php echo $edit[0]['price'];?>" placeholder="Price"/>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-md-3 control-label">Valid From Date</label>
					    <div class="col-md-6">
						<input type="text" class="form-control" name="validFromdate" id="validFromdate"  value="<?php echo $edit[0]['validFromdate'];?>" placeholder="Valid From Date"/>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-md-3 control-label">Valid Upto Date</label>
					    <div class="col-md-6">
						<input type="text" class="form-control" name="validUptodate" id="validUptodate"  value="<?php echo $edit[0]['validUptodate'];?>" placeholder="Valid Upto Date"/>
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-md-3 control-label">Description</label>
					    <div class="col-md-6">
						<input class="form-control ckeditor" name="description" placeholder="description" value="<?php echo $edit[0]['description'];?>" id="description">
					    </div>    
					</div>
					<div class="form-group">
					    <label class="col-md-3 control-label">Offers Status</label>
					    <div class="col-md-9">
						<label class="col-md-1 control-label">OFF</label>
						<div class="col-md-2"><input type="checkbox" data-render="switchery" data-theme="green" value=" <?php echo $edit[0]['status'] ?>" <?php if($edit[0]['status']=='ON') echo "checked";?> name="status" id="status" value="ON" /></div>
						<label class="col-md-1 control-label">ON</label>
					    </div>
					</div>
				    </div>
				    <!--<div class="col-md-12">
					<div class="form-group">
					    <label class="col-md-2 control-label">Description</label>
					    <div class="col-md-9">
						<textarea class="ckeditor" name="description" id="description"><?php echo $edit[0]['description'];?></textarea>
					    </div>    
					</div>
				    </div>-->
				    <div class="col-md-12 col-md-offset-3 p-t-10">
					<fieldset>
					    <input type="submit" class="btn btn-sm btn-success" name="Update" value="Update">
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
            
	    title: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    },
                }
            },
	    itemId: {
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
                    },
                }
            },
	    
	    validFromdate: {
		trigger:'blur',
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    },
		    callback: {
			message: 'Valid FromDate should less than Valid Upto  date ',
			callback: function(value, validator, $field) {
                        var count;
			    var new_value=moment(value, 'YYYY/MM/DD').format('YYYY/MM/DD');
			    var after=$("#validUptodate").val();
			    var after = moment(after, 'YYYY/MM/DD').format('YYYY/MM/DD');
			   
			    if (new_value<after) {
				return true;
				
			    }
			     else
			    {
				return false;
			    }
			   
			
			}

		    }
		}
	    },
	    validUptodate: {
		trigger:'blur',
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    },
		    callback: {
			message: 'Valid Upto Date should more than Valid From date ',
			callback: function(value, validator, $field) {
                        var count;
			    var new_value=moment(value, 'YYYY/MM/DD').format('YYYY/MM/DD');
			    var after=$("#validFromdate").val();
			    var after = moment(after, 'YYYY/MM/DD').format('YYYY/MM/DD');
			    if (new_value>after) {
				return true;
			    }
			     else
			    {
				return false;
			    }
			   
			
			}

		    }
                }
            }
	}
    
    });
});

	$('#validFromdate').datetimepicker({
	    format: 'YYYY/MM/DD',
	    
	});
	$('#validUptodate').datetimepicker({
	    format: 'YYYY/MM/DD',
	});
	
	  function changeItem(chaneID)
	    {
		var datas=chaneID.val().split("s");
		 var data1=document.getElementById("show_image11").src =datas[3];
	    }
	    
	</script>
    </body>
</html>

