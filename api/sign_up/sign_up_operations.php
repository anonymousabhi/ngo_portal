<?php
class sign_up_operations{
	public $con;

	function __construct()
	{
		require_once '../DbConnect.php';
		$db = new DbConnect();
		$this->con= $db->connect();

	}

	function CreateUser($email,$pass,$name,$gender, $state, $city, $occupation, $mobile, $isMember, $donated){
		if($this->isUserExist($email)){
			return 0;
		}else{
            $password = md5($pass);

            $query = "INSERT INTO `user`(`id`, `email`, `password`, `name`, `gender`, `city`, `state`, `occupation`, `is_member`, `has_donated`, `mobile`) 
                      VALUES(NULL, '$email','$password','$name','$gender','$city','$state','$occupation','$isMember','$donated','$mobile')";

            $run=mysqli_query($this->con, $query);
            if($run==true){
                return 1;
            }
            else{
                return 2;
            }
	    }
	}
	function isUserExist($email){
		$query = "SELECT * FROM `user` where email='$email'";
		$run  = mysqli_query($this->con, $query);
		$data = mysqli_fetch_assoc($run);
		if(!empty($data))
			return true;
		else{
			return false;
		}
		
	}
}