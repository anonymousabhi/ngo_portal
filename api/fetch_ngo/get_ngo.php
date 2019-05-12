<?php
require_once 'api/DbConnect.php';
class getngo{

    public $con;
	function __construct()
	{	

		$db = new DbConnect();
		$this->con= $db->connect();
	}


    public function get_ngo_list()
    {
        $query = "SELECT * FROM ngo";
        $run = mysqli_query($this->con,$query); 
        return $run;
    }
}