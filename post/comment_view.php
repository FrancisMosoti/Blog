<?php

require_once "../inc/conn.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbpassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $state = $conn->prepare("SELECT * FROM comments where post_id = $post_id");
            $state->execute();

            // set the resulting array to associative
            $res = $state->fetchAll(PDO::FETCH_ASSOC);

	  } catch(PDOException $e) {
		// echo "Error: " . $e->getMessage();
	  }
	  $conn = null;

      ?>