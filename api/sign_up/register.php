<?php
require_once './sign_up_operations.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

	if(isset($_POST['email']) && !empty($_POST['email'])
	    and isset($_POST['password']) && ($_POST['password']!=="")

        and isset($_POST['name']) && !empty($_POST['name'])
        and isset($_POST['gender']) && !empty($_POST['gender'])

        and isset($_POST['state']) && !empty($_POST['state'])
        and isset($_POST['city']) && !empty($_POST['city'])

        and isset($_POST['occupation']) && !empty($_POST['occupation'])
        and isset($_POST['mobile']) && !empty($_POST['mobile'])

        and isset($_POST['isMember']) && !empty($_POST['isMember'])
        and isset($_POST['donated']) && !empty($_POST['donated'])){


                $db= new sign_up_operations();



                $result = $db->CreateUser(
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['name'],
                    $_POST['gender'],
                    $_POST['state'],
                    $_POST['city'],
                    $_POST['occupation'],
                    $_POST['mobile'],
                    $_POST['isMember']==="yes"?1:0,
                    $_POST['donated']==="yes"?1:0);

                if($result==1){

                    header('Location: ../../index.php', true);

                    $response['message']="User Registered";
                }else if($result==2){
                    $response['error']=true;
                    $response['message']="Unsuccessfully registered";
                }else if($result==0){
                    $response['error']=true;
                    $response['message']="User exist";
                }

	}
	else{
		$response['error']=true;
		$response['message']="required fields missing";
	}

}
else{
	$response['error']=true;
	$response['message']="Invalid request";

}

echo json_encode($response);