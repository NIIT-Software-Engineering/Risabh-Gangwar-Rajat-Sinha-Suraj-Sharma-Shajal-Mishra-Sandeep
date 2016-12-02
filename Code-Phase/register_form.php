<?php
	require_once('reviewSys_fns.php');
	//display_site_info();
	if($_SESSION['valid_user'])
		header("Location: index.php");
	do_html_header('signup :');
	do_html_option_log();
	banner("Sign up:");
	display_signup_form();
	do_html_footer();
?>
