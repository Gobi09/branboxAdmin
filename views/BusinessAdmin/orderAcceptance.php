<?php
$table=$this->session->userdata('table');
//print_r($getIngredients);
//exit;

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
		     <form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/orderApproved/'.$data['id']."/".$data['endUserId']."/".$itemId."/".$table); ?>" class="form-horizontal">
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
			     <h4 style="text-align: center;">Food Order Receipt </h4>
			    <table class="table table-bordered" id="dataRespTable"  style="border: 1px solid black; border-collapse: collapse;" width="100%">
				<caption>
				   <span style="float:left;">
					<h5>Customer Details</h5>
					<b>Name: &nbsp;&nbsp;</b> <?php  echo $data['userName']; ?> </br>
					<b>Mobile Number: &nbsp;&nbsp;</b>
					 <?php  echo $data['phoneNumber']; ?></br>
				   </span>
				   <span style="float: right;">
					<h5>Customer Address Details</h5>
					<b>Address: &nbsp;&nbsp;</b>
					    <p>
						<?php  echo $data['address1']; ?>,
						<?php  echo $data['address2']; ?> </br>
						<?php  echo $data['city']; ?>,
						<?php  echo $data['state']; ?></br>
						<?php  echo $data['country']; ?>,
						<?php  echo $data['postalCode']; ?>
					    </p>
					
					
					
				    </span>
				</caption>
				<thead>
				    <tr>
					<td>S.No</td>
					<td>Item Name</td>
					<td>Quantity</td>
					<td>Rate</td>
					<td>Price</td>
					<td>Status</td>
					
				    </tr>
				 
				</thead>
				
				<tbody>
				<?php $i=1;
				    foreach($data1 as $data)
				    {
					$total=$total+$data['totalPrice'];
				?>
					<input type="hidden" id="dateTime" name="dateTime[]" class="form-control" value="<?php  echo $data['createdTime']; ?>" />	
					<tr odd="odd">
					    <td><?php  echo $i; ?></td>
					    <td><?php  echo $data['name']; ?></td>
					    
					    <td><?php  echo $data['quantity']; ?></td>
					    
					    <td><?php $price=$this->branboxModel->getoffers($data['itemId']); if($price!=""){echo $price;} else { echo $data['price'];} ?></td>
					    <td><?php  echo $data['totalPrice']; ?></td>
					    <td><input type="checkbox" data-render="switchery" data-theme="green"  value="OFF" name="status[]" class="statusData" id="statusData"/></td>
					</tr>
					<tr>
					    <?php
						foreach( $getIngredients as $ingredient )
						{
						    if( $ingredient['itemId']==$data['itemId'] && $ingredient['subMenuId']==$data['subMenuId'] && $ingredient['createdTime']==$data['createdTime'] && $data['itemStorageId']==$ingredient['itemStorageId'] )
						    {
					    ?>
							<td colspan="6">
							    <div class="col-md-6">
								<table class="table table-bordered" id="dataRespTable"  style="border: 1px solid black; border-collapse: collapse;" width="50%">
								    <thead>
									<tr>
									    <th>ingrediens</th>
									    <th>Yes/No</th>
									    <th>Notes</th>
									</tr>
								    </thead>
								    <tbody>
								    <?php
								    
									foreach( $getIngredients as $ingredient )
									{
									    if( $ingredient['itemId']==$data['itemId'] && $ingredient['subMenuId']==$data['subMenuId'] && $ingredient['createdTime']==$data['createdTime'] && $data['itemStorageId']==$ingredient['itemStorageId'] )
									    {
									    
										?>
										
										<tr>
										    <td><?php  echo $ingredient['ingredients']; ?></td>
										    <td><?php  echo $ingredient['ingYN']; ?></td>
										    <td><?php  echo $ingredient['ingNotes']; ?></td>
										</tr>
										<?php
						    
									    }
									}
								    ?>
								    </tbody>
								</table>
							    </div>
							</td>
					    <?php
							 break;
						    }
						    
						}
					       
					    ?>
					</tr>
				<?php
					$i++;
				    }
				?>
				
				</tbody>
				
				<tfoot>
				    <tr style="font-size: 15px; color: #e0694a;">
					<td colspan="4" style="text-align: right;" >Total Price</td>
					<td colspan="2"><?php  echo $total; ?></td>
				    </tr>
				</tfoot>
			    </table>
			    <?php }   if($table=='t'){?>
			    
			    <h4 style="text-align: center;">Timed Delivery Orders Receipt</h4>
			    <div>
				
			    </div>
			    <table class="table table-bordered" id="dataRespTable"  style="border: 1px solid black; border-collapse: collapse;" width="100%">
				<caption>
				    <span style="float:left;">
					<h5>Customer Details</h5>
					<b>Name: &nbsp;&nbsp;</b> <?php  echo $data['userName']; ?> </br>
					<b>Mobile Number: &nbsp;&nbsp;</b>
					 <?php  echo $data['phoneNumber']; ?></br>
					 
					<h5>Delivery Timings Details</h5>
					<b>Date: &nbsp;&nbsp; </b> <?php $count=count($data1); echo $data1[$count-1]['timedDate']; ?> </br>
					<b>Time: &nbsp;&nbsp;</b> <?php  echo $data1[$count-1]['timtedTime']; ?></br>
				   </span>
				   <span style="float: right;">
					<h5>Customer Address Details</h5>
					<b>Address: &nbsp;&nbsp;</b>
					    <p>
						<?php  echo $data['address1']; ?>,
						<?php  echo $data['address2']; ?> </br>
						<?php  echo $data['city']; ?>,
						<?php  echo $data['state']; ?></br>
						<?php  echo $data['country']; ?>,
						<?php  echo $data['postalCode']; ?>
					    </p>
				    </span>
				</caption>
				<thead>
				    <tr>
					<td>S.No</td>
					<td>Item Name</td>
					<td>Quantity</td>
					<td>Rate</td>
					<td>Price</td>
					<td>Status</td>
					
				    </tr>
				 
				</thead>
				
				<tbody>
				<?php $i=1;
				    foreach($data1 as $data)
				    {
					$total=$total+$data['totalPrice'];
				?>
					<input type="hidden" id="dateTime" name="dateTime[]" class="form-control" value="<?php  echo $data['createdTime']; ?>" />	
					<tr odd="odd">
					    <td><?php  echo $i; ?></td>
					    <td><?php  echo $data['name']; ?></td>
					    
					    <td><?php  echo $data['quantity']; ?></td>
					    
					    <td><?php  echo $data['price']; ?></td>
					    <td><?php  echo $data['totalPrice']; ?></td>
					    <td><input type="checkbox" data-render="switchery" data-theme="green"  value="OFF" name="status[]" class="statusData" id="statusData"/></td>
					</tr>
					<tr>
					    <?php
						foreach( $getIngredients as $ingredient )
						{
						    if( $ingredient['itemId']==$data['itemId'] && $ingredient['subMenuId']==$data['subMenuId'] && $ingredient['createdTime']==$data['createdTime'] && $data['itemStorageId']==$ingredient['itemStorageId'] )
						    {
					    ?>
							<td colspan="6">
							    <div class="col-md-6">
								<table class="table table-bordered" id="dataRespTable"  style="border: 1px solid black; border-collapse: collapse;" width="50%">
								    <thead>
									<tr>
									    <th>ingrediens</th>
									    <th>Yes/No</th>
									    <th>Notes</th>
									</tr>
								    </thead>
								    <tbody>
								    <?php
								    
									foreach( $getIngredients as $ingredient )
									{
									    if( $ingredient['itemId']==$data['itemId'] && $ingredient['subMenuId']==$data['subMenuId'] && $ingredient['createdTime']==$data['createdTime'] && $data['itemStorageId']==$ingredient['itemStorageId'] )
									    {
								    ?>    
										<tr>
										    <td><?php  echo $ingredient['ingredients']; ?></td>
										    <td><?php  echo $ingredient['ingYN']; ?></td>
										    <td><?php  echo $ingredient['ingNotes']; ?></td>
										</tr>
								    <?php
						    
									    }
									}
								    ?>
								    </tbody>
								</table>
							    </div>
							</td>
					    <?php
							 break;
						    }
						    
						}
					       
					    ?>
					</tr>
				<?php
					$i++;
				    }
				?>
				</tbody>
				
				
				<tfoot>
				   <tr style="font-size: 15px; color: #e0694a; font-weight: 400;">
					<td colspan="4" style="text-align: right;" >Total Price</td>
					<td colspan="2"><?php  echo $total; ?></td>
				    </tr>
				</tfoot>
			    </table>
			    
			    
			    <?php }   if($table=='b'){?>
			    
			    
			    
			    
			    
			    
			    
			    
			    
			   <h4 style="text-align: center;">Table Booking Receipt </h4>
			    <table class="table table-bordered table-responsive" id="dataRespTable"  style="border: 1px solid black; border-collapse: collapse;" width="100%">
				<caption>
				   <span style="float:left;">
					<h5>Customer Details</h5>
					<b>Name: &nbsp;&nbsp;</b> <?php  echo $data['userName']; ?> </br>
					<b>Mobile Number: &nbsp;&nbsp;</b>
					 <?php  echo $data['phoneNumber']; ?></br>
				   </span>
				   <span style="float: right;">
					<h5>Customer Address Details</h5>
					<b>Address: &nbsp;&nbsp;</b>
					    <p>
						<?php  echo $data['address1']; ?>,
						<?php  echo $data['address2']; ?> </br>
						<?php  echo $data['city']; ?>,
						<?php  echo $data['state']; ?></br>
						<?php  echo $data['country']; ?>,
						<?php  echo $data['postalCode']; ?>
					    </p>
					
					
					
				    </span>
				</caption>
				<thead>
				    <tr>
					<td>S.No</td>
					<td>Booking Id</td>
					<td>Customer Name</td>
					<td>No of Preson</td>
					<td>Booking Time</td>
					<td>Status</td>
					
				    </tr>
				 
				</thead>
				
				<tbody>
				    <?php $i=1; foreach($data1 as $data){?>
				    <tr>
					<td><?php  echo $i; ?></td>
					<td><?php  echo $data['id']; ?></td>
					<td><?php  echo $data['userName']; ?></td>
					<td><?php  echo $data['NoOfPerson']; ?></td>
					<td><?php  echo $data['bookingDate']." ".$data['bookingTime']; ?></td>
					<td><input type="checkbox" data-render="switchery" data-theme="green"  value="OFF" name="status[]" class="statusData" id="statusData"/></td>
					
				    </tr>
				    <?php }?>
				</tbody>
			    </table>
			     <?php } ?>
			

  