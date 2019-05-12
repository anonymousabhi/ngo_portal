<?php
require_once './donate.php';
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_POST['user_id']) && !empty($_POST['user_id'])
        and isset($_POST['ngo_id']) && ($_POST['ngo_id']!=="")

        and isset($_POST['amount']) && !empty($_POST['amount'])){


        $db= new donate();



        $result = $db->add_transaction(
            $_POST['user_id'],
            $_POST['ngo_id'],
            $_POST['amount'],
            $_POST['date']);

        if($result==1){

            $response['message']="Transaction Successful";
            header('Location: ../../dashboard.php', true, $statusCode);


        }else if($result==2){
            $response['error']=true;
            $response['message']="Transaction Unsuccessful";
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