	    <?php $image_url=base_url().'upload/offer/';?>
	    <div class="content" id="content">
		<!-- begin breadcrumb -->
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">View all Table Booking in our BranBox<small></small></h1>
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
				<h4 class="panel-title">View Table Booking</h4>
			    </div>
			    <div class="panel-body" id="form_validation">
				
				<table class="table table-striped table-bordered nowrap" id="dataRespTable" width="100%">
				    <thead>
					<tr>
					    <th>User Name</th>
					    <th>No of Person</th>
					    <th>Bookin Time</th>
					    <th>Created Time</th>
					    <th>Status</th>
					    <th>Action</th>
					</tr>
				    </thead>
				    <tbody>
					<?php foreach($booktable as $row){?>
					<tr>
					    <td>
						<?php if($row['status']=='ordered') {?>
						<a href="<?php echo base_url("branboxController/orderAcceptance/".$row['endUserId']."/b")?>"><?php echo $row['userName']?></a>
						<?php } else  echo $row['userName']; ?>
					    </td>
					<!--    <td>-->
					<!--	<img style="height: 75px;width: 105px;" src="<?php echo $image_url.$row['image'];?>">-->
					<!--    </td>-->
					    <td>
						<?php if($row['status']=='ordered') {?>
						<a href="<?php echo base_url("branboxController/orderAcceptance/".$row['endUserId']."/b")?>"><?php echo $row['NoOfPerson']?></a>
						<?php } else  echo $row['NoOfPerson']; ?>
					    </td>
					    <td>
						<?php if($row['status']=='ordered') {?>
						<a href="<?php echo base_url("branboxController/orderAcceptance/".$row['endUserId']."/b")?>"><?php echo $row['bookingDate']." ".$row['bookingTime']; ?></a>
						<?php } else  echo $row['bookingDate']." ".$row['bookingTime']; ?>
					    </td>
					    <td>
						<?php if($row['status']=='ordered') {?>
						<a href="<?php echo base_url("branboxController/orderAcceptance/".$row['endUserId']."/b")?>"><?php echo $row['createdTime']?></a>
						<?php } else  echo $row['createdTime']; ?>
					    </td>
					    <td>
						<?php if($row['status']=='ordered') {?>
						<a href="<?php echo base_url("branboxController/orderAcceptance/".$row['endUserId']."/b")?>"><?php echo $row['status']?></a>
						<?php } else  echo $row['status']; ?>
					    </td>
					    <td>
						<a class="btn btn-xs btn-inverse"   href="<?php echo base_url('branboxController/tableRequestDelete/'.$row['id']."/".$row['endUserId']); ?>"  onclick="alert('do you want to delete')"  >  <i class="fa fa-trash-o fa-fw" >  </i> </a></td>
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
	    
	</script>
    </body>
</html>