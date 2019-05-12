<?php

require_once 'api/fetch_ngo/get_ngo.php';
$response = array();



    if(true){
        $db= new getngo();
       
        $result = $db->get_ngo_list();

        while($r =mysqli_fetch_assoc($result)){
            $response[]=$r;
        }

    }

    else{
		$response['error']=true;

	}


$result = json_encode($response);