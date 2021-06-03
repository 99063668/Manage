<?php
	function getAllGuest(){
		// Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
		// mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
		// nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
		try {
			// Open de verbinding met de database
			$conn=openDatabaseConnection();
		
			// Zet de query klaar door middel van de prepare method
			$stmt = $conn->prepare("SELECT * FROM reservering");
	
			// Voer de query uit
			$stmt->execute();
	
			// Haal alle resultaten op en maak deze op in een array
			// In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
			// hier de fetchAll functie.
			$result = $stmt->fetchAll();
	
		}
		// Vang de foutmelding af
		catch(PDOException $e){
			// Zet de foutmelding op het scherm
			echo "Connection failed: " . $e->getMessage();
		}
	
		// Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
		// van de server opgeschoond blijft
		$conn = null;
	
		// Geef het resultaat terug aan de controller
		return $result;
	}
?>