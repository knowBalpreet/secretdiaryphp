<?php include ('connection.php'); ?>

<?php
	session_start();
	$query = "UPDATE testing set diary='".mysqli_real_escape_string($link,$_POST['diary'])."' WHERE id = '".$_SESSION['id']."' LIMIT 1 ";
	mysqli_query($link,$query);

?>