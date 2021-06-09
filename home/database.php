<?php 

	$hostname 	= 'mariadb';
	$username 	= 'nakun';
	$pass 		= '354900';
	$dbname 	= 'oniyuni';

	$link = new mysqli($hostname,$username,$pass,$dbname);
	

	if ($link->connect_errno) {
		printf('faild database connect',$link->connect_errno);
		exit();
	}

?>