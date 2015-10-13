	    <div class="content" id="content">
		<!-- begin breadcrumb -->
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">View all Offers in our BranBox<small> You may Add Offers here...</small></h1>
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
				<h4 class="panel-title">View Offers</h4>
			    </div>
			    <div class="panel-body" id="form_validation">
				<p>
				    <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>branboxController/offerAdd"><i class="fa fa-plus fa-1x"></i><span class="f-s-14 f-w-500"> Add</span></a>
				</p>
				<table class="table table-striped table-bordered nowrap" id="dataRespTable" width="100%">
				    <thead>
					<tr>
					    <th>Title</th>
					    <th>item Nme</th>
					    <th>image</th>
					    <th>Price</th>
					    <th>Valid From Date</th>
					    <th>Valid Upto Date</th>
					    <th>Description</th>
					    <th>Status</th>
					    <th>Action</th>
					</tr>
				    </thead>
				    <tbody>
					<?php foreach($view as $row){?>
					<tr>
					    <td>
						<?php echo $row['title']?>
					    </td>
					    <td>
						<?php  foreach($getSubMenuItem as $data) { if($row['itemId']==$data['id']) echo $data['name']; } ?>
					    </td>
					    <td>
						<img class=""  style="height: 75px;width: 105px;" src="<?php echo $row['image']; ?>" >
					    </td>
					    <td>
						<?php echo $row['price']?>
					    </td>
					    <td>
						<?php echo $row['validFromdate']?>
					    </td>
					    <td>
						<?php echo $row['validUptodate']?>
					    </td>
					    
					    <td>
						<?php echo $row['description']?>
					    </td>
					    <td><button <?php if($row['status']=="ON") echo 'class="btn btn-success"'; else  echo 'class="btn btn-danger"';  ?> name="status[]" id="status-<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></button></td>
						<script>
						$("#status-<?php echo $row['id']; ?>").click(function() {
						    var offerId=<?php echo $row['id']; ?>;
						    $.ajax({
							type: "POST",
							dataType: "json",
							data: {offerId:offerId},
							url: "<?php echo base_url(); ?>branboxController/ajaxOfferStatus",
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
					    <td>
						<a class="btn btn-xs btn-primary" href="<?php echo base_url('branboxController/offerEdit/'.$row['id']);?>"><i class="fa fa-edit"></i></a>
						<a class="btn btn-xs btn-danger" data-toggle="modal" id="delete_box" href="<?php echo base_url('branboxController/offerDelete/'.$row['id']);?>"><i class="fa fa-trash-o"></i></a>
					    </td>
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
		    tableTools:
		    {
			sSwfPath: "../assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf"
		    },
		});
		table.columns( [] ).visible( false, false );
		table.columns.adjust().draw( false );
	    });
	    
	    $('#form_validation').on('click', '#delete_box', function(e)
	    {
		e.preventDefault();
		var link = $(this).attr('href');
		bootbox.confirm("Are you sure you want to delete?", function(confirmed)
		{   
		    if (confirmed)
		    {
			window.location.href = link;     
		    }    
		});
	    });
	    
	</script>
    </body>
</html>