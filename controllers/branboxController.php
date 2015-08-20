<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class branboxController extends CI_Controller {
    function branboxController(){
	parent::__construct();
	$this->load->helper(array('form', 'html'));
	$this->load->model('branboxModel');
	$this->load->library('session');
	$this->load->library("pagination");
	
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$config = Array(
	    'protocol' => 'smtp',
	    'smtp_host' => 'ssl://smtp.googlemail.com',
	    'smtp_port' => 465,
	    'smtp_user' => 'ppkk036@gmail.com', 
	    'smtp_pass' => '12619892233', 
	    'mailtype' => 'html',
	    'charset' => 'iso-8859-1',
	    'wordwrap' => TRUE
	    );
	$this->load->library('email', $config);
	$this->load->helper('string');
	
    }
    //Authentication Controllers Begin
    public function index(){
	$businessId = $this->session->userdata('businessId');
	if($session_data==""){
	    if ($this->input->post('proceed')=='yes') {
		$brandDetails= $this->branboxModel->loginAuthentication();
		
		if($brandDetails==0)
		{
		    $this->session->set_flashdata('error', 'Invalid User Id and Password Please check it');
		    redirect(base_url()."branboxController");
		}
		else
		{
		    $this->session->set_userdata('role',"Business");
		    $this->session->set_userdata('businessId',$brandDetails[0]['businessId']);
		    $this->session->set_userdata('name',$brandDetails[0]['brandName']);
		    $this->session->set_userdata('email',$brandDetails[0]['email1']);
		    $this->session->set_userdata('website',$brandDetails[0]['website']);
		    
		    $result= $this->branboxModel->getOrderNotificationCount($brandDetails[0]['businessId']);
		    $this->session->set_userdata('totalOrder',$result);
		    redirect(base_url()."branboxController/dashboard");
		}
		
	    }
	    $this -> load -> view('index');
	}
	else{
	    redirect(base_url('branboxController/dashboard'));
	}
	
    }
    
    public function admin()
    {
	$businessId = $this->session->userdata('businessId');
	if($session_data==""){
	    if ($this->input->post('proceed')=='yes'){
		$brandDetails= $this->branboxModel->loginAdminAuthendiaction();
		
		if($brandDetails==0)
		{
		    $this->session->set_flashdata('error', 'Invalid User Id and Password Please check it');
		    redirect(base_url()."branboxController/admin");
		}
		else
		{
		    $this->session->set_userdata('role',"Admin");
		    $this->session->set_userdata('name',$brandDetails[0]['name']);
		    $this->session->set_userdata('email',$brandDetails[0]['email']);
		    redirect(base_url()."branboxController/dashboard");
		}
		
	    }
	   $this -> load -> view('Admin/adminIndex');
	}
	else{
	    redirect(base_url('branboxController/dashboard'));
	}
	
    }
  
//Branbox Admin Start

    // Admin User Start
    public function adminLogout()
    {
	$this->session->unset_userdata('role');
	$this->session->unset_userdata('totalOrder');
	$this->session->unset_userdata('businessId');
	unset($this->session->userdata);
	redirect(base_url()."branboxController/admin",'refresh');
    }
    function adminUserView()
    {
	$data['view'] = $this->branboxModel->adminUserView();
	$this -> load -> view('header');
	$this -> load -> view('Admin/adminUserView',$data);
    }
    
    function adminUserAdd()
    {
	if(isset($_POST['Save']))
	{
	    $data['add'] = $this->branboxModel->adminUserAdd();
	    redirect('branboxController/adminUserView');
	}
	$this -> load -> view('header');
	$this -> load -> view('Admin/adminUserAdd');
    }
    
    function adminUserEdit($id)
    {
	if(isset($_POST['Update']))
	{
	    $data['update'] = $this->branboxModel->adminUserUpdate($id);
	    redirect('branboxController/adminUserView');
	}
	$data['edit'] = $this->branboxModel->adminUserEdit($id);
	$this -> load -> view('header');
	$this -> load -> view('Admin/adminUserEdit',$data);
    }
    
    function adminUserDelete($id)
    {
	$data['delete']=$this->branboxModel->adminUserDelete($id);
	redirect('branboxController/adminUserView');
    }
    // Admin userr end

    // Signup for Business Start
    
    function restuarantView()
    {
	$viewResult['result'] = $this->branboxModel->fetchAllRestuarant();
	$this -> load -> view('header');
        $this -> load -> view('BusinessAdmin/restaurantView',$viewResult);
	
    }
    public function ajaxRestaurantStatus()
    {
	$businessId=$_POST["businessId"];
	$result= $this->branboxModel->getRestaurant($businessId);
	if($result[0]['status']=="ON")
	{
	   $status="OFF"; 
	}
	else
	{
	    $status="ON";    
	}
	$form_data=array(
		    'status'=>$status
		    );
	$this->db->where('businessId',$businessId);
	
	$this->db->update('business', $form_data);
	echo'{"status":"'.$status.'","business":"'.$businessId.'"}';
    }
    function restuarantSignup()
    {
	if(isset($_POST['save'])){
	    $this->branboxModel->restuarantSave();
	    redirect('branboxController/extraMessage');
	}else{
	    $this ->load ->view('BusinessAdmin/restuarantSignup');
	}
    }
    function extraMessage($branName)
    {
	$message['branName']=$branName;
	$this ->load ->view('BusinessAdmin/extraMessage',$message);
    }
    function restuarantDelete($id)
    {
	$result = $this->branboxModel->restuarantDelete($id);
	if($result == '1'){
	    $this->session->set_flashdata('status','A record is delete successfully');
	    redirect('branboxController/RestuarantView');
	}else{
	    $this->session->set_flashdata('status','A record is not delete successfully');
	    redirect('branboxController/RestuarantView');
	}
    }
    function emailVerification($uniqueCode,$branName)
    {
	$result = $this->branboxModel->emailVerification($uniqueCode,$branName);
	if($result == 0){
	    redirect('branboxController/extraMessage/'.$branName);
	}else{
	    redirect('branboxController/index');
	}
    }
    //Signup for Business End
    
    
    
  
    
    
    
//Branbox Admin End
    public function Logout(){
	$this->session->unset_userdata('businessId');
	$this->session->unset_userdata('totalOrder');
	$this->session->unset_userdata('role');
	unset($this->session->userdata);
	redirect(base_url()."branboxController",'refresh');
    }
    //Authentication Controllers END
   
   public function getMessage()
   {
	$result=$this->branboxModel->getMessage();
	//print_r($result);
	
	
	?>
	<!--<li class="dropdown">-->
	    <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
		<?php if($result['data4']!=0){?>
		<i class="fa fa-envelope"></i>
		<span class="label"><?php echo $result['data4'];?></span>
		<?php }?>
	    </a>
	    <div></div>
	    <ul class="dropdown-menu media-list pull-right animated fadeInDown">
		<li class="dropdown-header">Notifications (<?php echo $result['data4'];?>)</li>
		<?php foreach($result['data1'] as $data1) {?>
		
		<li class="media">
		    <a href="<?php echo base_url('branboxController/orderAcceptance/'.$data1['id']."/".$data1['endUserId']."/".$data1['itemId']."/o"); ?>">
			<!--<div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>-->
			<div class="media-body">
			    <h6 class="media-heading"> <?php echo $data1['userName']; ?></h6>
			     <p>Ordered the Food. Order Id:<?php echo $data1['itemId'];?></p>
			</div>
		    </a>
		</li>
		<?php }?>
		<?php foreach($result['data2'] as $data2) { ?>
		<li class="media">
		    <a href="<?php echo base_url('branboxController/orderAcceptance/'.$data2['id']."/".$data2['endUserId']."/0/b"); ?>">
			<!--<div class="media-left"><img src="assets/img/user-1.jpg" class="media-object" alt="" /></div>-->
			<div class="media-body">
			    <h6 class="media-heading"> <?php echo $data2['userName']; ?></h6>
			    <p>Booking The Table. Booking Order Id:<?php echo $data2['tableId'];?></p>
			</div>
		    </a>
		</li>
		<?php } ?>
	    </ul>
	<!--</li>-->
	<?php
	
   }
   
   
    public function dashboard()
    {
	$result['details']=$this->branboxModel->dashboard();
	//print_r($result['details']);
	//exit;
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/dashboard',$result);
    }
    //public function GeneratePdf()
    //{
    //
    
    
    
   
    //return $pdfFilePath;

    public function EmailSend($Data)
    {
	$this->email->set_newline("\r\n");
	$this->email->from($Data["FromAdress"]);
	$this->email->to($Data["ToAdress"]);
	$this->email->subject($Data["Subject"]); 
	$this->email->message($Data["Message"]);
	$path=$_SERVER["DOCUMENT_ROOT"];
	  $file=$path.($Data["FilePath"]);
       
	  $this->email->attach($file);
	if (!$this->email->send())
	{
	  show_error($this->email->print_debugger());
	  }
	else
	{
	  echo ($Data["SuccessMessage"]);
	}
    
    }
    public function orderAcceptance($id,$userId,$itemId,$table)
    {
	
	
	$result=$this->branboxModel->orderAcceptance($id,$userId,$itemId,$table);
	$this->session->set_userdata('table',$table);
		   
	if($_POST['approve'])
	{
	    $result=$this->branboxModel->orderAcceptance($id,$userId,$itemId,$table);
	    //echo "<pre>";
	    //print_r($result);
	    //echo "</pre>";
	    //exit;
	    $this->session->set_userdata('table',$table);
	    $html=$this -> load -> view('BusinessAdmin/header2',"",true); 
	    $html.=$this -> load -> view('BusinessAdmin/orderAcceptance',$result,true); //$this->load->view('DocumentPreview','', true);
	    $pdfFilePath = "upload/bills/BBill.pdf";
	    $this->load->library('m_pdf');
	    $pdf = $this->m_pdf->load();
	    $pdf->WriteHTML($html);
	    $pdf->Output($pdfFilePath, "f");
	    
	    $this->branboxModel->orderApproved($id,$userId,$itemId,$table);
	    
	    $email = $result['data1'][0]['email'];
	      
	    $Data=array(
		     "FromAdress"=>'gobi.gta09@gmial.com',
		     "ToAdress"=>$email,
		     "Subject"=>"Ordered Itedm At Branbox",
		     "Message"=>"Your Ordered items are on the way to your home",
		     "FilePath"=>"/branboxAdmin/".$pdfFilePath,
		     "SuccessMessage"=>"Your e-mail has been sent!",
		     
	    );
	    $this->EmailSend($Data);
	    redirect(base_url('branboxController/dashboard'));
	}
	
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/acceptanceHeader');
	$this -> load -> view('BusinessAdmin/orderAcceptance',$result);
	$this -> load -> view('BusinessAdmin/approveFooter');
    }
    
    //Settings Controllers Begin
    //Author: Gobi
    //Menu start
    public function menuView()
    {
	
	$result['getMenu']=$this->branboxModel->getMenu();
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/menuView',$result);
    }
    
    public function getNotification()
    {
	$businessId=$this->session->userdata('businessId');
	$result= $this->branboxModel->getOrderNotificationCount($businessId);
	$count1=$result['item'][0]['count(id)'];
	$count2=$result['table'][0]['count(id)'];
	$resultCount=$count1+$count2;
	$count=$this->branboxModel->getOrderNotification($businessId);
	
	
	//$session_data = $this->session->userdata('totalOrder');
	//$total=$result-$count;
	//echo $total;
	//echo $result;
	//exit;
	
	if($resultCount!=$count)
	{
	    $data=$this->branboxModel->updateNotification($resultCount,$businessId);
	    $this->session->set_userdata('totalOrder',$resultCount);
	    echo'{"item":"'.$count1.'","table":"'.$count2.'","total":"'.$resultCount.'"}';
	   
	}
	else
	    echo'{"total":"0","session":"'.$resultCount.'"}';
    }
    
    public function repositionMenuOrder()
    {
	$businessId=$this->session->userdata('businessId');
	$list_order = $_POST['position'];
	$list = explode(',' , $list_order);
	$i = 1;
	foreach($list as $id)
	{
	    $sql= "UPDATE menu SET position ='$i' WHERE id ='$id' AND businessId=$businessId" ;	
	    $result[]=$this->db->query($sql);
	    $i++;
	    $query[]=$sql;
	    //echo $sql."<br>";
	}
	//print_r($query);
    }
    
    public function ajaxMenuStatus()
    {
	$businessId=$this->session->userdata('businessId');
	$id=$_POST["menuId"];
	$result= $this->branboxModel->getEditMenu($id);
	if($result[0]['status']=="ON")
	{
	   $status="OFF"; 
	}
	else
	{
	    $status="ON";    
	}
	$form_data=array(
		    'status'=>$status
		    );
	$this->db->where('businessId',$businessId);
	$this->db->where('id',$id);
	$this->db->update('menu', $form_data);
	echo'{"status":"'.$status.'","menu_id":"'.$id.'"}';
    }
    
    public function ajaxMenuOnline()
    {
	$businessId=$this->session->userdata('businessId');
	$id=$_POST["menuId"];
	$result= $this->branboxModel->getEditMenu($id);
	if($result[0]['online']=="ON")
	{
	   $online="OFF"; 
	}
	else
	{
	    $online="ON";    
	}
	$form_data=array(
		    'online'=>$online
		    );
	$this->db->where('businessId',$businessId);
	$this->db->where('id',$id);
	$this->db->update('menu', $form_data);
	echo'{"online":"'.$online.'"}';
    }
    public function menuAdd()
    {
	if($this->input->post("proceed") )
	{
            $result=$this->branboxModel->menuAdd();
	    redirect(base_url('branboxController/menuView'));
	}
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/menuAdd');
    }
    
    public function menuEdit($id)
    {
	if($this->input->post("proceed") )
	{   
	    $result=$this->branboxModel->menuEdit($id);
	    redirect(base_url('branboxController/menuView'));
	}
	$result['getEditMenu']=$this->branboxModel->getEditMenu($id);
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/menuEdit',$result);	
    }
    
   public function menuDelete($id)
    {
	$result=$this->branboxModel->menuDelete($id);
	if($result==1)
	    echo $result;
	else
	    echo 0;
	
	
	//redirect(base_url('branboxController/menuView'));
    }
    
    // Menu end
    
    
    //Author: Gobi
    //Sub Menu start
    
    function subMenuView()
    {
	$result['getSubMenu']=$this->branboxModel->getSubMenu();
	$result['getMenu']=$this->branboxModel->getMenu();
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/subMenuView',$result);
    }
    public function repositionSubMenuOrder()
    {
	$list_order = $_POST['position'];
	$list = explode(',' , $list_order);
	$i = 1;
	foreach($list as $id)
	{
	    $sql  = "UPDATE submenu SET position ='$i' WHERE id ='$id'" ;	
	    $this->db->query($sql);
	    $i++;
	    $query[]=$sql;
	    //echo $sql."<br>";
	}
	print_r($query);
    }
    
    public function ajaxSubMenuStatus()
    {
	$id=$_POST["subMenuId"];
	$menuId=$_POST["menuId"];
	$result= $this->branboxModel->getSubMenuEdit($menuId,$id);
	if($result[0]['status']=="ON")
	{
	   $status="OFF"; 
	}
	else
	{
	    $status="ON";    
	}
	$form_data=array(
		    'status'=>$status
		    );
	$this->db->where('id',$id);
	$this->db->update('submenu', $form_data);
	echo'{"status":"'.$status.'","subMenuId":"'.$id.'"}';
    }
    
    public function ajaxSubMenuOnline()
    {
	$id=$_POST["subMenuId"];
	$menuId=$_POST["menuId"];
	$result= $this->branboxModel->getSubMenuEdit($menuId,$id);
	if($result[0]['online']=="ON")
	{
	   $online="OFF"; 
	}
	else
	{
	    $online="ON";    
	}
	$form_data=array(
		    'online'=>$online
		    );
	$this->db->where('id',$id);
	$this->db->update('submenu', $form_data);
	echo'{"online":"'.$online.'","subMenuId":"'.$id.'"}';
    }
    
    function subMenuAdd()
    {
	if($this->input->post("proceed") )
	{
	    $result=$this->branboxModel->subMenuAdd();
	    redirect(base_url('branboxController/subMenuView'));
	}
	$result['getMenu']=$this->branboxModel->getMenu();
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/subMenuAdd',$result);
    }
    
    function subMenuEdit($menuId,$id)
    {
	if($this->input->post("proceed") )
	{
	    $result=$this->branboxModel->subMenuEdit($menuId,$id);
	    redirect(base_url('branboxController/subMenuView'));
	}
	$result['menuId']=$menuId;
	$result['getSubMenu']=$this->branboxModel->getSubMenuEdit($menuId,$id);
	$result['getMenu']=$this->branboxModel->getMenu();
	
	//echo "<pre>";
	//print_r($result['menuId']);
	//echo "</pre>";
	//exit;
	
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/subMenuEdit',$result);	
    }
    
    function subMenuDelete($menuId,$id)
    {
	$result=$this->branboxModel->subMenuDelete($menuId,$id);
	if($result==1)
	    echo $result;
	else
	    echo 0;
	//redirect(base_url('branboxController/subMenuView'));
    }
    //Sub Menu  end
    
    
    //Author: Gobi
    //Sub Menu item start
    
    function subMenuItemView()
    {
	$result['getSubMenu']=$this->branboxModel->getSubMenu();
	$result['getMenu']=$this->branboxModel->getMenu();
	$result['getSubMenuItem']=$this->branboxModel->getSubMenuItem();
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/subMenuItemView',$result);
    }
    
    public function repositionItemOrder()
    {
	$list_order = $_POST['position'];
	$list = explode(',' , $list_order);
	$i = 1;
	foreach($list as $id)
	{
	    $sql  = "UPDATE submenuitem SET positions ='$i' WHERE id ='$id'" ;	
	    $this->db->query($sql);
	    $i++;
	}
    }
    
    public function ajaxItemStatus()
    {
	$subMenuId=$_POST["subMenuId"];
	$menuId=$_POST["menuId"];
	$id=$_POST["itemId"];
	$result=$this->branboxModel->getSubMenuItemEdit($menuId,$subMenuId,$id);
	if($result[0]['status']=="ON")
	{
	   $status="OFF"; 
	}
	else
	{
	    $status="ON";    
	}
	$form_data=array(
		    'status'=>$status
		    );
	$this->db->where('id',$id);
	$this->db->update('submenuitem', $form_data);
	echo'{"status":"'.$status.'","itemId":"'.$id.'"}';
    }
    
    public function ajaxItemOnline()
    {
	$subMenuId=$_POST["subMenuId"];
	$menuId=$_POST["menuId"];
	$id=$_POST["itemId"];
	$result=$this->branboxModel->getSubMenuItemEdit($menuId,$subMenuId,$id);
	if($result[0]['online']=="ON")
	{
	   $online="OFF"; 
	}
	else
	{
	    $online="ON";    
	}
	$form_data=array(
		    'online'=>$online
		    );
	$this->db->where('id',$id);
	$this->db->update('submenuitem', $form_data);
	echo'{"online":"'.$online.'","itemId":"'.$id.'"}';
    }
    
    function subMenuItemAdd()
    {
	if($this->input->post("proceed"))
	{
	    $result=$this->branboxModel->subMenuItemAdd();
	    redirect(base_url('branboxController/subMenuItemView'));
	}
	$result['getSubMenu']=$this->branboxModel->getSubMenu();
	$result['getMenu']=$this->branboxModel->getMenu();
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/subMenuItemAdd',$result);
    }
    
    
    public function ajaxGetSubMenu()
    {
	$id=$this->input->post("menuId");
	$result= $this->branboxModel->ajaxGetSubMenu($id);
	print_r($result);
	?>
	<option selected="" disabled="" >Select Sub Menu Name</option>
	<?php 
	foreach($result as $row)
	{ ?>
	<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
	<?php
	}
	
    }
    
    function subMenuItemEdit($menuId,$subMenuId,$id,$ingId)
    {
	if($this->input->post("proceed") )
	{
	    $result=$this->branboxModel->subMenuItemEdit($menuId,$subMenuId,$id,$ingId);
	    redirect(base_url('branboxController/subMenuItemView'));
	}
	$result['menuId']=$menuId;
	$result['subMenuId']=$subMenuId;
	$result['getSubMenu']=$this->branboxModel->getSubMenu();
	$result['getMenu']=$this->branboxModel->getMenu();
	$result['getSubMenuItemEdit']=$this->branboxModel->getSubMenuItemEdit($menuId,$subMenuId,$id);
	$result['getSubMenuItemGIngrediantEdit']=$this->branboxModel->getSubMenuItemGIngrediantEdit($menuId,$subMenuId,$id);
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/subMenuItrmEdit',$result);	
    }
    
    function subMenuItemDelete($menuId,$subMenuId,$id)
    {
	$result=$this->branboxModel->subMenuItemDelete($menuId,$subMenuId,$id);
	
	if($result==1)
	    echo $result;
	else
	    echo 0;
	//redirect(base_url('branboxController/subMenuItemView'));
    }
    function subMenuItemIngrediantsDelete($id,$menuId,$subMenuId,$itemId)
    {
	$result=$this->branboxModel->subMenuItemIngrediantsDelete($id,$menuId,$subMenuId,$itemId);
	
	if($result==1)
	{
	    echo "1";
	}
	else
	{
	    echo "0";
	}
    }
    
    //Sub Menu item end
    
    //Location Start
    function locationView()
    {
	$viewResult['getlocation']=$this->branboxModel->getlocation();
	$viewResult['getLatLng']=$this->branboxModel->getLatLng();
	//foreach($getLatLng as $data){
	//    print_r($data);
	//}
	
	//exit;
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/locationView',$viewResult);
    }
    
    public function ajaxLocationStatus()
    {
	$id=$_POST["licationId"];
	$result= $this->branboxModel->ajaxLocationStatus($id);
	if($result[0]['status']=="ON")
	{
	   $status="OFF"; 
	}
	else
	{
	    $status="ON";    
	}
	$form_data=array(
		    'status'=>$status
		    );
	$this->db->where('id',$id);
	$this->db->update('locations', $form_data);
	echo'{"status":"'.$status.'","locationId":"'.$id.'"}';
    }
    public function locationAdd()
    {
	if($this->input->post("proceed"))
	{
	    $result=$this->branboxModel->locationAdd();
	    redirect(base_url('branboxController/locationView'));
	}
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/locationAdd');
    }
    
    public function locationDelete($id)
    {
	$result=$this->branboxModel->locationDelete($id);
	
	if($result==1)
	    echo $result;
	else
	    echo 0;
    }
    
    //Location End
    
   //table start
   function tableView()
    {
	$viewResult['result']=$this->branboxModel->getTableList(); 
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/tableListview',$viewResult);
    }
   public function ajaxTableStatus()
    {
	$tableId=$_POST["tableId"];
	$businessId=$this->session->userdata('businessId');
	//$id=$_POST["itemId"];
	$result=$this->branboxModel->getTableListRow($tableId);
	if($result[0]['status']=="ON")
	{
	   $status="OFF"; 
	}
	else
	{
	    $status="ON";    
	}
	$form_data=array(
		    'status'=>$status
		    );
	$this->db->where('id',$tableId);
	$this->db->update('tablelist', $form_data);
	echo'{"status":"'.$status.'","tableId":"'.$tableId.'"}';
    }
    
    public function ajaxTableOnline()
    {
	$tableId=$_POST["tableId"];
	$businessId=$this->session->userdata('businessId');
	//$id=$_POST["itemId"];
	$result=$this->branboxModel->getTableListRow($tableId);
	if($result[0]['online']=="ON")
	{
	   $online="OFF"; 
	}
	else
	{
	    $online="ON";    
	}
	$form_data=array(
		    'online'=>$online
		    );
	$this->db->where('id',$tableId);
	$this->db->update('tablelist', $form_data);
	echo'{"online":"'.$online.'","tableId":"'.$tableId.'"}';
    }
   
    function tableListAdd()
    {
	$result['view']=$this->branboxModel->tableListAddNew();
	redirect(base_url("branboxController/tableView"));          
    }
    function tableListUpdate($code)
    {
	$result['view']=$this->branboxModel->tableListUpdateOld($code);    
	redirect(base_url("branboxController/tableView"));          
    }
    
    function tableAdd()
    {
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/tableListAdd');
    }
    function tableEdit($code)
    {
	$viewResult['result']=$this->branboxModel->getTableListRow($code);
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/tableListEdit',$viewResult);
    }
    function tableDelete($code)
    {
	$viewResult['result']=$this->branboxModel->DeleteTableListRow($code);
	redirect(base_url("branboxController/tableView"));
    }
    //Table End
    
    
    
    // Offer Start
    
    function offerView()
    {
	$data['view'] = $this->branboxModel->offerView();
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/offerView',$data);
    }
    
    function offerAdd()
    {
	if(isset($_POST['Save']))
	{
	    $data['add'] = $this->branboxModel->offerAdd();
	    redirect('branboxController/offerView');
	}
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/offerAdd');
    }
    
    function offerEdit($id)
    {
	if(isset($_POST['Update']))
	{
	    $data['update'] = $this->branboxModel->offerUpdate($id);
	    redirect('branboxController/offerView');
	}
	$data['edit'] = $this->branboxModel->offerEdit($id);
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/offerEdit',$data);
    }
    
    function offerDelete($id)
    {
	$data['delete']=$this->branboxModel->offerDelete($id);
	redirect('branboxController/offerView');
    }
    //Offer End
    
    //About Us Start
    
    function aboutUs()
    {
	$businessId=$this->session->userdata('businessId');
	$true=$this->branboxModel->alreadyExists("about","WHERE businessId='$businessId'");
	$this->session->set_userdata('newUser',$true);
	
	    if(isset($_POST['Update']))
	    {
		$data['update'] = $this->branboxModel->aboutUsUpdate();
		redirect('branboxController/aboutUs');
	    }
	if($true==1)
	{
	    $data['edit'] = $this->branboxModel->aboutUsEdit();
	    $this -> load -> view('header');
	    $this -> load -> view('BusinessAdmin/aboutUs',$data);
	}
	else
	{
	    $this -> load -> view('header');
	    $this -> load -> view('BusinessAdmin/aboutUs');
	}
    }
    
    function orderedItem()
    {
	$data['orderItem'] = $this->branboxModel->orderedItem();
	//echo "<pre>";
	//print_r($data['orderItem']);
	//echo "</pre>";
	//exit;
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/orderedItem',$data);
    }
     public function itemorderDelete($id,$endUserId)
    {
	$this->branboxModel->itemorderDelete($id,$endUserId);
	redirect('branboxController/orderedItem');
    }
    
    function tableRequest()
    {
	$data['booktable'] = $this->branboxModel->tableRequest();
	//echo "<pre>";
	//print_r($data['booktable']);
	//echo "</pre>";
	//exit;
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/tableRequest',$data);
    }
    public function tableRequestDelete($id,$endUserId)
    {
	$this->branboxModel->tableRequestDelete($id,$endUserId);
	redirect('branboxController/tableRequest');
    }
   
    
    function gallery()
    {
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/gallery');
    }
    //About Us End
    
    
    //Settings Start
    //Ezhilarasan Controller for colorView start
    
    function colorView()
    {
	$businessId=$this->session->userdata('businessId');
	$true=$this->branboxModel->alreadyExists("settings","WHERE businessId='$businessId'");
	$this->session->set_userdata('newUser',$true);
	
	$viewResult['result']=$this->branboxModel->getColorRow();
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/colorView',$viewResult);
	
	
    }
    function colorAdd()
    {
	
	if($_POST['update'])
	{
	 
	    $this->branboxModel->addColor();
	    redirect('branboxController/colorView');
	}
	$viewResult['result']=$this->branboxModel->getColorRow();
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/colorView',$viewResult);
	
    
    }
    //Ezhilarasan Controller for colorView end
    
    //Settings End
    
    //laxmipriya
    
    
    function galleryAdd()
    {
	
	$config = array();
        $config["base_url"] = base_url()."branboxController/galleryAdd";
        $total_row= $this->branboxModel->record_count();
	$config["total_rows"] = $total_row;
	$config["per_page"] = 4;
	//$config['use_page_numbers'] = TRUE;
	$config['num_links'] = $total_row;
	$config['cur_tag_open'] = '&nbsp;<a class="current">';
	$config['cur_tag_close'] = '</a>';
	$config['next_link'] = 'Next';
	$config['prev_link'] = 'Previous';
	
	$this->pagination->initialize($config);
	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	$data["results"] = $this->branboxModel->fetch_data($config["per_page"], $page);
	$str_links = $this->pagination->create_links();
	$data["links"] = explode('&nbsp;',$str_links );
	//$viewResult['result']=$this->branboxModel->getImageList(); 
	$this -> load -> view('header');
	$this -> load -> view('BusinessAdmin/galleryAdd',$data);
 
    }
    
    public function ajaxGalleryActive()
    {
	$businessId=$this->session->userdata('businessId');
	$id=$_POST["menuId"];
	$result= $this->branboxModel->getImageEdit($id);
	if($result[0]['active']=="ON")
	{
	    $active="OFF"; 
	}
	else
	{
	    $active="ON";    
	}
	$form_data=array(
		    'active'=>$active
		    );
	$this->db->where('businessId',$businessId);
	$this->db->where('id',$id);
	$this->db->update('gallery', $form_data);
	echo'{"active":"'.$active.'","businessId":"'.$id.'"}';
    }
    function imageListAdd()
    {
 
	$result['view']=$this->branboxModel->imageListAddNew();
	redirect(base_url("branboxController/galleryAdd"));          
    }
//    
//    function imageView()
//    {
//	$viewResult['result']=$this->branboxModel->getImageList(); 
//	$this -> load -> view('header');
//	$this -> load -> view('Admin/imageListview',$viewResult);
//    }
    function imageDelete($code)
    {
	$viewResult['result']=$this->branboxModel->deleteImageListRow($code);
	redirect(base_url("branboxController/galleryAdd"));
    }
    
}