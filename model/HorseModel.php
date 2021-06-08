<?php
//Functions voor de horse page
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
        $allExist = checkArrayExist($data);

        if(!empty($data) && isset($data)){
            if ($allExist) {
                try {
                    $stmt = $conn->prepare("INSERT INTO horse(horse_name, horse_breed, horse_age, jump) VALUES (:horse_name, :horse_breed, :horse_age, :jump)");
                    $stmt->bindParam(":horse_name", $data["horse_name"]);
                    $stmt->bindParam(":horse_breed", $data["horse_breed"]);
                    $stmt->bindParam(":horse_age", $data["horse_age"]);
                    $stmt->bindParam(":jump", $data["jump"]);
                    $stmt->execute();
                }
                catch(PDOException $e){
                    echo "Connection failed: " . $e->getMessage();
                }
            } else{
                echo "bij het invoegen in de database was niet alle data beschikbaar";
            }
        }else{
            echo "error empty post game bij function controle.";
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

	 //Controleert de input op verboden characters
     function trimdata($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //array = ["hoi", "dewi"];
    //keys = ["hond", "dewi"];
    function checkArrayExist($array, $keys = array("horse_name", "horse_breed", "horse_age", "jump")){
        $allExist = true;
        foreach ($keys as $entry) {
            if(!isset($array[$entry]) || empty($array[$entry])){
                $allExist = false;
                break;
            }
        }
        return $allExist;
    }


//Functions voor de guest + home page
//Haalt alle guest op uit de databse
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