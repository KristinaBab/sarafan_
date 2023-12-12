<?php
	$driver ='mysql';
	$db_host = "127.0.0.1";
	$db_user = "root";
	$db_password = "";
	$db_database = "sarafan";
	$options=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

	try{
		$pdo = new PDO(
			"$driver:host=$db_host; dbname=$db_database", $db_user , $db_password , $options
		);

	}catch (PDOException $i){
		die("Соединение не удалось:");
	}

// $mysqli = new mysqli($db_host, $db_user, $db_password, $db_database);
	
// 	if ($mysqli -> connect_error) {
// 		printf("Соединение не удалось: %s\n", $mysqli -> connect_error);
// 		exit();
// 	};

	


