<!--
functionality By: Ezhilarasan T
Created on: 20/06/15
Modified on: 20/06/15-->

<? error_reporting(E_ERROR | E_WARNING | E_PARSE); ?>
<? $CI =& get_instance();?>
<?php
$status = $this->session->flashdata('status');
?>

<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
	<li><a href="javascript:;">Application</a></li>
	<li><a href="javascript:;">Define</a></li>
	<li><a href="javascript:;">Address</a></li>
	<li class="active">City</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <!--<h1 class="page-header">View <small> You may add Activity Master here...</small></h1>-->
    <h1 class="page-header">Table List<small> You may add here...</small></h1>
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
		    <h4 class="panel-title">Table List</h4>
		</div>
		<div class="panel-body" id="form_validation">
		    <p>
			<a class="btn btn-inverse btn-sm "  <?php //if($activity_insert!='Y') echo "disabled"; ?> href="<?php echo base_url(); ?>branboxController/tableAdd"><i class="fa fa-plus fa-1x"></i> <span class="f-s-14 f-w-500">Add</span></a>
		    </p>
		    <p style="color: #ea0000"><?php if (isset($status)) { echo $status; } ?></p>
		    <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
			<thead>
			    <tr>
				<th>Name</th>
				<th>Feature</th>
				<th>Image</th>
				<th>Price</th>
				<th>Status</th>
				<th>Online</th>
                                <th>Created Time</th>				
				<th>Action</th>		    
			    </tr>
			</thead>
			<tbody>
			    <?php if(count($result) > 0)
			    {
				foreach($result as $viewShowResult)
				{
				    ?>			       
			    <tr class="even gradeC">
				<td><?php echo $viewShowResult['name']?></td>
				<td><?php echo $viewShowResult['feature']?></td>
				<td><img class=""  style="height: 75px;width: 105px;" src="<?php echo base_url("upload/table/".$viewShowResult['image']);?>" ></td>
				<!--<td><?php// echo $viewShowResult['image']?></td>-->
				<!--<td><input <?=$viewShowResult['status'] == "Y" ? 'checked="checked"' : '';?> disabled class="form-control" type="checkbox"   ></td>-->
				<td><?php echo $viewShowResult['price']?></td>
				<td><button <?php if($viewShowResult['status']=="ON") echo 'class="btn btn-success"'; else  echo 'class="btn btn-danger"';  ?> name="status[]" id="status-<?php echo $viewShowResult['id']; ?>" ><?php echo $viewShowResult['status']; ?></button></td>
				<script>
				$("#status-<?php echo $viewShowResult['id']; ?>").click(function() {
				    var tableId=<?php echo $viewShowResult['id']; ?>;
				    $.ajax({
					type: "POST",
					dataType: "json",
					data:{tableId:tableId},
					url: "<?php echo base_url(); ?>branboxController/ajaxTableStatus",
					success: function(json){
					    if (json.status=="ON")
					    {
						$("#status-<?php echo $viewShowResult['id']; ?>").html(json.status);
						$("#status-<?php echo $viewShowResult['id']; ?>").removeAttr("class");
						$("#status-<?php echo $viewShowResult['id']; ?>").attr("class","btn btn-success");
					    }
					    else
					    {
						$("#status-<?php echo $viewShowResult['id']; ?>").html(json.status);
						$("#status-<?php echo $viewShowResult['id']; ?>").removeAttr("class");
						$("#status-<?php echo $viewShowResult['id']; ?>").attr("class","btn btn-danger");
					    }
					
					},
				    });
				});
				</script>
				<td><button <?php if($viewShowResult['online']=="ON") echo 'class="btn btn-success"'; else  echo 'class="btn btn-danger"';  ?> name="online[]" id="online-<?php echo $viewShowResult['id']; ?>" ><?php echo $viewShowResult['online']; ?></button></td>
				<script>
				$("#online-<?php echo $viewShowResult['id']; ?>").click(function() {
				    var tableId=<?php echo $viewShowResult['id']; ?>;
				    $.ajax({
					type: "POST",
					dataType: "json",
					data: {tableId:tableId},
					url: "<?php echo base_url(); ?>branboxController/ajaxTableOnline",
					success: function(json){
					    if (json.online=="ON")
					    {
						$("#online-<?php echo $viewShowResult['id']; ?>").html(json.online);
						$("#online-<?php echo $viewShowResult['id']; ?>").removeAttr("class");
						$("#online-<?php echo $viewShowResult['id']; ?>").attr("class","btn btn-success");
					    }
					    else
					    {
						$("#online-<?php echo $viewShowResult['id']; ?>").html(json.online);
						$("#online-<?php echo $viewShowResult['id']; ?>").removeAttr("class");
						$("#online-<?php echo $viewShowResult['id']; ?>").attr("class","btn btn-danger");
					    }
					
					},
				    });
				});
				</script>
				
				<td><?php echo $viewShowResult['createdTime']?></td>
				<td><a  href="<?php echo base_url('branboxController/tableEdit/'.$viewShowResult['id'])?>" class="btn btn-xs btn-warning" ><i class="fa fa-edit"></i> </a>
				<a href="<?php echo base_url('branboxController/tableDelete/'.$viewShowResult['id'])?>" id="delete_box" class="btn btn-xs btn-inverse" <?php //if($activity_delete!='Y') echo "disabled"; ?> >  <i class="fa  fa-trash-o" >  </i>  </a></td>				
			    </tr>
			    <?php } }?>			  
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
</body>
</html>