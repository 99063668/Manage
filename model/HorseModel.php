<?php
	//haalt 1 paard/pony op uit de database
	function getTable($table, $id){
		$conn = openDatabase();

		$id = intval($id);
		if (($table == "horse" || $table == "pony") && isset($id) && !empty($id) && is_numeric($id)) {
			$query = $conn->prepare("SELECT * FROM `$table` WHERE id = :id");
			$query->bindParam(":id", $id);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_ASSOC);

			return $result;
		}
	}

	//Haalt alle paarden op uit de database
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

	//Haalt alle pony's uit de database op
	function getAllPony(){
		try {
			$conn=openDatabaseConnection();
			$stmt = $conn->prepare("SELECT * FROM pony");
			$stmt->execute();
			$result = $stmt->fetchAll();
	
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
	
		$conn = null;
		return $result;
	}

	//Voegt een paard toe aan de database
	function addHorse($data){
        $conn = openDatabaseConnection();

        if(!empty($data) && isset($data)){
            if (isset($data["horse_name"]) && !empty($data["horse_name"]) && isset($data["horse_breed"]) && !empty($data["horse_breed"]) && isset($data["horse_age"]) && !empty($data["horse_age"]) && isset($data["jump"]) && !empty($data["jump"])) {
                $stmt = $conn->prepare("INSERT INTO plannings(horse_name, horse_breed, horse_age, jump, players) VALUES (:horse_name, :horse_breed, :horse_age, :jump)");
                $stmt->bindParam(":horse_name", $data["horse_name"]);
                $stmt->bindParam(":horse_breed", $data["horse_breed"]);
                $stmt->bindParam(":horse_age", $data["horse_age"]);
                $stmt->bindParam(":jump", $data["jump"]);
                $stmt->execute();

                return $data;
            }
        }else{
            echo("error empty post game bij function controle.");
        }
    }

       // Verwijderd 1 paard uit de database
       function deleteHorse($id){
        $conn = openDatabaseConnection();
        $id = intval($id);
        $check = getTable("horse", $id);

        if (!empty($id) && isset($id) && is_numeric($id) && !empty($check) && isset($check)){
            $stmt = $conn->prepare("DELETE FROM horse WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute(); 
        } 
    }

	//Controlleert de input
	function controle(){
        $data = [];

        if(!empty($_POST["horse_name"])){
            $horse_name = trimdata($_POST["horse_name"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $horse_name)){
                echo("Alleen letters en spaties zijn toegestaan!");
            }else{
                $data["horse_name"] = $horse_name;
            }
        }

        if(!empty($_POST["horse_breed"])){
            $horse_breed = trimdata($_POST["horse_breed"]);
            if(!preg_match("/^[a-zA-Z-' , ]*$/", $horse_breed)){
                echo("Alleen letters en spaties zijn toegestaan!");
            }else{
                $data["horse_breed"] = $horse_breed;
            }
        }
		
		if(!empty($_POST["horse_age"])){
            $horse_age = trimdata($_POST["horse_age"]);
            if(!preg_match("/[0-9]/", $horse_age)){
                echo("Alleen cijfers zijn toegestaan!");
            }else{
                $data["horse_age"] = $horse_age;
            }
        }

		if(!empty($_POST["jump"])){
            $jump = trimdata($_POST["jump"]);
            if(!preg_match("/^[a-zA-Z-' , ]*$/", $jump)){
                echo("Alleen letters en spaties zijn toegestaan!");
            }else{
                $data["jump"] = $jump;
            }
        }
        return $data;
    }

	//..
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (!empty($_POST["SubmitBtn"])) {
            $input = controle();
            addHorse($input);
		} elseif (!empty($_POST["Delete"])) {
            //Show confirm form
        } elseif (!empty($_POST["Delete2"])) {
            deleteGame($_GET["id"]);
            header("location: index.php");
        } elseif (!empty($_POST["Delete3"])) {
            header("location: index.php");
        }
	}
?>