<?php
require_once './update_my_location.php';
$response = array();


if($_SERVER['REQUEST_METHOD']=='POST'){


    if(isset($_POST['email']) && !empty($_POST['email'])
    and isset($_POST['latitude']) && ($_POST['latitude']!=="")
    and isset($_POST['longitude']) && !empty($_POST['longitude']) 
    and isset($_POST['postal_address']) && !empty($_POST['postal_address'])) 
   {

        $db= new update_my_location();

        if($db->update_location($_POST['email'],$_POST['latitude'],$_POST['longitude'],$_POST['postal_address']))
		{
            $response['error']=false;
			$response['message']="updated";
        }
        else{
            $response['error']=true;
			$response['message']="error";
        }

    }
    else{

    $response['error']=true;
    $response['message']="missing";
    }
}
else{

$response['error']=true;
$response['message']="error post";
}
echo json_encode($response);