<?php 

	$dbhost = 'localhost';
	$dbname = 'netology15';
	$username = 'root';
	$password = NULL;

	$newdb = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $username, $password);