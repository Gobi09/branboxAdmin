	    <?php $image_url=base_url().'upload/offer/';?>
	    <div class="content" id="content">
		<!-- begin breadcrumb -->
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">View all End Users For Branbox <small></small></h1>
		<!-- end page-header -->
		<!-- begin row -->
		<div class="row">
		    <!-- begin col-10 -->
		    <div class="col-md-12">
			<!-- begin panel -->
			<div class="panel panel-inverse">
			    <div class="panel-heading">
				<div class="panel-heading-btn">
				    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
				    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				</div>
				<h4 class="panel-title">View End User Details </h4>
			    </div>
			    <div class="panel-body" id="form_validation">
				<div id="alert"></div>
				<p>
				    <a class="btn btn-inverse btn-sm "href="<?php echo site_url('branboxController/endUserAdd')?>"><i class="fa fa-plus fa-1x"></i> <span class="f-s-14 f-w-500">Add</span></a>
				</p>
				<table class="table table-striped table-bordered nowrap" id="dataRespTable" width="100%">
				    <thead>
					<tr>
					    <th>User Name</th>
					    <th>Email</th>
					    <th>Address</th>
					    <th>DOB</th>
					    <th>Mobile No</th>
					    <th>Email</th>
					    <th>Action</th>
					</tr>
				    </thead>
				    <tbody>
					<?php foreach($endUserView as $row){?>
					<tr class="new">
					    <td>
						<?php   echo $row['userName']; ?>
					    </td>
					    <td>
						<?php   echo $row['email']; ?>
					    </td>
					    <td>
						<?php   echo $row['address1'].",<br>".$row['address2'].",<br>".$row['city'].",<br>".$row['state']."."; ?>
					    </td>
					    <td>
						<?php   echo $row['dateOfBirth']; ?>
					    </td>
					    <td>
						<?php   echo $row['phoneNumber']; ?>
					    </td>
					    <td>
						<?php   echo $row['email']; ?>
					    </td>
					    <td>
						<a href="<?php echo base_url('branboxController/takeOrderForCustomer/'.$row['id']); ?>"  class="btn btn-sm btn-warning" >Take Order</a>
						<button <?php if($row['status']=="ON") echo 'class="btn btn-success"'; else  echo 'class="btn btn-danger"';  ?> name="status[]" id="status-<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></button></td>
					    <script>
					    $("#status-<?php echo $row['id']; ?>").click(function() {
						var id=<?php echo $row['id']; ?>;
						$.ajax({
						    type: "POST",
						    dataType: "json",
						    data: {id:id},
						    url: "<?php echo base_url(); ?>branboxController/endUserStatusUpdate",
						    success: function(json){
							if (json.status=="ON")
							{
							    $("#status-<?php echo $row['id']; ?>").html(json.status);
							    $("#status-<?php echo $row['id']; ?>").removeAttr("class");
							    $("#status-<?php echo $row['id']; ?>").attr("class","btn btn-success");
							}
							else
							{
							    $("#status-<?php echo $row['id']; ?>").html(json.status);
							    $("#status-<?php echo $row['id']; ?>").removeAttr("class");
							    $("#status-<?php echo $row['id']; ?>").attr("class","btn btn-danger");
							}
						    
						    },
						});
					    });
					    </script>
					   <!-- <td>
						<a class="btn btn-xs btn-inverse"   data-href="<?php echo base_url('branboxController/endUserStatusUpdate/'.$row['id']); ?>"  id="delete_box"  >  <i class="fa fa-trash-o fa-fw" >  </i> </a></td>
					    </td>-->
					</tr>
					<?php }?>
				    </tbody>
				</table>
			    </div>
			</div>
			<!-- end panel -->
		    </div>
		    <!-- end col-10 -->
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
	    
	    $(document).ready(function()
	    {
		var table = $("#dataRespTable").DataTable
		({
		    dom: 'TRC<"clear">lfrtip',
		    responsive: true,
		    
		});
		table.columns( [] ).visible( false, false );
		table.columns.adjust().draw( false );
	    });
	    
	</script>
    </body>
</html>



<script>
$('#form_validation').on('click', '#delete_box', function() {
 var link = $(this).attr('data-href');
  var $row = $(this).parents('.new');
 var a = $(this).attr('val');
      bootbox.confirm("Are you sure you want to delete?", function(confirmed) {   
               if (confirmed) {
			   $('#alert').empty();
			    $.ajax({
				type:'POST',
				url:link,
				success:function(response){
				if(response=="1"){
				$('#alert').append('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> A Record is Deleted Successfully.</div>');
				$row.remove();
				}else if(response=="0"){
				$('#alert').append('<div class="alert alert-danger "><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a><strong>Failure!</strong> A Record is Unable To Delete, Some Sub menus and Item Depends on This Menu.</div>');
				}
				
				setTimeout(function(){ $('#alert').empty(); }, 8000);
				
				}
			    });
                }    
            });
 });

</script>

