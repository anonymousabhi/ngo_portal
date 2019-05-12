<?php
require_once './login.php';
$response = array();



if($_SERVER['REQUEST_METHOD']=='POST'){

	if(isset($_POST['email']) and 
	isset($_POST['password']))
	{

		$db= new login();
		if($db->userLogin($_POST['email'],$_POST['password']))
		{


            $response['error']=false;
            $response['message']="login sucessfull";
           $result= $db->getUserDetails($_POST['email']);
           while($r =mysqli_fetch_assoc($result))
           {
               $response['email']=$r['email'];
               $response['name']=$r['name'];
               $response['blood_group']=$r['blood_group'];
               $response['latitude']=$r['latitude'];
               $response['longitude']=$r['longitude'];
               $response['postal_address']=$r['postal_address'];
               $response['mobile']=$r['mobile'];
              
           }
           
			
		}
		else
		{
			$response['error']=true;
			$response['message']="Wrong Credentials";
		}
	}
	else
	{
		//echo "hii";
		$response['error']=true;
		$response['message']="required fields missing";
	}
}
else
{
	
	$response['error']=true;
	$response['message']="Inavlid request";

}
echo json_encode($response);