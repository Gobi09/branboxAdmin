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
			    <div class="panel-body" id="form_validation">
				<table class="table table-striped table-bordered nowrap" id="dataRespTable" width="100%">
				    <thead>
					<tr>
					    <th>Item Name</th>
					    <th>Quantity</th>
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
                                            <?php foreach($productName as $name) {
                                                if($data['itemId'] == $name['id']) { ?>
                                                <td><?php echo $name['name']?></td>
                                            <?php break; } } ?>
                                            <td><?php echo $data['quantity']?></td>
                                            <td><?php echo $data['actualPrice']?></td>
                                            <td><?php echo $data['addonPrice']?></td>
                                            <td><?php echo  $data['totalPrice']?></td>
                                            <td><button class="btn btn-xs btn-danger" onclick="cartDeleteItem('<?php echo $data['userId']?>','<?php echo $data['orderNo']?>')"><i class="fa fa-trash-o"></i></button></td>
                                        </tr>
                                        <?php } }else{ ?>
                                            <tr><td colspan='5'>No item found...</td></tr>
                                        <?php }?>
                                        <tr>
                                            <td colspan='4' align="right">Total : </td>
                                            <td><?php echo $total;?></td>
					    <td><a class="btn btn-xs btn-inverse fixed"><i class="fa fa-check m-r-3"></i>Order Approve</a><a class="btn btn-xs btn-inverse fixed" href="<?php echo site_url('branboxController/cartOderCancel/'.$userId);?>"><i class="fa fa-times"></i> Cancel Oder</a></td>
                                        </tr>
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
	
	<!-- end page container -->
<script>
function cartDeleteItem(userId,orderNo){
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
			    cartTemp = cartTemp + '<td>'+value.name+'</td><td>'+json.cart[i]['quantity']+'</td><td>'+json.cart[i]['actualPrice']+'</td><td>'+json.cart[i]['addonPrice']+'</td><td>'+json.cart[i]['totalPrice']+'</td><td><button class="btn btn-xs btn-danger" onclick="cartDeleteItem('+json.cart[i]['userId']+',\''+json.cart[i]['orderNo']+'\')"><i class="fa fa-trash-o"></i></button></td></tr>';
			    return false;
			}
		    })
		}
		cartTemp = cartTemp + '</tr>';
		cartTemp = cartTemp + '<tr><td colspan="4" align="right">Total :</td><td>'+quantity+'</td</tr>';
		$('tbody#cartBody').append(cartTemp);
		
	    }else{
		$('#cartBody').append('<tr>No item found..</tr>');
	    }
	}
     });
}
</script>