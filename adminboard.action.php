<?php
	session_start();
	unset($_SESSION['login']);
	$user_id = "";
	if(isset($_SESSION['login'])):
		$user_id = $_SESSION['login'];
	endif;
	if(isset($_POST['title'])):
		$title = $_POST['title'];
	else:
		$title = "I am empty";
	endif;
	if(isset($_POST['comment'])):
		$comment = $_POST['comment'];
	else:
		$comment = "I am probably empty";
	endif;
	$connection = new mysqli('localhost', 'root', '', 'anime');
 	if($_GET['case'] == "create"):
 		$query = "insert into 'adminboard'(title, comment, user_id) values
		('$title', '$comment', '$user_id')";
		mysqli_query($connection, $query);
	else:
		$query = "select date, user_id, title, comment from adminboard";
		$result = $connection->query($query);
		$pins = $result->fetch_all(MYSQLI_ASSOC);
 	endif;	