<?php
require_once '../DbConnect.php';
class nearBy_Donor_listing{

    public $con;
	function __construct()
	{	

		$db = new DbConnect();
		$this->con= $db->connect();
	}

    public function getNearby_donors($latitude,$longitude)
    {
        $query = "SELECT *, 
        ( 3959 * acos( cos( radians('$latitude') ) * 
        cos( radians( latitude ) ) * 
        cos( radians( longitude ) - 
        radians('$longitude') ) + 
        sin( radians('$latitude') ) * 
        sin( radians( latitude ) ) ) ) 
        AS distance FROM new_user HAVING distance < '519' ORDER BY distance ASC LIMIT 0, 10";

        $run = mysqli_query($this->con,$query); 
        return $run;
    }

    public function getNearby_donors_byInput($latitude,$longitude,$d)
    {
        $query = "SELECT *, 
        ( 3959 * acos( cos( radians('$latitude') ) * 
        cos( radians( latitude ) ) * 
        cos( radians( longitude ) - 
        radians('$longitude') ) + 
        sin( radians('$latitude') ) * 
        sin( radians( latitude ) ) ) ) 
        AS distance FROM new_user HAVING distance < '$d' ORDER BY distance ASC LIMIT 0, 10";

        $run = mysqli_query($this->con,$query); 
        return $run;
    }

    public function getNearby_donors_byBloodGroup($latitude,$longitude,$blood_group)
    {
        $query = "SELECT *, 
        ( 3959 * acos( cos( radians('$latitude') ) * 
        cos( radians( latitude ) ) * 
        cos( radians( longitude ) - 
        radians('$longitude') ) + 
        sin( radians('$latitude') ) * 
        sin( radians( latitude ) ) ) ) 
        AS distance FROM new_user  WHERE blood_group='$blood_group' HAVING distance < '519' ORDER BY distance ASC LIMIT 0, 10";

        $run = mysqli_query($this->con,$query); 
        return $run;
    }

    public function getNearby_donors_byBloodGroup_distance($latitude,$longitude,$blood_group,$distance)
    {
        $query = "SELECT *, 
        ( 3959 * acos( cos( radians('$latitude') ) * 
        cos( radians( latitude ) ) * 
        cos( radians( longitude ) - 
        radians('$longitude') ) + 
        sin( radians('$latitude') ) * 
        sin( radians( latitude ) ) ) ) 
        AS distance FROM new_user  WHERE blood_group='$blood_group' HAVING distance < '$distance' ORDER BY distance ASC LIMIT 0, 10";
        $run = mysqli_query($this->con,$query); 
        return $run;
    }
}