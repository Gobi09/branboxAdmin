	   
	    <div class="content" id="content">
		<!-- begin breadcrumb -->
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">View all FeedBacks from the Users<small></small></h1>
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
				<h4 class="panel-title">View FeadBacks</h4>
			    </div>
			    <div class="panel-body" id="form_validation">
				<div id="alert"></div>
				<table class="table table-striped table-bordered nowrap" id="dataRespTable" width="100%">
				    <thead>
					<tr>
					    <th>User Name</th>
					    <th>Email</th>
					    <th>Message</th>
					    <th>Action</th>
					</tr>
				    </thead>
				    <tbody>
					<?php foreach($feedback as $row){?>
					<tr class="new">
					    <td>
						<?php   echo $row['name']; ?>
					    </td>
					    <td>
						<?php   echo $row['email']; ?>
					    </td>
					    <td>
						<?php   echo $row['message']; ?>
					    </td>
					    <td>
					    <?php   if($row['status']=="ON" ) {?>
						<a class="btn btn-xs btn-success"  data-toggle="modal" data-target="#message<?php echo $row['id']; ?>"  >  <i class="fa fa-comment"></i> </a>
						<?php } else {?>
						<a class="btn btn-xs btn-inverse" data-href="<?php echo base_url('branboxController/feedBackDelete/'.$row['id']); ?>"  id="delete_box"  >  <i class="fa fa-trash-o fa-fw" >  </i> </a></td>
					    <?php   } ?>
					    </td>
					</tr>
					<div class="modal  fade" id="message<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					    <div class="modal-dialog modal-md">
						<div class="modal-content">
						    <div class="modal-header" style="border-bottom: 1px solid #e5e5e5; min-height: 16.4286px; padding: 15px;">   
							<b><img alt="" data-id="login-cover-image" src="<?php echo base_url("assets/img/logo.jpg")?>"></b>
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button"><i class="fa  fa-times-circle "></i></button>
						    </div>
						    <div class="model-body" >
							<form action="<?php echo base_url('branboxController/feadBack'); ?>" method="POST" id="form_validation1" class="margin-bottom-0">
							    
							    <div class="panel-body">
								<center><h4>Enter Your Message For Feed Back</h4></center>
								
								<div class="form-group">
								    <div class="col-md-12">
									<input type="hidden" name="userEmail" value="<?php echo $row['email'];?>" >
									<input type="hidden" name="userId" value="<?php echo $row['userId'];?>" >
									<input type="hidden" name="FeedBackID" value="<?php echo $row['id'];?>" >
									<div class="form-group">
									    <label class="col-md-3 control-label"></label>
									    <div class="col-md-8">
										<textarea name="message" class="form-control" style="width: 229px;height:100px;"  > </textarea>
									    </div>
									</div>
								    </div>
								</div>
								<div class="col-md-offset-4 col-md-6  p-t-25">
								    <div class="form-group">
								       <label class="col col-4"></label>
								       <input type="submit" class="btn btn-md btn-success"  name="sendMess" id="submit_but" value="Send" >
								    </div>
								</div>
							    </div>
							    
							</form>
						    </div>
						</div>
						    
					    </div>
					</div>

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
		    tableTools:
		    {
			sSwfPath: "../assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf"
		    },
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

