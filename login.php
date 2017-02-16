<?php
	include ('connection.php');
	session_start();
	$error = "";

	if (@$_GET['logout'] == 1 AND @$_SESSION['id']) {
		session_destroy();
		$message = "You have been logged out. have a nice day!";
	}
	if (@$_POST['submit'] == 'Sign Up') {
		if (!$_POST['email'] ) $error .= "<br /> Please enter your email!";
		else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error.="<br /> Please enter a valid email address";
	
		if (!$_POST['password'] ) $error .= "<br /> Please enter your password!";
		else {
			if (strlen($_POST['password']) < 8) $error.=" <br /> Please enter a password of atleast 8 characters!";
			if (!preg_match('`[A-Z]`', $_POST['password'])) $error.=" <br /> Please enter atleast one capital letter in your password!";
		}
		if ($error) $error = "<br /> There were error(s) in your signup details:". $error;
		else{
			$query = "SELECT * from testing where email = '".mysqli_real_escape_string($link,$_POST['email'])."'";
			$result = mysqli_query($link,$query);
			$results = mysqli_num_rows($result);
			if ($results) $error = "That email address is already registered.Do you want to log in?";
			else{
				$query = "INSERT into testing(email,password) VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";
				if(mysqli_query($link,$query)){
				echo "You've Signed Up!";
				$_SESSION['id'] = mysqli_insert_id($link);
				// print_r($_SESSION);
				// die();
				// redirect to logged in page
				header('Location: mainpage.php');
			}
				else
					echo	mysqli_error($link);
			}
		}
	}

	if (@$_POST['submit'] == 'Log In') {
			$query = "SELECT * from testing where email = '".mysqli_real_escape_string($link,$_POST['loginemail'])."' and password = '".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' ";
			$result = mysqli_query($link,$query);
			$row = mysqli_fetch_array($result);
			if ($row) {
				$_SESSION['id'] = $row['id'];
				//REDIRECT TO LOGGED IN PAGE
				header('Location: mainpage.php');
			}else{
				$error = "We could not find a user with that email and password. Please try again!";
			}

	}


?>