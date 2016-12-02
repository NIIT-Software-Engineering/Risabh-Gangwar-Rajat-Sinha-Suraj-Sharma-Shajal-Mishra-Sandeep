<?php
	require_once('reviewSys_fns.php');
	session_start();
	do_html_header('Main Page :');
	if($_SESSION['valid_user'])
	{
		do_html_option_user();
		banner();
		do_html_footer();
		//header("Location: overall_review.php");
	}
	else
	{
		do_html_option_log();
		banner();
		do_html_footer();
		//header('Location: login.php');
	}
?>
