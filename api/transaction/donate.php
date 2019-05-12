<?php

class donate{
    public $con;

    function __construct()
    {
        require_once '../DbConnect.php';
        $db = new DbConnect();
        $this->con= $db->connect();

    }

    function add_transaction($user_id,$ngo_id,$amount,$date){


            $query = "INSERT INTO `transaction`(`t_id`, `user_id`, `ngo_id`, `amount`, `date`) 
                      VALUES(NULL, '$user_id','$ngo_id','$amount', '$date')";
            $run=mysqli_query($this->con, $query);

            $query2 = "UPDATE `ngo` SET `fund`= fund + '$amount' WHERE `ngo_id`='$ngo_id' ";
            $run2 =mysqli_query($this->con, $query2);


            if($run2){
                return 1;
            }
            else{
                return 2;
            }
    }

}