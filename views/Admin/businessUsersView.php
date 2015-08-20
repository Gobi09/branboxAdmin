	    <?php $image_url=base_url().'upload/offer/';?>
	    <div class="content" id="content">
		<!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
		    <li class="active">Business Details</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">View all Brand Details in our BranBox<small></small></h1>
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
				<h4 class="panel-title">View Brand Details</h4>
			    </div>
			    <div class="panel-body" id="form_validation">
				<p>
				    <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>branboxController/offerAdd"><i class="fa fa-plus fa-1x"></i><span class="f-s-14 f-w-500"> Add</span></a>
				</p>
				<table class="table table-striped table-bordered nowrap" id="dataRespTable" width="100%">
				    <thead>
					<tr>
					    <th>Brand Name</th>
					    <th>Company Name</th>
					    <th>Addrtess</th>
					    <th>Phone Number</th>
					    <th>Email</th>
                                            <th>Website</th>
					    <th>App Version</th>
					    <th>Status</th>
					    <th>Action</th>
					</tr>
				    </thead>
				    <tbody>
					<?php foreach($booktable as $row){?>
					<tr>
					    <td>
						<?php echo $row['name']?>
					    </td>
					    <td>
						<img src="<?php echo $image_url.$row['image'];?>">
					    </td>
					    <td>
						<?php echo $row['price']?>
					    </td>
					    <td>
						<?php echo $row['createdTime']?>
					    </td>
					    <td>
						<?php echo $row['status']?>
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