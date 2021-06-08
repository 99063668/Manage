<?php
	function getAllGuest(){
		try {
			$conn=openDatabaseConnection();
			$stmt = $conn->prepare("SELECT * FROM reservering");
			$stmt->execute();
			$result = $stmt->fetchAll();
	
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		$conn = null;
		return $result;
	}
?>