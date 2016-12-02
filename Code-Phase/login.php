<?php
	require_once('reviewSys_fns.php');
	session_start();
	if($_SESSION['valid_user'])
		header("Location: index.php");
	do_html_header('Login :');
	do_html_option_log();
	banner("Login: ");
	//display_site_info();
	display_login_form();
	do_html_footer();
?>
