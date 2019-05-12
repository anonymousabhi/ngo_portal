<?php
require_once './sign_up_operations.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

	if(isset($_POST['email']) && !empty($_POST['email'])
	 and isset($_POST['password']) && ($_POST['password']!=="")
	 and isset($_POST['name']) && !empty($_POST['name']) 
	 and isset($_POST['mobile']) && !empty($_POST['mobile']) 
	and isset($_POST['blood_group']) && !empty($_POST['blood_group']) 
	and 
	isset($_POST['latitude']) && !empty($_POST['latitude']) 
	and isset($_POST['longitude']) && !empty($_POST['longitude']) 
	and isset($_POST['postal_address']) && !empty($_POST['postal_address'])
	and  isset($_POST['age']) && !empty($_POST['age']) 
	and  isset($_POST['postal_address']) && !empty($_POST['postal_address'])
	and  isset($_POST['image']) && !empty($_POST['image']))
	{
		//echo "hiii shiv";

	$image = $_POST["image"];
	$name =$_POST['email'];
	
	$upload_path = "dp/$name.jpg";

	
		file_put_contents($upload_path,base64_decode($image));

		$db= new sign_up_operations();
		// $x = $_POST['email'].".jpg";
		// $imagename = $_FILES['lab_logo']['name'];//storing file name
		// $tempimagename = $_FILES['lab_logo']['tmp_name'];
		// move_uploaded_file($tempimagename, "profile_pic/$x");
	
		$result = $db->CreateUser(
			$_POST['email'],
			$_POST['password'],
			$_POST['name'],
			$_POST['mobile'],
			$_POST['blood_group'],
			$_POST['latitude'],
			$_POST['longitude'],
			$_POST['postal_address'],
			$_POST['age'],
			$_POST['gender'],
			$name);
		if($result==1)
		{
			// session_start();
			// $_SESSION['email']=$_POST['email'];
			// header('Location: ../../dash/index.php' , true, $statusCode);
			// $response['error']=false;
			$response['message']="User Registered";
		}
		else if($result==2)
		{

			$response['error']=true;
			$response['message']="Unsuccessfully registered";
		}

		else if($result==0)
		{
			$response['error']=true;
			$response['message']="User exist";

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