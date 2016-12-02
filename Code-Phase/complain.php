<?php
	require_once('reviewSys_fns.php');
	session_start();
	if(! $_SESSION['valid_user'])
		header("Location: index.php");
	$service=get_service($_GET[id]);
	if(! $service)
		header("Location: overall_review.php");
	do_html_header($service.": complain");
	do_html_option_user();
	banner($service);
	$review=getreview($service,$_SESSION['valid_user']);
	do_review_form($service,$review);
	do_html_footer();
?>
