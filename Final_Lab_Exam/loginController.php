<?php
	session_start();

	require_once('../service/userService.php');

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		if(empty($username) || empty($password)){
			header('location: ../views/login.php?error=null');
		}else{

			$user = [
				'username'=>$username,
				'password'=>$password
			];

			$status = validate($user);
			$adCheck = adminCheck($user);

			if($status){
				if($adCheck){
					$_SESSION['username'] = $username;
					header('location: ../views/adminhome.php');

				}
				else
				{
				$_SESSION['username'] = $username;
				header('location: ../views/home.php');
			}
			}else{
				header('location: ../views/login.php?error=invalid');
			}
		}
		
	}
?>