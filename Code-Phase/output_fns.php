<?php
	//show title and call top heading function
	function do_html_header($heading)
	{
		?>
			<html>
				<head>
					<title> <?php echo"$heading"; ?> </title>
					<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
					<link rel="stylesheet" href="star.css">
				</head>
				<body>
			<html class="no-js" lang="en">
				<head>
					<meta charset="utf-8">
					<title><?php echo"$heading"; ?></title>
					<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
					<link rel="stylesheet" href="star.css">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<link rel="stylesheet" href="assets/fonts/raphaelicons.css">
					<link rel="stylesheet" href="assets/css/styles.min.css">
					<script src="assets/js/libs/modernizr-2.5.2.min.js"></script>
				</head>
			<body>
				<header class="clearfix">
				<div class="container">
				<a id="logo" href="overall_review.php"><img src="images/LOGO.jpg" alt="logo" style="height:80px;"></a>
				<ul class="social-icons">
					<li><a href="https://www.facebook.com/Reviews-Management-System-RMS-1099867473444897/?__mref=message_bubble" class="icon flip">^</a></li>
					<li><a href="" class="icon">T</a></li>
					<li><a href="" class="icon">^</a></li>
				</ul>
		<?php
			/*if($heading)
				do_html_heading($heading);*/
	}

	function do_html_option_log()
	{
		?>
				<nav class="clearfix">
            				<ul role="navigation">
                				<li>
                				<a href="index.php" class="activePage"><span class="icon">S</span>Home</a>
                				</li>
                				<li>
                    				<a href="login.php"><span class="icon">Û</span>login</a>
                				</li>
                				<li>
							<a href="register_form.php"><span class="icon">E</span>signup</a>
                				</li>
                				<li>
                				    <a href="contact.php"><span class="icon">M</span>Contact us</a>
                				</li>
            					</ul>
        			</nav>
    				</div>
		<?php
	}
	
	function do_html_option_user()
	{
		?>
			<nav class="clearfix">
            			<ul role="navigation">
                			<li>
                				<a href="overall_review.php" class="activePage"><span class="icon">S</span>Home</a>
                			</li>
                			<li>
						<a href="profile.php"><span class="icon">E</span>Profile</a>
                			</li>
                			<li>
						<a href="contact.php"><span class="icon">M</span>Contact us</a>
                			</li>
					<li>
                    				<a href="logout.php"><span class="icon">Û</span>logout</a>
                			</li>
            				</ul>
        		</nav>
    		</div>
		<?php
	}
	function banner($line,$ifend=true)
	{
		?>
			</header>
			<section role="banner">
    				<header>
					<?php 
						if($line)
							echo "<h1>$line</h1>";
        					else
							echo "<h1><em>\"All it takes for problems to be solved is being heard.\"</em></h1>";?>
    				</header>
			<?php if($ifend) echo"</section>"; ?>
		<?php
	}
	//show heading
	function do_html_heading($title)
	{
		echo "<h2> $title </h2>";
	}
	function do_html_url($link,$value)
	{
		echo "<a href=$link>$value</a>";
	}
	//end the html file
	function do_html_footer()
	{
		?>
				</body>
			</html>
		<?php
	}

	function display_login_form()
	{
		?>
		
		<table style="margin:5% 30%">
			<form method="post" action="overall_review.php">
			<tr>
				<td>USERNAME</td>
				<td><input type=text name="username" maxlength=30></input></td>
			</tr>
			<tr>
				<td>PASSWORD</td>
				<td><input type=password name="password" maxlength=16></input></td>
			</tr>
			<tr>
				<td><input type=submit value="submit" /></td>
			</tr>
			</form>
		</table>
		<?php
	}
	function display_info_form($user,$email,$fname,$lname,$photo)
	{
		?>
		<table border="solid" style="margin:5% 30%">
			<tr>
				<td><img src="<?php echo $photo; ?>" alt="<?php echo $photo; ?>" style="height:100px;margin:10px 10px; "></td>
				<td>
					<form action="" method="post" enctype="multipart/form-data">
						<input type="file" name="fileToUpload" id="fileToUpload">
						<input type=submit value="submit" />
					</form>
				</td>
			</tr>
			<tr>
				<td>NAME</td>
				<td><?php echo $fname." ".$lname;?></td>
			</tr>
			<tr>
				<td>E-mail ID</td>
				<td><?php echo $email;?></td>
			</tr>
			<tr>
				<td>USERNAME</td>
				<td><?php echo $user;?></td>
			</tr>
			</form>
		</table>
		<?php
	}

	function display_signup_form()
	{
		?>
		
		<table style="margin:5% 30%">
			<form method="post" action="register_new.php">
			<tr>
				<td>FIRST NAME</td>
				<td><input type=text name="fname" maxlength=30></input></td>
				<td></td>
			</tr>
			<tr>
				<td>LAST NAME</td>
				<td><input type=text name="lname" maxlength=30></input></td>
			</tr>
			<tr>
				<td>E-mail ID</td>
				<td><input type=text name="email" maxlength=50></input></td>
			</tr>
			<tr>
				<td>USERNAME</td>
				<td><input type=text name="username" maxlength=30></input></td>
			</tr>
			<tr>
				<td>PASSWORD</td>
				<td><input type=password name="passwd1" maxlength=30></input></td>
			</tr>
			<tr>
				<td>RE-ENTER PASSWORD</td>
				<td><input type=password name="passwd2" maxlength=30></input></td>
			</tr>
			<tr>
				<td><input type=submit value="submit" /></td>
			</tr>
			</form>
		</table>
		<?php
	}

	function display_Services($services,$link)
	{
		foreach($services as $element)
		{
				echo "<div style=\"float:left; margin:15px 4%;\">
						<h3>$element[2]</h3>
						<a href=\"".$link."?id=$element[0]\"><img src=\"$element[1]\" alt=\"$element[2]\" style=\"width:304px	;height:228px;margin:10px 10px;\"></a>
				      </div>";
		}
	}

	function do_review_form($service,$reason)
	{
		?>
		<div class="stars" style="float:left; margin:5% 25%; width:50%;">
			<form method="post" action="enterreview.php?service=<?php echo $service; ?>">	
				<h3 style="margin:0% 10%;">Please give your Rating & Review</h3>
				<div style="float:left; margin:0% 30%;">
					
					<input class="star star-5" value=5 id="star-5" type="radio" name="star"/>
					<label class="star star-5" for="star-5"></label>
					<input class="star star-4" value=4 id="star-4" type="radio" name="star"/>
					<label class="star star-4" for="star-4"></label>
					<input class="star star-3" value=3 id="star-3" type="radio" name="star"/>
					<label class="star star-3" for="star-3"></label>
					<input class="star star-2" value=2 id="star-2" type="radio" name="star"/>
					<label class="star star-2" for="star-2"></label>
					<input class="star star-1" value=1 id="star-1" type="radio" name="star"  checked="checked"/>
					<label class="star star-1" for="star-1"></label>
				</div>
				<textarea rows="4" cols="80" name="comment" maxlength=200 style="margin-left:7%"><?php echo $reason; ?></textarea>
				<input  type=submit value="submit" style="float:left; margin:5% 40%;"/>
			</form>
		</div>
		<?php
	}

?>
