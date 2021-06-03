<?php
	function getAllHorse(){
		try {
			$conn=openDatabaseConnection();
			$stmt = $conn->prepare("SELECT * FROM horse");
			$stmt->execute();
			$result = $stmt->fetchAll();
	
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		$conn = null;
		return $result;
	}

	function getAllPony(){
		try {
			$conn=openDatabaseConnection();
			$stmt = $conn->prepare("SELECT * FROM pony");
			$result = $stmt->fetchAll();
	
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
	
		$conn = null;
		return $result;
	}
?>