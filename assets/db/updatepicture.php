<?php
session_start();
function change_profile_img($user, $file_temp, $file_ext){
	//session_start();
	include('db_config.php');
	$file_path = '../../profilePictures/' .substr(md5(time()), 0,10). '.'.$file_ext;
	move_uploaded_file($file_temp, $file_path);
	$db_file_path = substr($file_path,6);
	//$user = $_SESSION['currentUser'];
	if($update = $db->query("UPDATE users SET img='$db_file_path' WHERE fullname='$user'")){
		$db->query("UPDATE userwall SET img='$db_file_path' WHERE name='$user'");
		$_SESSION['img'] = $db_file_path;
		echo 'Success!';
		header('Location: ../../userarea?status=success');
	}else{
		echo 'There was a problem uploading your picture.  Please try again!  If problem presist please contact justin@lofbc.org';
	}
}

if(isset($_FILES['upload']) === true ){
	if(empty($_FILES['upload']['name']) === true){
		echo "please upload a file!";
	}else{
		$allowed = array('jpg', 'jpeg', 'gif', 'png');
		$user = $_SESSION['currentUser'];
		$file_name = $_FILES['upload']['name'];
		$file_ext = strtolower(end(explode('.', $file_name)));
		$file_temp = $_FILES['upload']['tmp_name'];
		if (in_array($file_ext, $allowed) === true){
			change_profile_img($_SESSION['currentUser'], $file_temp, $file_ext);
		} else {
			echo 'Incorrect file type.  Allowed: ';
			echo implode(', ', $allowed);
		}
	}
}

?>