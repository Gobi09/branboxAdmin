<?php
//foreach($getLatLng as $data)
//{
//    $rec=$data[];
//}
//print_r($rec);
//exit;
?>
<!--Author: gobi.C
Created on: 04/03/15
Modified on: 24/03/15
-->	<!-- begin #content -->

	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
		    <li class="active">Locations</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">View Locations<small> You may view Locations details here...</small></h1>
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
		    <h4 class="panel-title">View Locations</h4>
		</div>
		<div class="panel-body" id="form_validation">
		    <div id="alert">
			
		    </div>
		    <p>
			<a class="btn btn-inverse btn-sm "href="<?php echo site_url('branboxController/locationAdd')?>"><i class="fa fa-plus fa-1x"></i> <span class="f-s-14 f-w-500">Add</span></a>
			<a class="btn btn-success btn-sm pull-right" id="mapShow"><span class="f-s-14 f-w-500">Hide Locations</span></a>
		    </p>
		    <div class="col-md-offset-1 col-md-10" id="mapHide">
			<form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/locationAdd'); ?>" class="form-horizontal form12">
			    <div class="form-group">
				<label class="col-md-1 control-label"></label>
				<div class="col-md-10">
				    <div id="map_canvas" style="height:345px; border-radius:20px;"></div>
				</div>
			    </div>
			</form>
		    </div>
			    
			
		    <table id="dataRespTable" class="table table-striped table-bordered nowrap" width="100%">
			<thead>
			    <tr>
				<th>Branch Name</th>
				<th>Country</th>
				<th>State</th>
				<th>City</th>
				<th>Latitude</th>
				<th>Langitude</th>
				<th>Location Status</th>
				<th>Action</th>
			    </tr>
			</thead>
			<tbody class="handles list" id="sortable">
			    <?php foreach($getlocation as $data) { ?>
			    <tr class="odd new"  id="<?php echo $data['id'] ?>">
				<td><?php echo $data['branchname']; ?></td>
				<td><?php echo $data['country']; ?></td>
				<td><?php echo $data['state'];?></td>
				<td><?php echo $data['city']; ?></td>
				
				<td><?php echo $data['latitude'];?></td>
				<td><?php echo $data['longitude']; ?></td>
				<td><button <?php if($data['status']=="ON") echo 'class="btn btn-success"'; else  echo 'class="btn btn-danger"';  ?> name="status[]" id="status-<?php echo $data['id']; ?>" value="<?php echo $data['id']; ?>"><?php echo $data['status']; ?></button></td>
				<script>
				$("#status-<?php echo $data['id']; ?>").click(function() {
				    var licationId=<?php echo $data['id']; ?>;
				    $.ajax({
					type: "POST",
					dataType: "json",
					data: {licationId:licationId},
					url: "<?php echo base_url(); ?>branboxController/ajaxLocationStatus",
					success: function(json){
					    if (json.status=="ON")
					    {
						$("#status-<?php echo $data['id']; ?>").html(json.status);
						$("#status-<?php echo $data['id']; ?>").removeAttr("class");
						$("#status-<?php echo $data['id']; ?>").attr("class","btn btn-success");
					    }
					    else
					    {
						$("#status-<?php echo $data['id']; ?>").html(json.status);
						$("#status-<?php echo $data['id']; ?>").removeAttr("class");
						$("#status-<?php echo $data['id']; ?>").attr("class","btn btn-danger");
					    }
					
					},
				    });
				});
				</script>
				
				<td>
				    <a class="btn btn-xs btn-inverse" data-href="<?php echo base_url('branboxController/locationDelete/'.$data['id']); ?>"  id="delete_box" ><i class="fa fa-trash-o fa-fw"></i></a>
				</td>
			    </tr>
			    <?php } ?>
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

<script>
    
     $('#form_validation').on('click', '[name="status[]"]', function()
    {
	var $row    = $(this).parents('.odd');
	var menuId=$(this).val();
	var item_code=$row.find("input[name='print1[]']").val();
    })
    $("#mapShow").click(function(){
	
	$("#mapHide").addClass("hide");
	
    })
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
<style>
    
    .handles span {
	    cursor: move;
    }
</style>
<script>
   $(document).ready(function() {
   var table = $("#dataRespTable").DataTable({
   dom: 'TRC<"clear">lfrtip',
   responsive: true,
   stateSave: true
   });
  
  });


  </script>



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
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?signed_in=true&callback=initMap"></script>
</script>
	
<script type="text/javascript">
function initMap() {
     var latlng = new google.maps.LatLng(24.4667, 54.3667);
  var myOptions = {
        zoom: 2,
        center:latlng ,
        mapTypeId: google.maps.MapTypeId.HYBRID  
    }
  var map = new google.maps.Map(document.getElementById('map_canvas'),myOptions);
var marker = new google.maps.Marker({
  draggable: true,
  position: latlng,
  map: map
  });
	 
  setMarkers(map);
}

var beaches =<?php echo json_encode($getLatLng); ?>;

function setMarkers(map) {
  
  for (var i = 0; i < beaches.length; i++) {
    var beach = beaches[i];
    var marker = new google.maps.Marker({
	position: {lat: parseFloat(beach['latitude']), lng: parseFloat(beach['longitude'])},
	map: map,
	title: "Branch :"+beach['branchname'],
    });
    //console.log(marker);
  }
}

    </script>




