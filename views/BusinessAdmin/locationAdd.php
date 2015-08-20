
<!--Author: gobi.C
Created on: 04/03/15
Modified on: 24/03/15
-->

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">

	<li><a href="javascript:;">Locations</a></li>
	<li class="active">Add Location</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Location <small> Enter the correct details here...</small></h1>
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
		    <h4 class="panel-title">Add Location</h4>
		    
		</div>
		<div class="panel-body">
		    <div class="col-md-offset-1 col-md-10">
			<form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/locationAdd'); ?>" class="form-horizontal form12">
			    <div class="form-group">
				<label class="col-md-1 control-label"></label>
				<div class="col-md-10">
				    <div id="map_canvas" style="height:345px; border-radius:20px;"></div>
				    
				</div>
			    </div>
			    
			    <div class="col-md-offset-3 col-md-7">
				<div class="form-group">
				    <label class="col-md-3 control-label">Branch Name</label>
				    <div class="col-md-5">
					<input type="text" id="branch" name="branch" class="form-control" placeholder="Branch Name" />
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-md-3 control-label">Address</label>
				    <div class="col-md-5 ">
					<input type="text" id="location" name="location" onchange="codeAddress();" class="form-control" placeholder="Enter Address" />
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-md-3 control-label">Latitude</label>
				    <div class="col-md-5">
					<input type="text" id="latbox" name="lat" class="form-control" placeholder="Latitude" readonly />
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-md-3 control-label">Longitude</label>
				    <div class="col-md-5">
					<input type="text" id="lngbox" name="lng" class="form-control" placeholder="Langitude" readonly />
				    </div>
				</div>
				
				<div class="form-group">
				    <label class="col-md-3 control-label">Location Status</label>
				    <div class="col-md-9">
					<label class="col-md-1 control-label">OFF</label>
					<div class="col-md-2"><input type="checkbox"  data-render="switchery" data-theme="green" value="ON" name="status" id="status"  checked /></div>
					<label class="col-md-1 control-label">ON</label>
				    </div>
				</div>
				<div class="col-md-offset-2 col-md-6">
				     <div class="form-group">
					<label class="col col-4"></label>
					<button class="btn btn-md btn-danger " onclick="window.history.back();" type="button">Cancel</button>
					<input type="button" class="btn btn-md btn-success" onclick="form_reset();" name="clear" id="clear" value="Reset" >
					<input type="submit" class="btn btn-md btn-success" name="proceed" id="submit_but" value="Save" >
				     </div>
				  </div>
			    </div>
			</form>
		    </div>
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

<script type="text/javascript">
$(document).ready(function() {
    FormSliderSwitcher.init();
  
  //$("#status").bootstrapSwitch();
  //  alert();
    $('#form_validation').bootstrapValidator({
    
        message: 'This value is not valid',
	container: 'tooltip',
        feedbackIcons: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh fa-spin'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    },
                }
            },
	    image: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    },
                }
            },
	    position: {
                validators: {
                    notEmpty: {
                       message: 'It is required and can\'t be empty'
                    }
		}
            },
	    status: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
                }
            },
	    online: {
                validators: {
                    notEmpty: {
                        message: 'It is required and can\'t be empty'
                    }
                }
            },
	}
    });
});

function form_reset() {
    $('#form_validation').trigger("reset");
	$('#form_validation').bootstrapValidator();
	$('#form_validation').data('bootstrapValidator').resetForm();

 $('#cn_code').removeAttr('disabled');
  $('#proceed').removeAttr('disabled');
 
}


</script>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&v=3&types=geocode"></script> 
<script type="text/javascript">
var geocoder;
var map;
function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(24.4667, 54.3667);
    var myOptions = {
        zoom: 10,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.HYBRID  
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
         var marker = new google.maps.Marker({
  draggable: true,
  position: latlng,
  map: map,
  title: "Your location"
  });
         
          google.maps.event.addListener(marker, 'dragend', function() {
            document.getElementById("latbox").value = this.getPosition().lat();
            document.getElementById("lngbox").value = this.getPosition().lng();
        });
var input = (document.getElementById('location'));
var autocomplete = new google.maps.places.Autocomplete(input);
}

function codeAddress() {
    var location = document.getElementById("location").value;
    geocoder.geocode( { 'address': location}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
             var latitude = results[0].geometry.location.lat();
             var longitude = results[0].geometry.location.lng();
            document.getElementById('latbox').value=latitude;
            document.getElementById('lngbox').value=longitude;
            
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                draggable: true,
            });

        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });

}
google.maps.event.addDomListener(window, 'load', initialize);
</script>


   
	
	
</body>

</html>

