<?php

	$dsn = "mysql:host=localhost;dbname=foodhaus";

	try {
		$pdo = new PDO($dsn, 'root', '');
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}

?>