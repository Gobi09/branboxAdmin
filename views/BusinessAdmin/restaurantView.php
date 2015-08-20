<!--Author: Pravin Kumar.P
Created on: 20/06/15
-->	<!-- begin #content -->
	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
		    <li><a href="javascript:;">Restaurants</a></li>
		    <li class="active"></li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">View all Restaurants<small> You may view here...</small></h1>
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
		    <h4 class="panel-title">Restaurants Details</h4>
		</div>
		<div class="panel-body" id="form_validation">
		    <p>
		    </p>
		    <div class="table-responsive">
			<table class="table table-bordered" id="dataRespTable" width="100%">
				<thead>
					<tr>
					    <th>BranName</th>
					    <th>Company Name</th>
					    <th>City</th>
					    <th>Country</th>
					    <th>Status</th>
					    <th>Action</th>
					</tr>
				</thead>
				<tbody>
				    <?php foreach($result as $row) { ?>
				    <tr>
					<td><?php echo $row['brandName'] ?></td>
					<td><?php echo $row['companyName'] ?></td>
					<td><?php echo $row['city'] ?></td>
					<td><?php echo $row['country'] ?></td>
					<td><button <?php if($row['status']=="ON") echo 'class="btn btn-success"'; else  echo 'class="btn btn-danger"';  ?> name="status[]" id="status-<?php echo $row['businessId']; ?>" value="<?php echo $row['businessId']; ?>"><?php echo $row['status']; ?></button></td>
					<script>
					$("#status-<?php echo $row['businessId']; ?>").click(function() {
					   
					    var businessId=<?php echo $row['businessId']; ?>;
					    $.ajax({
						type: "POST",
						dataType: "json",
						data:{businessId:businessId},
						url: "<?php echo base_url(); ?>branboxController/ajaxRestaurantStatus",
						success: function(json){
						    if (json.status=="ON")
						    {
							$("#status-<?php echo $row['businessId']; ?>").html(json.status);
							$("#status-<?php echo $row['businessId']; ?>").removeAttr("class");
							$("#status-<?php echo $row['businessId']; ?>").attr("class","btn btn-success");
						    }
						    else
						    {
							$("#status-<?php echo $row['businessId']; ?>").html(json.status);
							$("#status-<?php echo $row['businessId']; ?>").removeAttr("class");
							$("#status-<?php echo $row['businessId']; ?>").attr("class","btn btn-danger");
						    }
						
						},
					    });
					});
					</script>
					<td><a href="<?php echo site_url('branboxController/restuarantDelete/'.$row['businessId'])?>" class="btn btn-xs btn-danger">  <i class="fa fa-trash-o fa-fw">  </i> </a></td>
				    </tr>
				    <?php } ?>
				</tbody>
			</table>
		    </div>
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

</body>
</html>
<script>
	    
	    $(document).ready(function()
	    {
		var table = $("#dataRespTable").DataTable({
		dom: 'TRC<"clear">lfrtip',
		responsive: true,
		stateSave: true,
		tableTools: {
		sSwfPath: "../assets/plugins/DataTables/swf/copy_csv_xls_pdf.swf"
		},
		});
	    });
	    
	</script>
