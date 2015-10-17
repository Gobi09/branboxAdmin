<style>
.fixed { 
    width: 100%;
    table-layout: fixed;
}
    
</style>
	    <div class="content" id="content">
		<!-- begin breadcrumb -->
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">View all Ordered Items here...<small></small></h1>
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
				<h4 class="panel-title">View Order Item</h4>
			    </div>
			    <form method="POST" action="<?php echo site_url('branboxController/viewCart/'.$userId)?>" enctype="multipart/form-data">
				<div class="panel-body" id="form_validation">
				    <table class="table table-striped table-bordered nowrap" id="dataRespTable" width="100%">
					<thead>
					    <tr><?php 	
					    
					    ?>
						<th>Item Name</th>
						<th  width="10%">Quantity</th>
						<th>Price</th>
						<th>Addon</th>
						<th>Total</th>
						<th width="10%">Action</th>
					    </tr>
					</thead>
					<tbody id="cartBody">
					    <?php $total=0;
					    if(count($cartData) > 0) {
					    foreach($cartData as $data) {
						$total = $total + $data['totalPrice']; ?>
					    <tr>
						<input type="hidden" name="orderNo[]" value="<?php echo $data['orderNo']?>">
						<?php foreach($productName as $name) {
						    if($data['itemId'] == $name['id']) { ?>
						    <td><?php echo $name['name']?></td>
						<?php break; } } ?>
						<td><input type="text" name="quantity[]" class="form-control input-sm" value="<?php echo $data['quantity']?>"></td>
						<td><?php echo $data['actualPrice']?></td>
						<td><?php echo $data['addon']?></td>
						<td><?php echo  $data['totalPrice']?></td>
						<td><a class="btn btn-xs btn-danger" href="<?php echo site_url('branboxController/cartDeletViewItem/'.$data['userId'].'/'.$data['orderNo'])?>"><i class="fa fa-trash-o"></i></a></td>
					    </tr>
					    <?php } }else{ ?>
						<tr><td colspan='5'>No item found...</td></tr>
					    <?php }?>
					    <tr>
						<td colspan='4' align="right">Total : </td>
						<td><?php echo $total;?></td>
						<td></td>
					    </tr>
					</tbody>
				    </table>
				    <table class="table table-striped">
					<th width="15%">Ingredients Name</th>
					<th width="15%">Ingredients Note</th>
					<th width="20%">Addon</th>
					<?php foreach($tempCartData as $tempData) {
					    if($tempData['ingId'] != NULL) { ?>
					<input type="hidden" name="inQty[]" value="<?php echo $tempData['quantity'];?>" readonly>
					<input type="hidden" name="id[]" value="<?php echo $tempData['id'];?>" readonly>
					<input type="hidden" name="ingId[]" value="<?php echo $tempData['ingId'];?>" readonly>
					<tr>
					    <?php $result = $this->branboxModel->getItemName($tempData['ingId']); ?>
					    <td><input type="hidden" name="ingredientName[]" value="<?php echo $result[0]['ingredients'];?>" readonly><?php echo $result[0]['ingredients'];?></td>
					    <td><input type="text" name="ingredientNote[]" class="form-control input-sm" value="<?php echo $tempData['ingNotes'];?>"></td>
					    <td><?php if($result[0]['price'] > 0) { ?>
						<input type="checkbox" <?php echo ($tempData['addonPrice'] == $result[0]['price']) ? 'checked' : '' ?> onclick="if($(this).attr('checked')){ $(this).next().val('<?php echo $result[0]['price'];?>') }else{ $(this).next().val('0') }">
						<input type="hidden" name="addonPrice[]" value="<?php echo $tempData['addonPrice'];?>">
						<?php }else{ ?>
						<input type="hidden" name="addonPrice[]" value="<?php echo '0.00';?>">
						<?php } ?>
					    </td>
					    <td colspan="2"></td>
					    <td></td>
					</tr>
					<?php } }?>
				    </table>
				    <div class="row">
					<div class="col-md-12">
					    <div class="col-md-2">
						<button class="btn btn-sm btn-info" type="submit" name="save" value="update"><i class="fa fa-check m-r-3"></i>Update Ingreadient</button>
					    </div>
					</div>
				    </div>
				    <div class="row">
					<div class="col-md-12">
					    <div class="col-md-offset-4">
						<button type="submit" name="save" value="orderSave" class="btn btn-sm btn-inverse"><i class="fa fa-check m-r-3"></i>Order Approve</button> <a class="btn btn-sm btn-inverse" href="<?php echo site_url('branboxController/cartOderCancel/'.$userId);?>"><i class="fa fa-times"></i> Cancel Oder</a>
					    </div>
					</div>
				    </div>
				</div>
			    </form>
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
	
	<!-- end page container -->
