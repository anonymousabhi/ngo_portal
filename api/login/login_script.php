<?php

session_start();
require_once './login.php';
$response = array();



if($_SERVER['REQUEST_METHOD']=='POST'){

	if(isset($_POST['email']) and isset($_POST['password'])){
		$db= new login();
		if($db->userLogin($_POST['email'],$_POST['password'])){


		    $response['error']=false;
            $response['message']="login successful";
            $result= $db->getUserDetails($_POST['email']);
            while($r =mysqli_fetch_assoc($result)){
                   $response['email']=$r['email'];
                   $response['name']=$r['name'];
                   $response['gender']=$r['gender'];
                   $_SESSION['user_id'] = $r["id"];
            }
            header('Location: ../../dashboard.php', true, $statusCode);
		}else {
			$response['error']=true;
			$response['message']="Wrong Credentials";
		}
	}
	else{
		$response['error']=true;
		$response['message']="required fields missing";
	}
}else{
	
	$response['error']=true;
	$response['message']="Invalid request";

}

echo json_encode($response);