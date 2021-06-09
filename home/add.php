<?php 

	include 'database.php';

	$id 		= $_POST['id'];
	$username 	= $_POST['username'];
	$email 		= $_POST['email'];
	$pwd 		= $_POST['pwd'];

	$link->query("INSERT INTO users(id,username,email,pwd)VALUES('".$id."','".$username."','".$email."','".$pwd."')");













































	// include 'database.php';

	// $fistname = $_POST['fistname'];
	// $lastname = $_POST['lastname'];
	// $phone = $_POST['phone'];
	// $address = $_POST['address'];

	// $link->query("INSERT INTO person(fistname,lastname,phone,address)VALUES('".$fistname."','".$lastname."','".$phone."','".$address."')");

