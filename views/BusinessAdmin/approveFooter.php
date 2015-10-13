<?php
$table=$this->session->userdata('table');
//print_r($getIngredients);
//exit;

?>
			    <div class="col-md-offset-5 col-md-12 dattt">
				 <div class="form-group">
				    <label class="col col-4"></label>
				    <input type="submit" class="btn btn-sm btn-success"  name="approve" id="submit_but" value="Approve" >
				 </div>
			      </div>
			<!--</div>-->
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


<script type="text/javascript">

$(document).ready(function() {
    FormSliderSwitcher.init();
       $("#dattt").hide();
 
   $('#').click(function(){
    alert();
     });

var number=0;
   $('#submit_but').prop('disabled', true);
   $('.statusData').change(function(){
    
	//$(this).attr("checked", "true");
	var total_count   =$('[name="status[]"]').length;
	//alert(total_count);
	var checked_count=0;
	$('.statusData').each(function(){
	  //alert(total_count);
	   if($(this).attr("checked"))
	   {
	    checked_count++;
	    
	   }
	   else{
	       checked_count--;
	   }
       });
       <?php if($table=='o'){ ?>
	  if (total_count==checked_count) {
		$('#submit_but').removeAttr('disabled');     
	  }
	  else{
	       $('#submit_but').attr('disabled', "true");    
	  }
	  <?php } else if($table=='t')
	  {
	    
	  ?>
	       var fullDate = new Date()
	       var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
	       var currentDate = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
	  
	       var afterdate='<?php $count=count($data1); echo  $data1[$count-1]['timedDate']; ?>';
	       var now = moment(currentDate, 'DD-MMM-YYYY').format('YYYY/MM/DD');
	       var after = moment(afterdate, 'DD-MMM-YYYY').format('YYYY/MM/DD');
		
		 //alert(after);
	       if (now == after)
	       {
		    if (total_count==checked_count) {
		    	$('#submit_but').removeAttr('disabled');    
		    }
		    else{
			 $('#submit_but').attr('disabled', "true");    

		     }
	       }
	       
	<?php } else if($table=='b'){?>
	  
	        if (total_count==checked_count) {
		$('#submit_but').removeAttr('disabled');     
	  }
	  else{
	       $('#submit_but').attr('disabled', "true");    
	  }
	  
	  <?php } ?>
     
     
    });

    });

</script>


</html>

