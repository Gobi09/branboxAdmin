	    <div class="content" id="content">
		<!-- begin page-header -->
		<h1 class="page-header">Edit Admin User<small> Enter the correct details here...</small></h1>
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
				<h4 class="panel-title">Edit Admin User</h4>
			    </div>
			    <div class="panel-body">
				<form class="form-horizontal form12" id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/adminUserEdit/'.$edit[0]['id']);?>">
				    <div class="col-md-8">
					<div class="form-group">
					    <label class="col-md-4 control-label">Name</label>
					    <div class="col-md-6">
						<input type="text" class="form-control" name="name" id="name" value="<?php echo $edit[0]['name'];?>">
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-md-4 control-label">Email</label>
					    <div class="col-md-6">
						<input type="text" class="form-control" name="email" id="email" value="<?php echo $edit[0]['email'];?>">
					    </div>
					</div>
					<div class="form-group">
					    <label class="col-md-4 control-label">Password</label>
					    <div class="col-md-6">
						<input type="password" class="form-control" name="password" id="password" value="<?php echo $edit[0]['password'];?>">
					    </div>    
					</div>
				    </div>
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
    </body>
</html>

