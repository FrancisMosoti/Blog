<?php

require_once "../inc/conn.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbpassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $state = $conn->prepare("SELECT * FROM posts where id = $id ORDER BY id DESC");
            $state->execute();

            // set the resulting array to associative
            $res= $state->setFetchMode(PDO::FETCH_ASSOC);
            $results = $state->fetchAll(PDO::FETCH_ASSOC);

        }

	  } catch(PDOException $e) {
		// echo "Error: " . $e->getMessage();
	  }
	  $conn = null;

      ?>