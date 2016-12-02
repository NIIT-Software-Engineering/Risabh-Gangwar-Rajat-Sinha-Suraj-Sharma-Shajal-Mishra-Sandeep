<?php
	function register($username, $email, $password,$fname,$lname) {
		// connect to db
		$conn = db_connect();
		// check if username is unique
		$result = $conn->query("select * from user where username='".$username."'");
		if (!$result)
		{
			throw new Exception('Could not execute query');
		}
		if ($result->num_rows>0) {
			throw new Exception('That username is taken - go back and choose another one.');
		}
		// if ok, put in db
		$result = $conn->query("insert into user values ('".$username."', sha1('".$password."'), '".$email."','".$fname."', '".$lname."','images/user/0000.png')");
		if (!$result) {
			throw new Exception('Could not register you in database - please try again later.');
		}
		return true;
	}

	function pic_default($user)
	{
		$conn = db_connect();
		// check if username is unique
		$result = $conn->query("select photo from user where username='".$user."'");
		if (!$result)
		{
			throw new Exception('Could not execute query');
		}
		else
		{
			$get=$result->fetch_row();
			if($get[0]=='images/user/0000.png')
				return true;
			else
				return false;
		}
	}
	
	function change_pic($name,$user)
	{
		$conn = db_connect();
		// check if username is unique
		$result = $conn->query("update user set photo='images/user/".$name."' where username='".$user."'");
		if (!$result)
		{
			throw new Exception('Could not execute query');
		}
	}

	function login($username, $password) {
		// check username and password with db
		// if yes, return true
		// else throw exception
		// connect to db
		$conn = db_connect();
		// check if username is unique
		$result = $conn->query("select * from user where username='".$username."' and passwd = sha1('".$password."')");
		if (!$result)
		{
			throw new Exception('Could not log you in.');
		}
		if ($result->num_rows>0) {
			return true;
		} else {
			throw new Exception('Could not log you in.');
		}
	}
?>
