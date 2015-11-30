<?php 

	try {

		$con = new PDO("mysql: host=localhost; dbname=trab_renan","root","root");
		
	} catch (PDOException $e) {

		echo $e->getMessage();
		
	}
 ?>