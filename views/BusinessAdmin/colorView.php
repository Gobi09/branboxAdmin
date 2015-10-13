 <!--
    functionality By: Ezhilarasan T
    Created on: 20/06/15
    Modified on: 20/06/15-->
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
	
	<li><a href="javascript:;">Settings</a></li>
	<li class="active">Settings</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Settings  <small> Edit the all items here</small></h1>
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
		    <h4 class="panel-title">Settings</h4>
		</div>
		<div class="panel-body">		    
		    <?php foreach($result as $color){}?>
		    <form id="form_validation" method="POST" enctype="multipart/form-data" action="<?php echo base_url('branboxController/colorAdd/'); ?>" class="form-horizontal">
			<!--<div class="col-md-offset-1 col-md-10">-->
			<input type="hidden" id="row_contains" name="row_contains" value="1" />			    			
			 <div class="form-group">
				<label class="col-md-3 control-label">Logo Image</label>
				<div class="col-md-2">
				    <img class="media-object superbox-img previewimage" id="show_image11" name="show_image" src="<?php if(isset($color['favIcon']))echo $color['favIcon'];else echo base_url("assets/img/user-15.jpg"); ?>">
				</div>
			     </div>
			     
			
			<div class="form-group">
			    <label class="col-md-3 control-label"></label>
			    <div class="form-group">
				<div class="col-md-5">
				    <input id="filestyle-11" class="filestyle" type="file" name='image' onchange="PreviewImage();" data-buttonbefore="true" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
				    <div class="bootstrap-filestyle input-group">
					<span class="group-span-filestyle input-group-btn" tabindex="0">
					    <label id="new" class="btn btn-default" for="filestyle-11">
						<span class="glyphicon glyphicon-folder-open"></span>
						Choose Logo
					    </label>
					</span>
					<input class="form-control" name="oldImage" id="filestyle-21" value="<?php if(isset($color['favIcon'])) echo $color['favIcon']; else echo "";?>" name="" type="text" readonly>
				    </div>					
				</div>
			    </div>				    
			</div>
			<div class="form-group">
			    <label class="col-md-3 control-label">Side Menu header Image</label>
			    <div class="form-group">
				<div class="col-md-5">
				    <img class="media-object superbox-img previewimage" id="show_image111" name="show_image" src="<?php  if(isset($color['bannerImage']))echo $color['bannerImage']; else echo base_url("assets/img/user-15.jpg");?>">
				    <input id="filestyle-111" class="filestyle" type="file" name='image1' onchange="PreviewImage1();" data-buttonbefore="true" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);" tabindex="-1">
				    <div class="bootstrap-filestyle input-group">
					<span class="group-span-filestyle input-group-btn" tabindex="0">
					    <label id="new" class="btn btn-default" for="filestyle-111">
						<span class="glyphicon glyphicon-folder-open"></span>
						Choose file
					    </label>
					</span>
					<input class="form-control" name="oldImage1" id="filestyle-211"  value="<?php if(isset($color['bannerImage'])) echo $color['bannerImage']; else echo "";?>" type="text" readonly>
				    </div>					
				</div>
			    </div>				    
			</div>
			    <div class="form-group">
				<label class="col-md-3 control-label">Currency Format</label>
				<div class="col-md-4">
				    <input type="text" name="currencyFormat" id="currencyFormat" value="<?php if(isset($color['currencyFormat'])) echo $color['currencyFormat']; else echo "AED"; ?>" class="form-control" placeholder="Currency Format" />
				</div>    
			    </div>
			   
			    <div class="form-group">
				<label for="input-text" class="col-md-3 control-label">Header Color</label>				
				<div id="windowBackgroundColorDiv" class=""   data-color="#400000">				
				    <div class="col-md-4 ">
					<input class="form-control color" id="windowBackgroundColor" value="<?php if(isset($color['color'])) echo $color['color']; else echo "#c84e4e"; ?>" name="color" type="text" value="" placeholder="Color">
				    </div>				  
				</div>
			    </div>
			   
			    
			    <div class="col-md-offset-3 col-md-6">
				<div class="form-group">
				   <label class="col col-4"></label>
				   <button class="btn btn-md btn-danger " onclick="window.history.back();" type="button"> Cancel </button>
				   <button class="btn btn-md btn-info " onclick=" form_reset();" id="clear_data" type="button"> Reset </button>
				   <input type="submit" class="btn btn-md btn-success"  name="update" id="submit_but" value="<?php if(isset($color)) echo "Update"; else echo "Save";?>" >
				</div>
			    </div>                          
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

<script>

  var settings=null;
  function fetchAndUpdateSettings(){
  	$('.loader_save_update').show();
   retreiveObjects({
    objectClass:"settings",
    query:{response_json_depth:1,page:1,per_page:50},
    listener:function(data){
      setUpSettings({
        items:data,
      })
    }
  })
 };



 function saveSettings(){
 	$('.loader_save_update').show();
  if(settings!=null){
    //We can save

    var fields={
      windowBackgroundColor:$('#windowBackgroundColor').val(),
      barColor:$('#barColor').val(),
      separatoColor:$('#separatoColor').val(),
      rowColor:$('#rowColor').val(),
      rowOddColor:$('#rowOddColor').val(),
      textColor:$('#textColor').val(),
      textSecondColor:$('#textSecondColor').val(),
      reloadBackgroundColor:$('#reloadBackgroundColor').val(),
      reloadTextColor:$('#reloadTextColor').val(),
      buttonColor:$('#buttonColor').val(),
      buttonTopColor:$('#buttonTopColor').val(),
      buttonBottomColor:$('#buttonBottomColor').val(),
      tabTintColor:$('#tabTintColor').val(),
    }
    

    if(settings.id){
      //We have settings before
      console.log('Modify existing settings');
      settings.colors=fields;
      updateClassObject({
        objectClass:"settings",
        fields:settings,
        id:settings.id,
        photo:null,
        listener:function(e){
        	$('.loader_save_update').hide();
        }
      });
    }else{
      console.log('Create new settings');
      topublish={
        colors:fields
      }
      console.log(topublish);

      addClassObject({
        objectClass:"settings",
        fields:topublish,
        photo:null,
        listener:function(e){
          window.location = 'colorView.php';
        }
      });

    }
  }else{
      alert("Please wait until the settings are fetch!")
    }
  }

function setUpSettings(data){
 $('.loader_save_update').hide();
 console.log(data.items.length);
 if(data.items.length>0){
  settings=data.items[0];

  if(settings.colors){
    colors=settings.colors;

    $('#windowBackgroundColor').val(colors.windowBackgroundColor);
    $('#barColor').val(colors.barColor);
    $('#separatoColor').val(colors.separatoColor);
    $('#rowColor').val(colors.rowColor);
    $('#rowOddColor').val(colors.rowOddColor);
    $('#textColor').val(colors.textColor);
    $('#textSecondColor').val(colors.textSecondColor);
    $('#reloadBackgroundColor').val(colors.reloadBackgroundColor);
    $('#reloadTextColor').val(colors.reloadTextColor);
    $('#buttonColor').val(colors.buttonColor);
    $('#buttonTopColor').val(colors.buttonTopColor);
    $('#buttonBottomColor').val(colors.buttonBottomColor);
    $('#tabTintColor').val(colors.tabTintColor);

    $('#windowBackgroundColorDiv').colorpicker('setValue',colors.windowBackgroundColor);
    $('#barColorDiv').colorpicker('setValue',colors.barColor);
    $('#separatoColorDiv').colorpicker('setValue',colors.separatoColor);
    $('#rowColorDiv').colorpicker('setValue',colors.rowColor);
    $('#rowOddColorDiv').colorpicker('setValue',colors.rowOddColor);
    $('#textColorDiv').colorpicker('setValue',colors.textColor);
    $('#textSecondColorDiv').colorpicker('setValue',colors.textSecondColor);
    $('#reloadBackgroundColorDiv').colorpicker('setValue',colors.reloadBackgroundColor);
    $('#reloadTextColorDiv').colorpicker('setValue',colors.reloadTextColor);
    $('#buttonColorDiv').colorpicker('setValue',colors.buttonColor);
    $('#buttonTopColorDiv').colorpicker('setValue',colors.buttonTopColor);
    $('#buttonBottomColorDiv').colorpicker('setValue',colors.buttonBottomColor);
    $('#tabTintColorDiv').colorpicker('setValue',colors.tabTintColor);
  }
  
}else{
  settings={};
}
};

    		jQuery(document).ready(function() { 
    			    $('.color').colorpicker();
    			    fetchAndUpdateSettings();
    			    $('a.saveMenu').click(saveSettings);
    		});
		</script>
<script type="text/javascript">
//image for burtlan start
    function PreviewImage() {
	var image =document.getElementById("filestyle-11").value;
	$('#filestyle-21').val(image);
	//alert('ahi');
	var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("filestyle-11").files[0]);	    
	oFReader.onload = function (oFREvent) {
	    var data1=document.getElementById("show_image11").src = oFREvent.target.result;	    
	};
    };
//image for burtlan end
//image for burtlan start
    function PreviewImage1() {
	var image =document.getElementById("filestyle-111").value;
	$('#filestyle-211').val(image);
	//alert('ahi');
	var oFReader = new FileReader();
	oFReader.readAsDataURL(document.getElementById("filestyle-111").files[0]);	    
	oFReader.onload = function (oFREvent) {
	    var data1=document.getElementById("show_image111").src = oFREvent.target.result;	    
	};
    };
//image for burtlan end
</script>
<script>
    $(function(){
        $('.demo2').colorpicker();
    });
</script>
</body>

</html>

