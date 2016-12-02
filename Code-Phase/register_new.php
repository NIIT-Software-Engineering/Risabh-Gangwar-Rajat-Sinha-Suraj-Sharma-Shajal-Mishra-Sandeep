<?php
	require_once('reviewSys_fns.php');
	session_start();
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$passwd=$_POST['passwd1'];
	$passwd2=$_POST['passwd2'];
	try
	{
		//check if the form is filled
		if( ! filled_out($_POST))
		{
			throw new Exception('You have not filled the form out correctly please go back and try again.');
		}
		if (!valid_email($email))
		{
			throw new Exception('That is not a valid email address. Please go back and try again.');
		}
		// passwords not the same
		if ($passwd != $passwd2)
		{
			throw new Exception('The passwords you entered do not match – please go back and try again.');
		}
		// check password length is ok
		// ok if username truncates, but passwords will get
		// munged if they are too long.
		if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
			throw new Exception('Your password must be between 6 and 16 characters. Please go back and try again.');
		}
		register($username, $email, $passwd,$fname,$lname);
		// register session variable
		$_SESSION['valid_user'] = $username;
		header("Location: overall_review.php");
		// provide link to members page
		//do_html_header('Registration successful');
		//echo 'Your registration was successful. Go to the members page to start setting up your bookmarks!';
		//do_html_url('member.php', 'Go to members page');
		// end page
		//do_html_footer();
	}
	catch (Exception $e)
	{
		do_html_header('Problem:');
		echo $e->getMessage();
		do_html_footer();
		exit;
	}
?>
