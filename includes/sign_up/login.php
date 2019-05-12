<?php
require_once '../DbConnect.php';
class login{

	public $con;
	function __construct()
	{	

		$db = new DbConnect();
		$this->con= $db->connect();
	}


	 public function userLogin($email,$pass){
		$password=md5($pass);
		$query = "select email from new_user where email='$email' and password ='$password' ";
		$run = mysqli_query($this->con,$query);
		$data = mysqli_fetch_assoc($run);
		if(!empty($data))
		{
			return true;
		}
		else
		{
			return false;
		}


    }
    public function getUserDetails($email)
    {
        $query ="SELECT * FROM `new_user` WHERE email ='$email'";
        $run = mysqli_query($this->con,$query);
        return $run;
    }
	
}
