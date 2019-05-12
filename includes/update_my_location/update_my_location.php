<?php
require_once '../DbConnect.php';
class update_my_location{

	public $con;
	function __construct()
	{	

		$db = new DbConnect();
		$this->con= $db->connect();
    }

    public function update_location($email,$latitude,$longitude,$postaladdress)
    {
        $query = "update new_user set latitude='$latitude',longitude='$longitude',postal_address='$postaladdress' where email='$email'";
        $run = mysqli_query($this->con,$query);
        return $run;
    }
}