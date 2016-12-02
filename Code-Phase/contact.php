<?php
	require_once('reviewSys_fns.php');
	session_start();
	do_html_header('Contact us');
	if($_SESSION["valid_user"])
		do_html_option_user();
	else
		do_html_option_log();
	banner("Contact us",false);
	echo "<article role=\"main\" class=\"clearfix contact\">
           <div class=\"post\">
             <h2>Review Management System</h2>
             	<p><span class=\"icon\">[</span>:<br />
                <span class=\"icon\">M</span>: <a href=\"mailto:surajp.sharma@st.niituniversity.in\">surajp.sharma@st.niituniversity.in</a></p>
             <p>Members</p>
		 <ul>
 			<li>Sandeep Kumar</li>
  			<li>Suraj Praksh Sharma</li>
			<li>Rajat Sinha</li>
  			<li>Rishabh Gangwar</li>
			<li>Sajal Kumar Mishra</li>
		</ul> 
           </div>
           <div class=\"g-map\"><img src=\"images/group.jpg\" alt=\"G Map\" style=\"width:400px;\" /></div>
       </article></section>";
	do_html_footer();
?>
