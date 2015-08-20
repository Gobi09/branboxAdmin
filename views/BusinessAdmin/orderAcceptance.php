<?php
$table=$this->session->userdata('table');

?>
		<div class="panel-body">		    
		    <?php foreach($data1 as $data){}?>
		    
		     <?php //foreach($data2 as $user){}?>
		     <?php foreach($data3 as $business){}
			if($table=='o'){
			   $itemId=$data['itemId'];
			}
			else  if($table=='b'){
			$itemId=0;
			}
		     ?>
		     <form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/orderAcceptance/'.$data['id']."/".$data['endUserId']."/".$itemId."/".$table); ?>" class="form-horizontal">
			<!--<div class="col-md-offset-2 col-md-12">-->
			<input type="hidden" id="row_contains" name="row_contains" value="1" />			    			
			 <!--<center>-->
			      <hr style="color: black;">
			    <center style="text-align: center;">
				<!--<img src="<?php ?>"/>-->
				
				<h2><?php  echo $business['brandName']; ?></h2>
				<!--<h3><?php  echo $business['companyName']; ?></h3>-->
				<h5>
				    <p><?php  echo $business['address1']; ?> ,<?php  echo $business['address2']; ?></p>
				    <p><?php  echo $business['city']; ?>,<?php  echo $business['state']; ?></p>
				    <p><?php  echo $business['country']."-".$business['postalCode']; ?></p>
				</h5>
			    </center >
			    <hr>
			     <?php if($table=='o'){?>
			     <h4 style="text-align: center;">Food Oreder Receipt </h4>
			    <table class="table table-bordered" id="dataRespTable"  style="border: 1px solid black; border-collapse: collapse;" width="100%">
				<caption >
				    <b>Customer Name:</b> <?php  echo $data['userName']; ?> </br>
				    <b>Ordered Time:</b> <?php  echo $data['createdTime']; ?></br>
				    
				</caption>
				<thead>
				    <tr>
					<td>S.No</td>
					<td>Item Name</td>
					<td>Quantity</td>
					<td>Rate</td>
					<td>Price</td>
					
				    </tr>
				 
				</thead>
				
				<tbody>
				    <?php $i=1; foreach($data1 as $data){?>
				    <tr>
					<td><?php  echo $i; ?></td>
					<td><?php  echo $data['name']; ?></td>
					
					<td><?php  echo $data['quantity']; ?></td>
					
					<td><?php  echo $data['price']; ?></td>
					<td><?php  echo $data['totalPrice']; ?></td>
				    </tr>
				    <?php }?>
				</tbody>
				
				<tfoot>
				    <tr>
					<td colspan="4" style="text-align: right;">Total Price</td>
					<td><?php  echo $data['totalPrice']; ?></td>
				    </tr>
				</tfoot>
			    </table>
			    
			    <?php }   if($table=='b'){?>
			    <h4 style="text-align: center;">Table Booking Receipt </h4>
			    <table class="table table-bordered table-responsive" id="dataRespTable"  style="border: 1px solid black; border-collapse: collapse;" width="100%">
				
				<thead>
				    <tr>
					<td>S.No</td>
					<td>Booking Id</td>
					<td>Customer Name</td>
					<td>No of Preson</td>
					<td>Booking Time</td>
					<td>Address</td>
					
				    </tr>
				 
				</thead>
				
				<tbody>
				    <?php $i=1; foreach($data1 as $data){?>
				    <tr>
					<td><?php  echo $i; ?></td>
					<td><?php  echo $data['id']; ?></td>
					<td><?php  echo $data['userName']; ?></td>
					<td><?php  echo $data['NoOfPerson']; ?></td>
					<td><?php  echo $data['bookingDateTime']; ?></td>
					<td>
					    <?php  echo $data['address1']; ?>,<br>
					    <?php  echo $data['address1']; ?>,<br>
					    <?php  echo $data['city']; ?>,<br>
					    <?php  echo $data['state']; ?>,<br>
					    <?php  echo $data['country']."-".$data['postalCode']; ?>.
					</td>
					
				    </tr>
				    <?php }?>
				</tbody>
			    </table>
			     <?php } ?>
			

