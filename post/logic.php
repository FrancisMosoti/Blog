<?php

require "conn.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$statement = $conn->prepare("SELECT * FROM posts");
		$statement->execute();
	  
		// set the resulting array to associative
		$result = $statement->setFetchMode(PDO::FETCH_ASSOC);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

	  } catch(PDOException $e) {
		// echo "Error: " . $e->getMessage();
	  }
	  $conn = null;

      ?>