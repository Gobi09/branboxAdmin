<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class branboxModel extends CI_Model {
    
    //Login Authendicatiuon
    
    function loginAdminAuthendiaction()
    {
	$adminName=$this->input->post('name');
	//$password=$this->input->post('password');
	$password = md5($this->input->post('password'));
	$sql="SELECT * FROM adminuser where name='$adminName' AND password='$password'";
    
	$query=$this->db->query($sql, $return_object = TRUE);
	
	if($query->num_rows > 0){
	    return $query->result_array();
	}
	else
	{
	    print_r($sql);
		
	}
    }
    function loginAuthentication(){
	//$company_code = $this->input->post('company_code');
	$brandName = $this->input->post('brandName');
	$password = md5($this->input->post('password'));
	$sql="SELECT * FROM business where brandName='$brandName' AND password='$password' and status='ON'";
    
	$query = $this->db->query($sql, $return_object = TRUE);
	
	if($query->num_rows > 0){
	    return $query->result_array();
	
	}
	else
	{
	    
	    return false;
	}
    }
    //getMessage Start
    public function getMessage()
    {
	$businessId=$this->session->userdata('businessId');
	//echo $sql="select t1.*,t2.* FROM booktable t1 join itemorder t2 on t1.businessId = t2.businessId where t1.businessId = '$businessId' and t1.status='requested' and t2.status='requested'";
	//$query['data'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	//
	
	$sql="select s.*,j.*  FROM orderItemCount s join enduser j ON s.businessId = j.businessId  and s.userId= j.id  where s.businessId = '$businessId' and s.status='ordered' and s.timedDelivery='NO'";
	$query['tot'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	
	$sql="select s.*,j.*  FROM orderItemCount s join enduser j ON s.businessId = j.businessId  and s.userId= j.id  where s.businessId = '$businessId' and s.status='ordered' and s.timedDelivery='YES'";
	$query['totTimed'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	
	
	$sql= "SELECT s.id,s.itemId,s.endUserId,s.quantity,s.totalPrice,s.currencyFormat,s.createdTime,s.status, j.userName,j.address1,j.address2,j.city,j.state,j.country,j.postalCode,j.phoneNumber FROM itemorder s INNER JOIN enduser j ON s.businessId = j.businessId  and s.endUserId= j.id where  s.status='ordered' and s.timedDate='o' and s.timtedTime='o'";
	
	//$sql="select *  FROM itemorder where businessId = '$businessId' and status='ordered'";
	//$sql="select *  FROM orderitemcount where businessId = '$businessId' and status='ordered'";
	$query['data1'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	
	
	$sql= "SELECT s.id,s.endUserId,s.NoOfPerson,s.createdTime,s.status, j.userName,j.address1,j.address2,j.city,j.state,j.country,j.postalCode,j.phoneNumber FROM booktable s INNER JOIN enduser j ON s.businessId = j.businessId  and s.endUserId= j.id where  s.status='ordered'";
	//$sql="select *  FROM booktable where businessId = '$businessId' and status='ordered'";
	$query['data2'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	
	//$sql="select *  FROM enduser where businessId = '$businessId'";
	//$query['data3'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	$query['data4']=count($query['data1'])+count($query['data2']);
	//print_r($query);
	return $query;
    }
    
    public function orderAcceptance($id,$table)
    {
	$businessId=$this->session->userdata('businessId');
	
	$sql="select *  FROM business where businessId = '$businessId'";
	$query['data3'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	
	if($table=='o')
	{
	    
	    
	    $sql= "select t1.*,t2.*,t3.userName,t3.address1,t3.address2,t3.city,t3.state,t3.country,t3.postalCode,t3.phoneNumber,t3.email FROM submenuitem t1 join itemorder t2 on  t1.id = t2.itemId join enduser t3 on t2.endUserId=t3.id and t2.businessId = t1.businessId and t3.id='$id' where t2.businessId='$businessId' and t2.status='ordered' and t2.timedDate='$table' ";
	    $query['data1'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	   
	    
	    //echo "<pre>";
	    //print_r($query);
	    //echo "</pre>";
	    //exit;
	    return $query;
	   
	}
	
	if($table=='t')
	{
	    
	    
	    $sql= "select t1.*,t2.*,t3.userName,t3.address1,t3.address2,t3.city,t3.state,t3.country,t3.postalCode,t3.phoneNumber,t3.email FROM submenuitem t1 join itemorder t2 on  t1.id = t2.itemId join enduser t3 on t2.endUserId=t3.id and t2.businessId = t1.businessId and t3.id='$id' where t2.businessId='$businessId' and t2.status='ordered' and t2.timedDate<>'o' ";
	    $query['data1'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	   
	    
	    //echo "<pre>";
	    //print_r($query);
	    //echo "</pre>";
	    //exit;
	    return $query;
	   
	}
	else if($table=='b')
	{
	   $sql= "SELECT s.id,s.endUserId,s.NoOfPerson,s.bookingDateTime,s.createdTime,s.status, j.userName,j.address1,j.address2,j.city,j.state,j.country,j.postalCode,j.phoneNumber,j.email FROM booktable s INNER JOIN enduser j ON s.businessId = j.businessId  and s.endUserId= j.id  where  s.status='ordered' and s.id='$id' and s.endUserId='$userId' and  s.businessId='$businessId'";
	    //$sql= "select t1.*,t2.* FROM tablelist t1 join booktable t2 on  t1.id = t2.tableId and t2.businessId = t1.businessId and t2.id='$id'  and t2.endUserId='$userId' where t2.businessId='$businessId' ";
	    //$sql="select *  FROM booktable where businessId = '$businessId' and id='$id' and tableId='$itemId' and endUserId='$userId'";
	    $query['data1'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	   
	    //$sql="select *  FROM enduser where businessId = '$businessId'";
	    //$query['data2'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	   
	    $sql="select *  FROM business where businessId = '$businessId'";
	    $query['data3'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	   
	    //echo "<pre>";
	    //print_r($query);
	    //echo "</pre>";
	    //exit;
	    
	    return $query;
	} 
	
    }
    
    public function getIngredients($id,$table)
    {
	if($table=='t')
	{
	    $timedDelivery='YES';
	}
	else
	{
	    $timedDelivery='NO';
	}
	
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT s . * , j . * FROM ingredients s JOIN orderitemingredients j ON s.businessId = j.businessId and s.id=j.ingId where s.businessId='$businessId' AND j.timedDelivery='$timedDelivery'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    //getMessage End
    
    
    
    //Order Approve Start
    public function orderApproved($id,$userId,$itemId,$table)
    {
	$businessId=$this->session->userdata('businessId');
	
	if($table="o")
	{
	    
	    $sql="select *  FROM itemorder where businessId = '$businessId' and endUserId='$userId' and status='ordered' and timedDate='$table'";
	    $query['data'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	    
	    $sql="select *  FROM orderItemCount where businessId = '$businessId' and userId='$userId'and status='ordered' and timedDelivery='NO'";
	    $query['data1'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	    
	   
	    for($i=0; $i<count($_POST['dateTime']); $i++ )
	    {
		  
		foreach($query['data'] as $data)
		{
		    
		    if($_POST['dateTime'][$i]==$data['createdTime'])
		    {
			
			$id=$data['id'];
			$endUserId=$data['endUserId'];
			$itemId=$data['itemId'];
			
			$sql="UPDATE itemorder SET status='Approved' WHERE id='$id' and endUserId='$endUserId' and itemId='$itemId' and businessId='$businessId' and timedDate='o'";
			$datatabel=$this->db->query($sql);
		    }
		}
	    }
	    
	    for($j=0; $j<count($_POST['dateTime']); $j++ )
	    {
		foreach($query['data1'] as $data1)
		{
		    if($_POST['dateTime'][$j]==$data1['createdTime'])
		    {
			$form_data=array(
			    'status'=>"Approved"
			    );
			$sql="UPDATE orderitemcount SET status='Approved' WHERE userId='$userId' and businessId='$businessId' and timedDelivery='NO'";
			$datatabel=$this->db->query($sql);
			
		    }
		}
	    }
	   // print_r($datatabel);
	    //exit;
	}
	
	if($table="t")
	{
	    
	    $sql="select *  FROM itemorder where businessId = '$businessId' and endUserId='$userId' and status='ordered'  and timedDate <> 'o' ";
	    $query['data'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	    
	    $sql="select *  FROM orderItemCount where businessId = '$businessId' and userId='$userId'and status='ordered' and timedDelivery='YES'";
	    $query['data1'] = $this->db->query($sql, $return_object = TRUE)->result_array();
	    
	   
	    for($i=0; $i<count($_POST['dateTime']); $i++ )
	    {
		  
		foreach($query['data'] as $data)
		{
		    
		    if($_POST['dateTime'][$i]==$data['createdTime'])
		    {
			$id=$data['id'];
			$endUserId=$data['endUserId'];
			$itemId=$data['itemId'];
			
			$form_data=array(
			    'status'=>"Approved"
			    );
			$sql="UPDATE itemorder SET status='Approved' WHERE id='$id' and endUserId='$endUserId' and itemId='$itemId' and businessId='$businessId' and timedDate<>'o'";
			$datatabel=$this->db->query($sql);
			
		    }
		}
	    }
	    
	    for($j=0; $j<count($_POST['dateTime']); $j++ )
	    {
		foreach($query['data1'] as $data1)
		{
		    if($_POST['dateTime'][$j]==$data1['createdTime'])
		    {
			$form_data=array(
			    'status'=>"Approved"
			    );
			$this->db->where('userId',$userId);
			$this->db->where('businessId',$businessId);
			$this->db->where('timedDelivery','YES');
			$this->db->update('orderitemcount', $form_data);
		    }
		}
	    }
	   // print_r($datatabel);
	    //exit;
	}
	
	
	if($table="b")
	{
	    $form_data=array(
		   'status'=>"Approved"
		   );
	    $this->db->where('id',$id);
	    $this->db->where('endUserId',$userId);
	    $this->db->where('businessId',$businessId);
	    $this->db->update('booktable', $form_data);
	}

	
	
    }
    //Order Approve End
    
    //Dashboard
    public function dashboard()
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT count(id) FROM enduser where businessId='$businessId'";
	$query['user'] = $this->db->query($sql)->result_array();
	$sql="SELECT sum(totalPrice) FROM itemorder where businessId='$businessId'";
	$query['prifit'] = $this->db->query($sql)->result_array();
	$sql1="SELECT count(id) FROM itemorder where businessId='$businessId' and status='ordered'";
	$query['new1'] = $this->db->query($sql1)->result_array();
	$sql1="SELECT count(id) FROM booktable where businessId='$businessId' and status='ordered'";
	$query['new2'] = $this->db->query($sql1)->result_array();
	$query['new']= $query['new1'][0]['count(id)']+ $query['new2'][0]['count(id)']  ;
	
	$sql="SELECT count(id) FROM itemorder where businessId='$businessId' and status='Approved'";
	$query['old1'] = $this->db->query($sql)->result_array();
	$sql="SELECT count(id) FROM booktable where businessId='$businessId' and status='Approved'";
	$query['old2'] = $this->db->query($sql)->result_array();
	$query['old']= $query['old1'][0]['count(id)']+ $query['old2'][0]['count(id)']  ;
	
	return $query;
    }
    
    
    
    //Sign up Start
    public function restuarantSave()
    {
	$ramdomString = random_string('alnum', 16);
	$data = array(
	    'brandName' => $this->input->post('branName'),
	    'companyName' => $this->input->post('companyName'),
	    'address1' => $this->input->post('address1'),
	    'address2' => $this->input->post('address2'),
	    'city' => $this->input->post('city'),
	    'state' => $this->input->post('state'),
	    'country' => $this->input->post('country'),
	    'postalCode' => $this->input->post('postalCode'),
	    'phoneNumber1' => $this->input->post('phone'),
	    'phoneNumber2' => $this->input->post('mobile'),
	    'email1' => $this->input->post('email'),
	    'email2' => $this->input->post('email'),
	    'website' => $this->input->post('website'),
	    'latitude' => $this->input->post('0'),
	    'longitude' => $this->input->post('0'),
	    'appVersion' => '0.1',
	    'status' => 'OFF',
	    'password' => md5($this->input->post('password')),
	    'randomCode' => $ramdomString
	);
	$this->db->insert('business', $data); 
	$this->emailSending($ramdomString);
    }
    public function emailSending($ramdomString)
    {
	$email = $this->input->post('email');
	$branName = $this->input->post('branName');
	$body .="<html>
		    <head>
			<title>Welcome to branbox</title>
		    </head>
		    <body>
			<h1>email1</h1>
			<h4>Verify Your Email By using the above link.</h4>
			<p>http://localhost/branboxAdmin/branboxController/emailVerification/".$ramdomString."/".$branName."</p>
		    </body>
		</html>";
	$this->email->set_newline("\r\n");
	$this->email->from('ppkk036@gmail.com'); // change it to yours
	$this->email->to($email);// change it to yours
	$this->email->subject('Branbox Email Verification');
	$this->email->message($body);
	if($this->email->send()){
	echo 'Email Sent.';
	}else{
	echo 'Email Not Sent.';
	}
    }
    public function emailVerification($uniqueCode,$branName)
    {
	$this->db->where('randomCode', $uniqueCode);
	$this->db->where('brandName', $branName);
	$data = array(
	    'status' => 'ON'
	);
	$this->db->update('business', $data);
	return $this->db->affected_rows();
    }
    public function fetchAllRestuarant()
    {
	return $this->db->get('business')->result_array();
    }
    public function getRestaurant($businessId)
    {
	$this->db->where('businessId',$businessId);
	return $this->db->get('business')->result_array();
    }
    
    public function restuarantDelete($id)
    {
	return $this->db->delete('business', array('businessId' => $id)); 
    }
    
    //Sign Up End
    
    // Brand Details Start
    public function getBrandDetails()
    {
	return $this->db->get('business'); 
    }
    
    //
    
    //Start menu in header
    
    public function getMenu()
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM menu where businessId='$businessId' ORDER BY position ";
	return $query = $this->db->query($sql)->result_array();
    }
    //timed Notification
    public function getTimedNotificationCount($businessId)
    {
	$sql1="SELECT count(id) FROM itemorder where businessId='$businessId' and status='ordered' AND timedDate !='o'";
        $itemorder['item'] = $this->db->query($sql1)->result_array();
	$sql2="SELECT count(id) FROM booktable where businessId='$businessId' and status='ordered'";
        $itemorder['table'] = $this->db->query($sql2)->result_array();
	//$count1=$itemorder1[0]['count(id)'];
	//$count2=$itemorder2[0]['count(id)'];
	//print_r($itemorder);
	return $itemorder;
    }
    public function getTimedNotification($businessId)
    {
	$sql="SELECT oldordertotal FROM totalorder where businessid='$businessId'";
        $itemorder = $this->db->query($sql)->result_array();
	return $count=$itemorder[0]['oldordertotal'];
    }
    public function updateTimedNotification($count,$businessId)
    {
	$sql= "UPDATE totalorder SET newordertotal='$count', oldordertotal='$count' WHERE businessid ='$businessId'";	
	return $this->db->query($sql);
    }
    
    //Order notification
    public function getOrderNotificationCount($businessId)
    {
	$sql1="SELECT count(id) FROM itemorder where businessId='$businessId' and status='ordered' and timedDate='o'";
        $itemorder['item'] = $this->db->query($sql1)->result_array();
	$sql2="SELECT count(id) FROM booktable where businessId='$businessId' and status='ordered'";
        $itemorder['table'] = $this->db->query($sql2)->result_array();
	//$count1=$itemorder1[0]['count(id)'];
	//$count2=$itemorder2[0]['count(id)'];
	//print_r($itemorder);
	return $itemorder;
    }
    public function getOrderNotification($businessId)
    {
	$sql="SELECT oldordertotal FROM totalorder where businessid='$businessId' and notiyFor='o' ";
        $itemorder = $this->db->query($sql)->result_array();
	return $count=$itemorder[0]['oldordertotal'];
    }
    public function updateNotification($count,$businessId)
    {
	$sql= "UPDATE totalorder SET newordertotal='$count', oldordertotal='$count' WHERE businessid ='$businessId'";	
	return $this->db->query($sql);
    }
    public function getEditMenu($id)
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM menu where id=$id and businessId=$businessId";
        return $query = $this->db->query($sql)->result_array();
    }
    public function menuAdd()
    {
	$count=$this->getMenu();
	
	$businessId=$this->session->userdata('businessId');
	$url=$config['upload_path'] ='upload/menu/';
	$config['allowed_types'] = 'gif|jpg|png';
	$this->load->library('upload', $config);
	$this->upload->do_upload('image');
	$path =  $this->upload->data();
	$path1=base_url().$url.$path['file_name'];
	
	if($this->input->post("status")!="ON")
	{
	    $status="OFF";
	}
	else
	{
	    $status="ON";
	}
	if($this->input->post("online")!="ON")
	{
	    $online="OFF";
	}
	else
	{
	      $online="ON";
	}
	$data=array(
	    "businessId"=>$businessId,
	    "name"=>$this->input->post("name"),
	    "image"=>$path1,
	    "position"=>count($count)+1,
	    "status"=>$status,
	    "online"=>$online,
	);
	
	return $this->db->insert("menu",$data);
	
    }
    
    
    public function menuEdit($id)
    {
	if($_FILES['image']['name']=="")
    	{
    	    $path1=$this->input->post('oldImage');
	}	
	else
	{
	$url=$config['upload_path'] ='upload/menu/';
	$config['allowed_types'] = 'gif|jpg|png';
	$this->load->library('upload', $config);
	$this->upload->do_upload('image');
	$path =  $this->upload->data();
	$path1=base_url().$url.$path['file_name'];
	}
	
	
	if($this->input->post("status")!="ON")
	{
	    $status="OFF";
	}
	else
	{
	      $status="ON";
	}
	if($this->input->post("online")!="ON")
	{
	    $online="OFF";
	}
	else
	{
	    $online="ON";
	}
	$businessId=$this->session->userdata('businessId');
	$data=array(
	    "name"=>$this->input->post("name"),
	    "image"=>$path1,
	    "status"=>$status,
	    "online"=>$online,
	);
	
	$this->db->where('id',$id);
	$this->db->where('businessId',$businessId);
        return $result=  $this->db->update('menu',$data);
	
    }
    
    public function menuDelete($id)
    {
	$businessId=$this->session->userdata('businessId');
	
	
	$sql="SELECT * FROM submenu where businessId='$businessId' and menuId='$id'";
	$query = $this->db->query($sql)->result_array();
    
	$sql="SELECT * FROM submenuitem where businessId='$businessId' and menuId='$id'";
	$cuntSubMenu = $this->db->query($sql)->result_array();
	
	if(count($query)==0 && count($cuntSubMenu)==0)
	{
	    $this->db->where('id',$id);
	    $this->db->where('businessId',$businessId);
	    return $this->db->delete('menu');
	}
	
	
    }
    // menu end
    
    
    //sub menu start
    
    
    public function getSubMenu()
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM submenu where businessId=$businessId order by position";
        return $query = $this->db->query($sql)->result_array();
    } 
    public function getSubMenuEdit($menuId,$id)
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM submenu where id=$id and menuId=$menuId and businessId=$businessId";
        return $query = $this->db->query($sql)->result_array();
    }
    public function subMenuAdd()
    {
	$count=$this->getSubMenu();
	
	$url=$config['upload_path'] ='upload/submenu/';
	$config['allowed_types'] = 'gif|jpg|png';
	$this->load->library('upload', $config);
	$this->upload->do_upload('image');
	$path =  $this->upload->data();
	$path1=base_url().$url.$path['file_name'];
	if($this->input->post("status")!="ON")
	{
	    $status="OFF";
	}
	else
	{
	      $status="ON";
	}
	if($this->input->post("online")!="ON")
	{
	    $online="OFF";
	}
	else
	{
	      $online="ON";
	}
	$businessId=$this->session->userdata('businessId');
	$data=array(
	    "businessId"=>$businessId,
	    "menuId"=>$this->input->post("menuId"),
	    "name"=>$this->input->post("name"),
	    "image"=>$path1,
	    "position"=>count($count)+1,
	    "status"=>$status,
	    "online"=>$online,
	);
	
	return $this->db->insert("submenu",$data);
    }
    
    
    public function subMenuEdit($menuId,$id)
    {
	if($_FILES['image']['name']=="")
    	{
    	    $logo=$this->input->post('oldImage');
	}	
	else
	{
	    $url=$config['upload_path'] ='upload/submenu/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $this->load->library('upload', $config);
	    $r=$this->upload->do_upload('image');
	    $data =  $this->upload->data();
	    $logo=base_url().$url.$data['file_name'];
	}
	
	
	if($this->input->post("status")!="ON")
	{
	    $status="OFF";
	}
	else
	{
	      $status="ON";
	}
	if($this->input->post("online")!="ON")
	{
	    $online="OFF";
	}
	else
	{
	      $online="ON";
	}
	$businessId=$this->session->userdata('businessId');
	$data=array(
	   
	 
	    "name"=>$this->input->post("name"),
	    "image"=>$logo,
	    "status"=>$status,
	    "online"=>$online,
	);
	
	$this->db->where( 'businessId',$businessId);
	$this->db->where('id',$id);
	$this->db->where('menuId',$menuId);
        return $this->db->update('submenu',$data);
    }
    
    public function subMenuDelete($menuId,$id)
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM submenuitem where businessId='$businessId' and menuId='$menuId' and subMenuId='$id'";
	$cuntSubMenuItem = $this->db->query($sql)->result_array();
	
	if(count($cuntSubMenuItem)==0)
	{
	    $this->db->where('id',$id);
	    $this->db->where('businessId',$businessId);
	    $this->db->where('menuId',$menuId);
	   return $this->db->delete('submenu');
	}
    }
    
    //Sub menu end
    
    //Sub menu item Start
    
    
    public function getSubMenuItem()
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM submenuitem where businessId=$businessId order by positions";
        return $query = $this->db->query($sql)->result_array();
    } 
    public function getSubMenuItemEdit($menuId,$subMenuId,$id)
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM submenuitem where id=$id and menuId=$menuId and subMenuId=$subMenuId and businessId=$businessId";
        return $query = $this->db->query($sql)->result_array();
    }
    public function getSubMenuItemGIngrediantEdit($menuId,$subMenuId,$id)
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM ingredients where itemId=$id and menuId=$menuId and subMenuId=$subMenuId and businessId=$businessId";
        return $query = $this->db->query($sql)->result_array();
    }
    
    public function ajaxGetSubMenu($id)
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM submenu where menuId=$id and businessId=$businessId";
        return $query = $this->db->query($sql)->result_array();
    }
    public function subMenuItemAdd()
    {
	$businessId=$this->session->userdata('businessId');
	$count=$this->getSubMenuItem();
	$url=$config['upload_path'] ='upload/item/';
	$config['allowed_types'] = 'gif|jpg|png';
	$this->load->library('upload', $config);
	$r=$this->upload->do_upload('image');
	$data =$this->upload->data();
	$logo=base_url().$url.$data['file_name'];
	if($this->input->post("status")!="ON")
	{
	    $status="OFF";
	}
	else
	{
	    $status="ON";
	}
	if($this->input->post("online")!="ON")
	{
	    $online="OFF";
	}
	else
	{
	    $online="ON";
	}
	$data=array(
	    "businessId"=>$businessId,
	    "menuId"=>$this->input->post("menuId"),
	    "subMenuId"=>$this->input->post("subMenuId"),
	    "name"=>$this->input->post("name"),
	    "image"=>$logo,
	    "price"=>$this->input->post("price"),
	    "tax"=>$this->input->post("tax"),
	    "offers"=>$this->input->post("offers"),
	    "positions"=>count($count)+1,
	    "status"=>$status,
	    "online"=>$online,
	);
	$this->db->insert("submenuitem",$data);
	$insert_id = $this->db->insert_id();
	$count=count($this->input->post("ingredients"));
	for($i=0;$i<$count-1;$i++)
	{
	    $dataingredients=array(
		"businessId"=>$businessId,
		"menuId"=>$this->input->post("menuId"),
		"subMenuId"=>$this->input->post("subMenuId"),
		"itemId"=>$insert_id,
		"ingredients"=>$_POST['ingredients'][$i],
		"price"=>$_POST['ingPrice'][$i],
		"category"=>$_POST['category'][$i]
	    );
	    $this->db->insert("ingredients",$dataingredients);
	    //echo "<pre>";
	    //echo $insert_id;
	    //echo $count;
	    //print_r($dataingredients);
	    //echo "</pre>";
	}
	return;
	//exit;
    }
    
    
    public function subMenuItemEdit($menuId,$subMenuId,$itemId,$ingId)
    {
	if($_FILES['image']['name']=="")
    	{
    	    $logo=$this->input->post('oldImage');
	}	
	else
	{
	    $url=$config['upload_path'] ='upload/item/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $this->load->library('upload', $config);
	    $r=$this->upload->do_upload('image');
	    $data =  $this->upload->data();
	    $logo=base_url().$url.$data['file_name'];
	}
	
	
	if($this->input->post("status")!="ON")
	{
	    $status="OFF";
	}
	else
	{
	      $status="ON";
	}
	if($this->input->post("online")!="ON")
	{
	    $online="OFF";
	}
	else
	{
	      $online="ON";
	}
	
	$businessId=$this->session->userdata('businessId');
	$data=array(
	  
	    "menuId"=>$this->input->post("menuId"),
	    "subMenuId"=>$this->input->post("subMenuId"),
	    "name"=>$this->input->post("name"),
	    "image"=>$logo,
	    "price"=>$this->input->post("price"),
	    "tax"=>$this->input->post("tax"),
	    "garnish"=>$this->input->post("garnish"),
	    "offers"=>$this->input->post("offers"),
	    "status"=>$status,
	    "online"=>$online,
	);
	$this->db->where('businessId',$businessId);
	$this->db->where('id',$itemId);
	$this->db->where('menuId',$menuId);
	$this->db->where('subMenuId',$subMenuId);
        $result=  $this->db->update('submenuitem',$data);
	$count=count($this->input->post("ingredients"));
	for($i=0;$i<$count;$i++)
	{
	    $dataingredients=array(
		"ingredients"=>$_POST['ingredients'][$i],
		"price"=>$_POST['ingPrice'][$i],
		"category"=>$_POST['category'][$i]
	    );
	    $this->db->where('businessId',$businessId);
	    $this->db->where('id',$_POST['ingredientsId'][$i]);
	    $this->db->where('itemId',$itemId);
	    $this->db->where('menuId',$menuId);
	    $this->db->where('subMenuId',$subMenuId);
	    $result=  $this->db->update('ingredients',$dataingredients);
	   
	}
	$count=count($this->input->post("ingredients1"));
	for($i=0;$i<$count-1;$i++)
	{
	    $dataingredients=array(
		"businessId"=>$businessId,
		"menuId"=>$menuId,
		"subMenuId"=>$subMenuId,
		"itemId"=>$itemId,
		"ingredients"=>$_POST['ingredients'][$i],
		"price"=>$_POST['ingPrice'][$i],
		"category"=>$_POST['category'][$i]
	    );
	    $this->db->insert("ingredients",$dataingredients);
	    //echo "<pre>";
	    ////echo $insert_id;
	    //echo $count;
	    //print_r($dataingredients);
	    //echo "</pre>";
	}
	
	//exit;
	
    }
    
    public function subMenuItemDelete($menuId,$subMenuId,$id)
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId',$businessId);
	$this->db->where('itemId',$id);
	$this->db->where('menuId',$menuId);
	$this->db->where('subMenuId',$subMenuId);
	$data=$this->db->delete('ingredients');
	if($data==1)
	{
	    $this->db->where('businessId',$businessId);
	    $this->db->where('id',$id);
	    $this->db->where('menuId',$menuId);
	    $this->db->where('subMenuId',$subMenuId);
	    return $this->db->delete('submenuitem');
	}
	
    }
    public function subMenuItemIngrediantsDelete($id,$menuId,$subMenuId,$itemId)
    {
	
	
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId',$businessId);
	$this->db->where('id',$id);
	$this->db->where('itemId',$itemId);
	$this->db->where('menuId',$menuId);
	$this->db->where('subMenuId',$subMenuId);
       return $this->db->delete('ingredients');
    }
    
    //Sub menu item End
    
    //Locations Start
    public function getlocation()
    {
	return $this->db->get('locations')->result_array();
    }
    public function getLatLng()
    {
	$sql="select branchname,latitude,longitude  from locations";
	return $data= $this->db->query($sql)->result_array();
    }
     public function ajaxLocationStatus($id)
    {	$this->db->where("id",$id);
	return $this->db->get('locations')->result_array();
    }
    
    public function locationAdd()
    {
	$businessId=$this->session->userdata('businessId');
	$address=explode(",",$_POST['location']);
	$count=count($address);
	
	$dataingredients=array(
	   "businessId"=>$businessId,
	   "branchname"=>$_POST['branch'],
	   "country"=>$address[$count-1],
	   "state"=>$address[$count-2],
	   "city"=>$address[$count-3],
	   "latitude"=>$_POST['lat'],
	   "longitude"=>$_POST['lng'],
	   "status"=>$_POST['status']
	   );
	$this->db->insert("locations",$dataingredients);
	//echo $count;
	//echo "<pre>";
	//print_r($dataingredients);
	//exit;
    }
    
    public function locationDelete($id)
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId);
	$this->db->where('id', $id); 
	return $this->db->delete('locations');
    }
    //Location End
    
    // table start
    public function getTableList()
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId); 
	return $this->db->get('tablelist')->result_array();
    }
    public function getTableListRow($code)
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM tablelist where businessId=$businessId and id='$code'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    function tableListAddNew()
    {
	$url=$config['upload_path'] ='upload/table/';
	$config['allowed_types'] = 'gif|jpg|png';
	$this->load->library('upload', $config);
	$this->upload->do_upload('image');
	$path =  $this->upload->data();
	$path1=$path['file_name'];
	$businessId=$this->session->userdata('businessId');
	$date = date("Y-m-d H:i:s");
	
	if($this->input->post('status')=="ON")
	{
	$STATUS='ON';
	}
	else
	{
	$STATUS='OFF';
	}
	if($this->input->post('online')=="ON")
	{
	$ONLINE='ON';
	}
	else
	{
	$ONLINE='OFF';
	}
	$data=array(                   
	    'businessId'  =>$businessId,
	    'name'   =>  $this->input->post('name'),
	    'feature'   =>  $this->input->post('feature'),
	    'image'   =>  $path1,
	    'price'   =>  $this->input->post('price'),
	    'status'   =>  $STATUS,
	    'online'   =>  $ONLINE,
	    'createdTime'  =>  $date,
	);
	//echo '<pre>';
	//print_r($data);
	//echo '</pre>';
	//exit();
	$this->db->insert('tablelist',$data);               
    }
    function tableListUpdateOld($code)
    {
	if($_FILES['image']['name']=="")
	{
	    $path1=$this->input->post('oldImage');
	} 
	else
	{
	    $url=$config['upload_path'] ='upload/table/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $this->load->library('upload', $config);
	    $this->upload->do_upload('image');
	    $path =  $this->upload->data();
	    $path1=$path['file_name'];
	}
	$businessId=$this->session->userdata('businessId');
	$date = date("Y-m-d H:i:s");
	
	if($this->input->post('status')=="ON")
	{
	$STATUS='ON';
	}
	else
	{
	$STATUS='OFF';
	}
	if($this->input->post('online')=="ON")
	{
	$ONLINE='ON';
	}
	else
	{
	$ONLINE='OFF';
	}
	$data=array(
	    'name'   =>  $this->input->post('name'),
	    'feature'   =>  $this->input->post('feature'),
	    'image'   =>  $path1,
	    'price'   =>  $this->input->post('price'),
	    'status'   =>  $STATUS,
	    'online'   =>  $ONLINE,
	    'createdTime'  =>  $date,
	);
	//echo '<pre>';
	//print_r($data);
	//echo '</pre>';
	//exit();
	$this->db->where('id', $code);
	$this->db->where('businessId', $businessId); 
	$this->db->update('tablelist',$data);               
    }
     function DeleteTableListRow($code)
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('id', $code);
	$this->db->where('businessId', $businessId); 
	$this->db->delete('tablelist');
    }
   
   
    
     // Offer Start
    function offerView()
    {
	$date=date('Y-m-d');
	$businessId=$this->session->userdata('businessId');
	//$sql="SELECT * FROM offer where businessId='$businessId' and Date(validUptodate) >= '$date' " ;
	
	$sql="SELECT o.*, i.name FROM offer o join submenuitem i on o.itemId=i.id where o.businessId='$businessId' and o.status='ON' and Date(o.validUptodate) >= '$date' " ;
	$return =$this->db->query($sql, $return_object = TRUE)->result_array();
	//echo "<pre>";
	//print_r($return );
	//exit;
	//   
	//$this->db->where('businessId', $businessId); 
	//$sql= $this->db->get("offer");
	//return $sql->result_array();
    }
     function ajaxTableStatus($offerId)
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM offer where businessId=$businessId and id='$offerId'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    
    function offerAdd()
    {
	$businessId=$this->session->userdata('businessId');
	if($this->input->post('status')=="ON")
	{
	$STATUS='ON';
	}
	else
	{
	$STATUS='OFF';
	}
	$datas=explode("s",$this->input->post('itemId'));
	$data = array
	(
	    'businessId'  =>$businessId,
	    'title'       =>$this->input->post('title'),
	    'menuId'       =>$datas[1],
	    'subMenuId'       =>$datas[2],
	    'ItemId'       =>$datas[0],
	    'price'       =>$this->input->post('price'),
	    'image'       =>$datas[3],
	    'validFromdate'       =>$this->input->post('validFromdate'),
	    'validUptodate'       =>$this->input->post('validUptodate'),
	    'Description' =>$this->input->post('description'),
	    'status'=>$STATUS
	);
	return $this->db->insert('offer',$data);
    }
    
    function offerEdit($id)
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId); 
	$this->db->where('id',$id);
	$sql= $this->db->get("offer");
	return $sql->result_array();
    }
    
    function offerUpdate($id)
    {
	if($this->input->post('status')=="ON")
	{
	$STATUS='ON';
	}
	else
	{
	$STATUS='OFF';
	}
	
	$businessId=$this->session->userdata('businessId');
	
	$datas=explode("s",$this->input->post('itemId'));
	$data = array
	(
	    
	    'title'       =>$this->input->post('title'),
	    'menuId'       =>$datas[1],
	    'subMenuId'       =>$datas[2],
	    'ItemId'       =>$datas[0],
	    'price'       =>$this->input->post('price'),
	    'image'       =>$datas[3],
	    'validFromdate'       =>$this->input->post('validFromdate'),
	    'validUptodate'       =>$this->input->post('validUptodate'),
	    'Description' =>$this->input->post('description'),
	    'status'=>$STATUS
	);
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId); 
	$this->db->where('id',$id);
	return $this->db->update('offer',$data);  
    }
    
    function offerDelete($id)
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId); 
	$this->db->where('id',$id);
	$this->db->delete('offer'); 
    }
    //Ofer End
    
    
    public function alreadyExists($tableName, $where_clause)
    {
	$sql="SELECT * FROM ".$tableName." ".$where_clause;
	$data=$this->db->query($sql, $return_object = TRUE)->result_array();
	
	if(count($data)==1)
	{
	    return 1;
	}
	else
	{
	    return 0;
	}
    }
    // About Us Start
    function aboutUsEdit()
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId); 
	$sql= $this->db->get("about");
	return $sql->result_array();
    }
    
    function aboutUsUpdate()
    {
	echo "<pre>";
	print_r($_POST);
	exit;
	
	if($_FILES["image"]["name"]!="")
	{
	    $url=$config['upload_path'] ='upload/aboutUs/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $this->load->library('upload', $config);
	    $this->upload->do_upload('image');
	    $data =  $this->upload->data();
	    $filename=$data['file_name'];
	}
	else
	{
	    $filename=$this->input->post('oldfile');
	}
	
	$businessId=$this->session->userdata('businessId');
	$newUser=$this->session->userdata('newUser');
	if($newUser==1)
	{
	    $data = array
	    (
	    'title'       =>$this->input->post('title'),
	    'image'       =>$filename,
	    'description' =>$this->input->post('description')
	    );
	    $this->db->where('businessId', $businessId);
	    $return= $this->db->update('about',$data);
	}
	else
	{
	    $data = array
	    (
		'businessId'=>$businessId,
		'title'       =>$this->input->post('title'),
		'image'       =>$filename,
		'description' =>$this->input->post('description')
	    );
	    $return =$this->db->insert('about',$data);
	   
	}
    }
    
    function orderedItem()
    {
	$businessId=$this->session->userdata('businessId');
	//$sql="select  from itemorder itm join orderitemcount oitm on itm"
	
	$sql="select s.*,j.*  FROM orderItemCount s join enduser j ON s.businessId = j.businessId  and s.userId= j.id  where s.businessId = '$businessId' and s.timedDelivery='NO'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
	
	
	$sql= "SELECT s.id,s.itemId,s.endUserId,s.quantity,s.totalPrice,s.currencyFormat,s.createdTime,s.status,s.timedDate, i.menuId,i.subMenuId,i.name,i.image,i.price,i.garnish,i.tax,i.offers, j.userName,j.address1,j.address2,j.city,j.state,j.country,j.postalCode,j.phoneNumber FROM itemorder s INNER JOIN submenuitem i ON i.id = s.itemId INNER JOIN enduser j ON s.endUserId= j.id where i.businessId=s.businessId and s.businessId='$businessId'";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function itemorderDelete($id,$endUserId)
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId); 
	//$this->db->where('id', $id);
	$this->db->where('endUserId', $endUserId);
	$this->db->delete('itemorder');
    }
    
    function tableRequest()
    {
	$businessId=$this->session->userdata('businessId');
	//$sql= "SELECT s.*,i.* FROM booktable s INNER JOIN tablelist i ON i.tableId = s.id and i.businessId=s.businessId";
	$sql= "SELECT s.id,s.endUserId,s.NoOfPerson,s.bookingDateTime,s.createdTime,s.status, j.userName,j.address1,j.address2,j.city,j.state,j.country,j.postalCode,j.phoneNumber FROM booktable s  INNER JOIN enduser j ON s.businessId=j.businessId and s.endUserId= j.id where j.businessId='$businessId' ";
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function tableRequestDelete($id,$endUserId)
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId); 
	$this->db->where('id', $id);
	$this->db->where('endUserId', $endUserId);
	$this->db->delete('booktable');
    }
    
    //About Us End
    
     //color start
     function addColor()
    {
	if($_FILES['image1']['name']=="")
	{
	    $path1=$this->input->post('oldImage1');
	} 
	else
	{
	    $url=$config['upload_path'] ='upload/table/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $this->load->library('upload', $config);
	    $this->upload->do_upload('image1');
	    $path =  $this->upload->data();
	    $path1=$path['file_name'];
	}
	if($_FILES['image']['name']=="")
	{
	    $path11=$this->input->post('oldImage');
	} 
	else
	{
	    $url=$config['upload_path'] ='upload/table/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $this->load->library('upload', $config);
	    $this->upload->do_upload('image');
	    $path =  $this->upload->data();
	    $path11=$path['file_name'];
	}
	$businessId=$this->session->userdata('businessId');
	$user=$this->session->userdata('newUser');
	
	if($user==1)
	{
	    
	    $data=array(  
		'currencyFormat'   =>  $this->input->post('currencyFormat'),
		'color'    =>  $this->input->post('color'),
		'favIcon'    =>  $path11,
		'bannerImage'   =>  $path1,
		'fontColor'   =>  $this->input->post('fontColor'),
		'fontHoverColor'   =>  $this->input->post('fontHoverColor'),
		'headerColor'   =>  $this->input->post('headerColor'),
		'headerIconHoverColor'  =>  $this->input->post('headerIcnHovercolor'),
		'menuHoverColor'   =>  $this->input->post('MenuHovColor'),
		'menuItemSelectorColor'  =>  $this->input->post('menuItemSelctcolor'),                   
		'createdTime'   =>  $this->input->post('createdTime'),     
	    );
	    $this->db->where('businessId', $businessId);
	    $this->db->update('settings',$data);
	     
	}
	else
	{
	    
	    $data=array(
		'businessId'=>$businessId,
		'currencyFormat'   =>  $this->input->post('currencyFormat'),
		'color'    =>  $this->input->post('color'),
		'favIcon'    =>  $path11,
		'bannerImage'   =>  $path1,
		'fontColor'   =>  $this->input->post('fontColor'),
		'fontHoverColor'   =>  $this->input->post('fontHoverColor'),
		'headerColor'   =>  $this->input->post('headerColor'),
		'headerIconHoverColor'  =>  $this->input->post('headerIcnHovercolor'),
		'menuHoverColor'   =>  $this->input->post('MenuHovColor'),
		'menuItemSelectorColor'  =>  $this->input->post('menuItemSelctcolor'),                   
		'createdTime'   =>  $this->input->post('createdTime'),     
	    );
	    
	    $this->db->insert('settings',$data);
	      
	}
    }
    public function getColorRow()
    {
	$businessId=$this->session->userdata('businessId');
	$sql="SELECT * FROM settings where businessId=$businessId"; 
	return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
    
 
    //color end
    
    
    //Gallery
    //Laxmi priya
    function imageListAddNew()
    {
	$url=$config['upload_path'] ='upload/gallery/';
	$config['allowed_types'] = 'gif|jpg|png';
	$this->load->library('upload', $config);
	$this->upload->do_upload('image');
	$path =  $this->upload->data();
	$fileName=$path['file_name'];
	$fileSize=$path['file_size'];
	$date = date("Y-m-d H:i:s");
	$businessId=$this->session->userdata('businessId');
	
	if($this->input->post('active')=="ON")
	{
	$ACTIVE='ON';
	}
	else
	{
	$ACTIVE='OFF';
	}
	$data=array(                   
	    'businessId'  =>  $businessId,
	    'name'   =>  $fileName,
	    'link'   => base_url("upload/gallery/".$fileName) ,
	     'active'   =>  $ACTIVE,
	     'size'=>$fileSize,
	     'createdTime'  =>  $date,
	);
	//echo '<pre>';
	//print_r($data);
	//echo '</pre>';
	//exit();
	$this->db->insert('gallery',$data);               
    }
    public function record_count() {
        return $this->db->count_all("gallery");
    }
    
    public function getImageEdit($id)
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId); 
	$this->db->where('id', $id); 
	return $this->db->get('gallery')->result_array();
    }
    public function getImageList()
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId); 
	return $this->db->get('gallery')->result_array();
    }
    
    public function fetch_data($limit, $start) {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId); 
        $this->db->limit($limit, $start);
        $query = $this->db->get("gallery");
 
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

//    function get_image()
//    {
//	
//	$query = $this->db->query("select link from gallery");
//	return $query->result_array();
//    }
//    public function did_get_faq_data($title)
//    {
//	$this->db->select('*');
//	$this->db->from('gallery');
//	$query = $this->db->get('name');
//	if ($query->num_rows() > 0){
//	return $query->result();
//	}
//	else {
//	return false;
//	}
//    }
	   
    function deleteImageListRow($code)
    {
	$businessId=$this->session->userdata('businessId');
	$this->db->where('businessId', $businessId); 
	$this->db->where('id', $code); 
	$this->db->delete('gallery');
    }
    
    
    // Admin USer Start
    
    function adminUserView()
    {
	$sql= $this->db->get("adminuser");
	return $sql->result_array();
    }
    
    function adminUserAdd()
    {
	$name     = $this->input->post('name');
	$email    = $this->input->post('email');
	$password = md5($this->input->post('password'));
	$data = array
	(
	    'name'     =>$name,
	    'email'    =>$email,
	    'password' =>$password
	);
	return $this->db->insert('adminuser',$data);
    }
    
    function adminUserEdit($id)
    {
	$this->db->where('id',$id);
	$sql= $this->db->get("adminuser");
	return $sql->result_array();
    }
    
    function adminUserUpdate($id)
    {
	$data = array
	(
	    'name'=>$this->input->post('name'),
	    'email'=>$this->input->post('email'),
	    'password'=>md5($this->input->post('password'))
	);
	$this->db->where('id',$id);
	return $this->db->update('adminuser',$data);  
    }
    
    function adminUserDelete($id)
    {
	$this->db->where('id',$id);
	$this->db->delete('adminuser'); 
    }
    //Admin User End
    
   
    
}

		