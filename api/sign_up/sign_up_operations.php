<?php
class sign_up_operations{
	public $con;

	function __construct()
	{
		require_once '../DbConnect.php';
		$db = new DbConnect();
		$this->con= $db->connect();

	}

	function CreateUser($email,$pass,$name,$mobile,$blood_group,$latitude,$longitude,$postal_address,$age,$gender,$profile_pic)
	{
		if($this->isUserExist($email))
		{
			return 0;
		}
		else
		{
		$password = md5($pass);
		$query = "INSERT INTO `new_user`(`email`, `password`, `name`, `mobile`, 
				`blood_group`, `latitude`, `longitude`, `postal_address`,`age`,`gender`,`profile_pic`) 
		          VALUES ('$email','$password','$name','$mobile','$blood_group','$latitude','$longitude','$postal_address','$age','$gender','$profile_pic')";

		$run=mysqli_query($this->con,$query);
		if($run==true)
		{
			return 1;
		}
		else
		{
			return 2;
		}
	}
	}
	function isUserExist($email)
	{
		$query = "SELECT * FROM new_user where email='$email'";
		$run  = mysqli_query($this->con,$query);
		$data = mysqli_fetch_assoc($run);
		if(!empty($data))
			return true;
		else
		{
			return false;
		}
		
	}
}