<?php
	session_start();
	
	if(isset($_POST['submit'])){

		$uid		= $_POST['userid'];
		$password 	= $_POST['password'];

		if(empty($uid) || empty($password) ){
			echo "null submission found!";
		}else{
			
			$file  = fopen('mid.txt', 'r');
			while(!feof($file)){
				$data = fgets($file);
				$user = explode('|', $data);
				if($uid == trim($user[0]) && $password == trim($user[1])){
					$_SESSION['status'] = "OK";
					
					header('location: home.html');
				}
			}


			/* $file  = fopen('user.txt', 'r');
			$data  = fread($file, filesize('user.txt'));
			fclose($data);

			$user = explode('|', $data);

			if($uname == trim($user[0]) && $password == trim($user[1])){
				$_SESSION['status'] = "OK";
				header('location: home.php');
			}else{
				header('location: login.php?msg=invalid_username/password');
			} */
		}	

	}else{
		//echo "invalid request";
		header('location: login.php');
	}




?>