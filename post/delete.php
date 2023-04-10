<?php

require_once "../inc/conn.php";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbpassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        if(isset($_REQUEST['id'])){
            $id = $_REQUEST['id'];
            $state = $conn->prepare("DELETE FROM posts where id = $id");
            $state->execute();

            header("location:../home.php?delete=deleted");

        }

	  } catch(PDOException $e) {
		// echo "Error: " . $e->getMessage();
	  }
	  $conn = null;

      ?>