
<!--Author: gobi.C
Created on: 04/03/15
Modified on: 24/03/15
-->	<!-- begin #content -->
<style>
    .connected li, .sortable li, .exclude li, .handles li {
	list-style: none;
	border: 1px solid #CCC;
	background: #F6F6F6;
	font-family: "Tahoma";
	color: #1C94C4;
	margin: 5px;
	padding: 5px;
	/*height: 22px;*/
    }
    .handles span {
	    cursor: move;
    }
</style>
	<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
		    <li class="active">Menu</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">View Menu<small> You may view Menu details here...</small></h1>
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
		    <h4 class="panel-title">View Menu</h4>
		</div>
		<div class="panel-body" id="form_validation">
		<table id="dataRespTable" class="table table-striped table-bordered nowrap" width="100%">
		    <thead>
			    <tr>
				<th>reposition</th>
				<th>Menu Name</th>
				<th>Menu Image</th>
				
				
			    </tr>
			</thead>
			<tbody class="handles list" id="sortable">
			       
			    <?php
			     foreach($getMenu as $data) {
			    ?>  <tr id="<?php echo $data['id'] ?>"> 
				<td><span><i class="fa fa-refresh fa-lg"></span></td>
				<td><?php echo $data['name']; ?></td>
				<td>
				    
				   <img class=""  style="height: 75px;width: 105px;" src="<?php echo base_url("upload/menu/".$data['image']);?>" >
				    
				</td>
			    
			    <?php
			    }
			    ?></tr>
			</tbody>
		</table>
			     <a href="<?php echo base_url("branboxController/menuView");?>"><button class="btn btn-md btn-success "type="button"> Submit </button></a>
			
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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery.sortable.js"></script>-->
<!--<script>-->
<!--		$(function() {-->
<!--			$('.handles').sortable({-->
<!--				handle: 'span'-->
<!--			});-->
<!--			-->
<!--		});-->
<!--	</script>-->
<script>
$('#form_validation').on('click', '#delete_box', function(e) {
 e.preventDefault();
         var link = $(this).attr('href');
      bootbox.confirm("Are you sure you want to delete?", function(confirmed) {   
               if (confirmed) {
                     window.location.href = link;     
                }    
            });
 });
</script>

