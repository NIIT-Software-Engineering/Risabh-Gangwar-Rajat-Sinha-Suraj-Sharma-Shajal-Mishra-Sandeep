<?php
	require_once('reviewSys_fns.php');
	session_start();
	$username = $_POST['username'];
	$passwd = $_POST['password'];
	if ($username && $passwd) {
		// they have just tried logging in
		try {
			login($username, $passwd);
			// if they are in the database register the user id
			$_SESSION['valid_user'] = $username;
		}
		catch(Exception $e) {
			// unsuccessful login
			header("Location: login.php");
		}
	}
	if(! $_SESSION['valid_user'])
		header("Location: index.php");
	if($_SESSION['valid_user'] == 'ADMIN')
	{
		$link="complaint_pdf.php";
	}
	else
	{
		$link="complain.php";
	}
	//do_html_url('logout.php','logout');
	do_html_header("All services: ");
	do_html_option_user();
	banner("All Services:");
	
	$services = get_services($_SESSION['valid_user']);
	if($services)
		display_Services($services,$link);
	do_html_footer();
?>
