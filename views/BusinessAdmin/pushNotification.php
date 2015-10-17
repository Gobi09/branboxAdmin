	    <div class="content" id="content">
		<!-- begin page-header -->
		<h1 class="page-header">Push Notification<small> Send Notification from here...</small></h1>
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
				<h4 class="panel-title">Push Notification</h4>
			    </div>
			    <div class="panel-body">
				<form class="form-horizontal form12" id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/sendNotification');?>">
				    <div class="col-md-offset-1 col-md-8">
					    <div class="col-md-6">
						<h5 style="color: green"><b><?php if($send) {
						    $json = json_decode($send, true);
						    echo 'Notification Sent Succes :' .$json['success'];
						    ?>
						    </b></h5>
						    <h5 style="color: red"><b>
						    <?php
						    echo 'Notification Sent failure :' .$json['failure'];
						} ?> </b></h5>
					    </div>
					</div>
				    <div class="col-md-offset-2 col-md-8">
					<div class="form-group">
					    <div class="col-md-6">
						<label class="control-label">Description</label>
						<textarea rows="4" class="form-control" placeholder="Description.." name="messages"></textarea>
					    </div>
					    <div class="col-md-6">
						<label class="control-label"></label>
						<div class="checkbox">
						    <label>
							<input type="hidden" value="Y" name="sendAll" id="sendAll">
							<input type="checkbox" id="checkStatus" onchange="if($(this).prop('checked')){$(this).prev().val('Y');}else{$(this).prev().val('N');}" checked="checked">Send to all
						    </label>
						</div>
					    </div>
					</div>
					<div id="testselect"></div>
				    </div>
				    <div class="col-md-12 col-md-offset-3 p-t-10">
					<fieldset>
					    <input type="submit" class="btn btn-sm btn-success" name="send" value="send">
					    <button type="button" class="btn btn-sm btn-info" onclick="form_reset();">Reset</button>
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
	$(".chzn-select").chosen();
	$('#checkStatus').on('click', function(){
	    var value = $('#sendAll').val();
	    if (value == 'Y') {
		$('#testselect').append('<div class="form-group"><div class="col-md-6"><label class="control-label">Select User</label><select multiple class="form-control input-sm chosen-select chzn-select" tabindex="18" id="selectUser" name="selectUser[]"><?php foreach($user as $row) { ?><option value="<?php echo $row['appId'];?>"><?php echo $row['userName']."-->".$row['email']?></option><?php } ?></select></div></div>');
		$(".chzn-select").chosen();
	    }else{
		$('#testselect').empty();
		$(".chzn-select").chosen();
	    }
	    
	})

    </script>
    </body>
</html>

