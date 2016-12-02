<?php
	require_once('reviewSys_fns.php');
	session_start();
	$star=$_POST["star"];
	$comment=$_POST["comment"];
	try
	{
		//check if the form is filled
		if( ! filled_out($_POST))
		{
			throw new Exception('You have not filled the form out correctly please go back and try again.');
		}
		//register($username, $email, $passwd,$fname,$lname);
		// register session variable
		if(validservice($_GET['service']))
		{
			$done=entercomm($star,$comment,$_SESSION['valid_user'],$_GET['service']);
		}
		do_html_header();
		do_html_option_user();
		if($done)
		{
			banner("Thank you:");
			echo "<h3>Your review is inserted</h3>";
		}
		else
		{
			banner("Problem:");
			echo "<h3>Unable to insert your review</h3>";
		}
		do_html_footer();
	}
	catch (Exception $e)
	{
		do_html_header('Problem:');
		do_html_option_user();
		banner("Problem:");
		echo $e->getMessage();
		do_html_footer();
		exit;
	}
?>
