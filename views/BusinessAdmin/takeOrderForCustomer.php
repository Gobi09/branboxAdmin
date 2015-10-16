	    <style>
	    .active{
	    	width: 30% !important;
	    }
	    .handles span {
		cursor: move;
	    }
	    </style>
	    <div class="content" id="content">
		<!-- begin breadcrumb -->
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Take Order<small></small></h1>
		<!-- end page-header -->
		<!-- begin panel -->
			<div class="theme-panel" >
			    <a class="theme-collapse-btn" data-click="theme-panel-expand" href="javascript:;"><i class="fa fa-shopping-cart" id="cartColor" <?php if($cartData) { ?> style="color: red" <?php } ?> ></i></a>
			    <div class="theme-panel-content">
				<h5 class="m-t-0">Cart</h5>
				<div class="row m-t-10">
				    <div class="col-md-12">
					<div class="table-responsive" style="border: none">
					    <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
						    <thead>
							<tr>
							    <th>Item Name</th>
							    <th>Quantity</th>
							    <th>Price</th>
							    <th>Total</th>
							    <th>Action</th>
							</tr>
						    </thead>
						    <tbody id="cartBody">
							<?php $total=0;
							if(count($cartData) > 0) {
							foreach($cartData as $data) { ?>
							<tr>
							    <?php foreach($productName as $name) {
								if($data['itemId'] == $name['id']) { ?>
								<td><?php echo $name['name']?></td>
							    <?php break; } } ?>
							    <td><?php echo $data['quantity']?></td>
							    <td><?php echo $data['actualPrice']?></td>
							    <td><?php echo  $data['totalPrice']; ?></td>
							    <td><button class="btn btn-xs btn-danger" onclick="cartDeleteItem('<?php echo $data['userId']?>','<?php echo $data['orderNo']?>')"><i class="fa fa-trash-o"></i></button></td>
							</tr>
							<?php } }else{ ?>
							    <tr><td colspan='5'>No item found...</td></tr>
							<?php }?>
							<tr>
							    <td colspan='3' align="right">Total : </td>
							    <td><?php foreach($cartData as $data) { $total = $total + $data['totalPrice']; }
							    echo $total; ?></td>
							</tr>
						    </tbody>
					    </table>
					</div>
				    </div>
				</div>
				<div class="row m-t-10">
				    <div class="col-md-6">
					<a class="btn btn-inverse btn-block btn-sm" type="button" name="viewCart" id="viewCart" href="<?php echo site_url('branboxController/viewCart/'.$userId);?>"><i class="fa fa-shopping-cart m-r-3"></i>View Cart</a>
				    </div>
				    <div class="col-md-6">
					<button  class="btn btn-inverse btn-block btn-sm" type="button" name="sideCheckout" id="sideCheckout" onclick="cartRemoveAll('<?php echo $userId;?>');"><i class="fa fa-times"></i> Cancel Oder</button>
				    </div>
				</div>
			    </div>
			</div>
        <!-- end theme-panel -->
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
		    <h4 class="panel-title">Items</h4>
		</div>
		<div class="panel-body" id="form_validation">
		    <div id="alert"></div>
		    <input type="hidden" name="cartId" value="<?php echo random_string('alnum', 4).$userId;?>">
		    <input type="hidden" name="userId" id="userId" value="<?php echo $userId;?>">
		    <table id="dataRespTable" class="table table-striped table-bordered nowrap" width="100%">
			<thead>
			    <tr>
				<th width="20%">Item Name</th>
				<th width="20%">Item Price</th>
				<th width="10%">Quantity</th>
				<th width="25%">Ingredient</th>
				<th width="10%">Action</th>
			    </tr>
			</thead>
			<tbody class="handles list" id="sortable">
			<?php $count=0; foreach($takeOrder as $data) { ?>	
			<tr class="odd trParent">
				<input type="hidden" name="businessId[]" value="<?php echo $data['businessId']; ?>">
				<input type="hidden" name="menuId[]" value="<?php echo $data['menuId']; ?>">
				<input type="hidden" name="subMenuId[]" value="<?php echo $data['subMenuId']; ?>">
				<input type="hidden" name="itemId[]" value="<?php echo $data['id'];?>">
				<input type="hidden" name="actualPrice[]" value="<?php echo $data['price']; ?>">
				<input type="hidden" name="userId[]" value="<?php echo $userId;?>">
				<td width="20%"><?php echo $data['name']; ?></td>
				<td width="20%"><?php echo $data['price']; ?></td>
				<td width="10%"><input type="text" name="quantity[]" class="form-control input-sm numberAllow"></button></td>
				<?php $ingredients = $this->branboxModel->getIngredientsItem($data['id']); ?>
				<td width="25%" class="serialize">
				    <div  id="accordion">
					<a href="#collapse<?php echo $count;?>" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle accordion-toggle-styled btn btn-warning btn-sm" aria-expanded="true">Add Ingredients</a>
				    </div>
				    <div id="collapse<?php echo $count;?>" class="collapse">
					<div class="panel-body">
						<table class="table table-striped table-bordered nowrap">
						<?php
						if(count($ingredients) <= 0){
						    echo 'No Ingredient add...';
						}else{
						    foreach($ingredients as $row) { ?>
						    <tr>
							<input type="hidden" name="addonPrice" value="<?php echo $row['price'];?>">
							<input type="hidden" name="Ingid" value="<?php echo $row['id'];?>">
							<input type="hidden" name="ingredientName" value="<?php echo $row['ingredients'];?>">
							<td><label><?php echo $row['ingredients'];?></label></td>
							<td><input type="text" name="ingredients"> <span><b><?php echo $row['price'];?> AED</b></span> </td>
							<td>
							<?php if($row['category'] == 'addon') { ?>
							<input type="checkbox" onclick="if($(this).attr('checked')){ $(this).next().val('YES') }else{ $(this).next().val('NO') }">
							<input type="hidden" name="addonNY" value="NO">
							<?php }else{ ?>
							<input type="hidden" name="addonNY" value="NO">
							<?php } ?>
							</td>
						    </tr>
						<?php } } ?>
						</table>
					</div>
				    </div>
				</td>
				<td width="10%"><button  class="btn btn-primary btn-sm" type="button"  onclick="addToCart(<?php echo $data['id'] ?>,$(this));" name="mainAddToCart" id="mainAddToCart" ><i class="fa fa-shopping-cart"></i> Add to Cart</button></td>
			</tr>
			<?php $count++; } ?>
			
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/submenu_item_script.js"></script>
<script>
   $(document).ready(function() {
   var table = $("#dataRespTable").DataTable({
   dom: 'TRC<"clear">lfrtip',
   responsive: true,
   
    "order": [[ 0, "asc" ]]
   });
    $('.numberAllow').on('keydown', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()}); 
  });
  
function addToCart(id,$this) {
    var trParent;
    var ingredients;
    var businessId;
    var menuId;
    var subMenuId;
    var itemId;
    var userId;
    var actualPrice;
    var quantity;
    var serialize;
    var serializeData;
    var ingredientsName;
    var ingredientLength;
    var cartId;
    trParent = $this.parents('.trParent');
    serialize = $this.parent().siblings('.serialize');
    businessId = trParent.find('[name="businessId[]"]').val();
    menuId = trParent.find('[name="menuId[]"]').val();
    subMenuId = trParent.find('[name="subMenuId[]"]').val();
    itemId = trParent.find('[name="itemId[]"]').val();
    userId = trParent.find('[name="userId[]"]').val();
    actualPrice = trParent.find('[name="actualPrice[]"]').val();
    quantity = trParent.find('[name="quantity[]"]').val();
    serializeData = serialize.find('input').serializeArray();
    cartId = $('[name="cartId"]').val();
    $.ajax({ 
	type:'POST',
	async:false,
	dataType: 'json',
	url:'<?php echo site_url('branboxController/addToCart'); ?>',
	data: {businessId:businessId,menuId:menuId,subMenuId:subMenuId,itemId:itemId,userId:userId,actualPrice:actualPrice,quantity:quantity,serializeData:serializeData,cartId:cartId},
	success:function(json){
	$('tbody#cartBody').children("tr").remove();	
	    if (json.cart != '0') {
		$('#cartColor').css('color','red');
		var cartTemp = '<tr>';
		var quantity = 0;
		for(var i=0;i<json.cart.length;i++){
		    quantity = quantity + parseFloat(json.cart[i]['totalPrice']);
		    //for(var j=0;j<json.submenu.length;j++){}
		    $.each(json.submenu, function(key, value){
			if (json.cart[i]['itemId'] == value.id) {
			    cartTemp = cartTemp + '<td>'+value.name+'</td><td>'+json.cart[i]['quantity']+'</td><td>'+json.cart[i]['actualPrice']+'</td><td>'+json.cart[i]['totalPrice']+'</td><td><button class="btn btn-xs btn-danger" onclick="cartDeleteItem('+json.cart[i]['userId']+',\''+json.cart[i]['orderNo']+'\')"><i class="fa fa-trash-o"></i></button></td></tr>';
			    return false;
			}
		    })
		}
		cartTemp = cartTemp + '</tr>';
		cartTemp = cartTemp + '<tr><td colspan="3" align="right">Total :</td><td>'+quantity+'</td</tr>';
		$('tbody#cartBody').append(cartTemp);
		
	    }else{
		$('#cartColor').css('color','black');
		$('#cartBody').append('<tr>No item found..</tr>');
	    }
	    
	    
	}
     });
}
function cartDeleteItem(userId,orderNo){
    var userId = userId;
    var orderNo = orderNo;
    $.ajax({ 
	type:'POST',
	async:false,
	dataType: 'json',
	url:'<?php echo site_url('branboxController/deleteFromCart'); ?>',
	data: {userId:userId,orderNo:orderNo},
	success:function(json){
	    $('tbody#cartBody').children("tr").remove();	
	    if (json.cart != '0') {
		$('#cartColor').css('color','red');
		var cartTemp = '<tr>';
		var quantity = 0;
		for(var i=0;i<json.cart.length;i++){
		    quantity = quantity + parseFloat(json.cart[i]['totalPrice']);
		    //for(var j=0;j<json.submenu.length;j++){}
		    $.each(json.submenu, function(key, value){
			if (json.cart[i]['itemId'] == value.id) {
			    cartTemp = cartTemp + '<td>'+value.name+'</td><td>'+json.cart[i]['quantity']+'</td><td>'+json.cart[i]['actualPrice']+'</td><td>'+json.cart[i]['totalPrice']+'</td><td><button class="btn btn-xs btn-danger" onclick="cartDeleteItem('+json.cart[i]['userId']+',\''+json.cart[i]['orderNo']+'\')"><i class="fa fa-trash-o"></i></button></td></tr>';
			    return false;
			}
		    })
		}
		cartTemp = cartTemp + '</tr>';
		cartTemp = cartTemp + '<tr><td colspan="3" align="right">Total :</td><td>'+quantity+'</td</tr>';
		$('tbody#cartBody').append(cartTemp);
		
	    }else{
		$('#cartBody').append('<tr>No item found..</tr>');
	    }
	}
     });
}
function cartRemoveAll(userId){
    var userId = userId;
    $.ajax({ 
	type:'POST',
	async:false,
	dataType: 'json',
	url:'<?php echo site_url('branboxController/cartRemoveAll'); ?>',
	data: {userId:userId},
	success:function(json){
	    $('tbody#cartBody').children("tr").remove();	
	    $('#cartBody').append('<tr><td colspan="5">No item found..</td></tr>');
	}
     });
}
</script>
