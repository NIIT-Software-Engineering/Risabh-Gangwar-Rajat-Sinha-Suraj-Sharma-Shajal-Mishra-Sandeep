<?php
	try
	{
		require_once('reviewSys_fns.php');
		session_start();
		do_html_header('profile :');
		do_html_option_user();
		banner("Profile:");
		$target_dir = "images/user/";
		$pos=strrpos($_FILES["fileToUpload"]["name"], '.', -1);
		$format=substr($_FILES["fileToUpload"]["name"],$pos);
		$target_file = $target_dir.$_SESSION['valid_user'].$format;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if(isset($_FILES["fileToUpload"]["name"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		



		if (file_exists($target_file)) {
    			unlink($target_file);
		}
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}	

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
    			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				//if(pic_default($_SESSION['valid_user']))
					change_pic($_SESSION['valid_user'].$format,$_SESSION['valid_user']);
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}


		}
		// Check if file already exists
		
		
		$info=display_user_info($_SESSION['valid_user']);
		display_info_form($info[0],$info[1],$info[2],$info[3],$info[4]);
		do_html_footer();
	}
	catch (Exception $e)
	{
		do_html_header('Problem:');
		echo $e->getMessage();
		do_html_footer();
		exit;
	}
?>
