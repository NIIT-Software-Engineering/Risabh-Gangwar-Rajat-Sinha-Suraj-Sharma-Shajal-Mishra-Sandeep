<?php
	function display_user_info($username)
	{
		$conn = db_connect();
		$result = $conn->query("select username,email,firstname,lastname,photo from user where username='".$username."'");
		if (!$result)
		{
			return false;
		}
		//create an array of the services
		$url_array = array();
		$row = $result->fetch_row();
			$url_array[0] = $row[0];
			$url_array[1] = $row[1];
			$url_array[2] = $row[2];
			$url_array[3] = $row[3];
			$url_array[4] = $row[4];
		return $url_array;
	}

	function get_services($username) {
		//extract from the database all the URLs this user has stored
		$conn = db_connect();
		$result = $conn->query("select id,photo,service_name from services");
		if (!$result)
		{
			return false;
		}
		//create an array of the services
		$url_array = array();
		for ($count = 1; $row = $result->fetch_row(); ++$count) {
			$url_array[$count][0] = $row[0];
			$url_array[$count][1] = $row[1];
			$url_array[$count][2] = $row[2];	
		}
		return $url_array;
	}

	function getreview($service,$user)
	{
		$conn = db_connect();
		$result = $conn->query("select reason from review where username='".$user."' and service='".$service."'");
		if (!$result)
		{
			return '';
		}
		$row=$result->fetch_row();
		if($row)
		{
			return $row[0];
		}
	}

	function get_service($id) {
		//extract from the database all the URLs this user has stored
		$conn = db_connect();
		$result = $conn->query("select service_name from services where id=".$id);
		if (!$result)
		{
			return false;
		}
		
		$row=$result->fetch_row();
		if($row)
		{
			return $row[0];
		}
	}

	function get_image_service($id)
	{
		$conn = db_connect();
		$result = $conn->query("select photo from services where id=".$id);
		if (!$result)
		{
			return '';
		}
		$row=$result->fetch_row();
		if($row)
			return $row[0];
	}

	function get_review($star,$service)
	{
		//extract from the database all the URLs this user has stored
		$conn = db_connect();
		$result = $conn->query("select username,reason from review where service='".$service."' AND star=".$star);
		if (!$result)
		{
			return false;
		}
		//create an array of the services
		$url_array = array();
		for ($count = 1; $row = $result->fetch_row(); ++$count) {
			$url_array[$count][0] = $row[0];
			$url_array[$count][1] = $row[1];	
		}
		return $url_array;
	}

	function get_average_service($id)
	{
		$conn = db_connect();
		$result = $conn->query("SELECT AVG(star) FROM review where id=".$id);
		//select  from services where id=".$id);
		if (!$result)
		{
			return 'none';
		}
		$row=$result->fetch_row();
		if($row)
			return $row[0];
	}

	function entercomm($star,$comment,$user,$service)
	{
		$conn = db_connect();

		$result = $conn->query("select * from review where username='".$user."' AND service='".$service."'");
		if(! $result->fetch_row())
		{
			$result = $conn->query("INSERT INTO review (username,star,reason,service) VALUES ('".$user."',".$star.",'".$comment."','".$service."')");
		}
		else
		{
			$result = $conn->query("update review set star=".$star.",reason='".$comment."' where username='".$user."' and service='".$service."'");
		}
		if($result)
			return true;
		else
			return false;
	}
	function validservice($service)
	{
		$conn = db_connect();
		$result = $conn->query("select * from services where service_name='".$service."'");
		if (!$result)
		{
			return false;
		}
		return true;
	}
?>
