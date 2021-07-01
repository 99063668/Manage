<?php
 //--------------------------------------------Common functions----------------------------------------------
	//haalt alles van 1 table op uit de database
	function getTable($table, $id){
		$conn = openDatabaseConnection();

		$id = intval($id);
		if (($table == "horse" || $table == "pony" || $table == "guest" || $table == "reservering") && isset($id) && !empty($id) && is_numeric($id)) {
			$stmt = $conn->prepare("SELECT * FROM `$table` WHERE id = :id");
			$stmt->bindParam(":id", $id);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

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

    //Haalt alle reserveringen op uit de databse
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

    //Haalt alle guest op uit de database
    function AllGuest(){
		try {
			$conn=openDatabaseConnection();
			$stmt = $conn->prepare("SELECT * FROM guest");
			$stmt->execute();
			$result = $stmt->fetchAll();
	
		}
		catch(PDOException $e){
			echo "Connection failed: " . $e->getMessage();
		}
		$conn = null;
		return $result;
	}

     //Check if array is true
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

     //Count price
    function optellenPrijs($animalPrice, $amountHorse){
        $animalPrice = 55;
        $amountHorse = intval($horse);

        if(!empty($amountHorse) && is_numeric($amountHorse)){
            $price = $animalPrice * $amountHorse;
            return $price;
        }
    }

    //--------------------------------------------Add functions----------------------------------------------
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
            echo "error empty post game bij function controle horse.";
        }
    }

    //Voegt een pony toe aan de database
	function addPony($data){
        $conn = openDatabaseConnection();
        $allExist = checkArrayExist($data, $keys = array("pony_name", "pony_breed", "pony_age", "height"));

        if(!empty($data) && isset($data)){
            if ($allExist) {
                try {
                    $stmt = $conn->prepare("INSERT INTO pony(pony_name, pony_breed, pony_age, height) VALUES (:pony_name, :pony_breed, :pony_age, :height)");
                    $stmt->bindParam(":pony_name", $data["pony_name"]);
                    $stmt->bindParam(":pony_breed", $data["pony_breed"]);
                    $stmt->bindParam(":pony_age", $data["pony_age"]);
                    $stmt->bindParam(":height", $data["height"]);
                    $stmt->execute();
                }
                catch(PDOException $e){
                    echo "Connection failed: " . $e->getMessage();
                }
            } else{
                echo "bij het invoegen in de database was niet alle data beschikbaar";
            }
        }else{
            echo "error empty post game bij function controle pony.";
        }
    }

    //Voegt een bezoeker toe aan de database
	function addHome($data){
        $conn = openDatabaseConnection();
        $allExist = checkArrayExist($data, $keys = array("name", "adres", "phone"));

        if(!empty($data) && isset($data)){
            if ($allExist) {
                try {
                    $stmt = $conn->prepare("INSERT INTO guest(name, adres, phone) VALUES (:name, :adres, :phone)");
                    $stmt->bindParam(":name", $data["name"]);
                    $stmt->bindParam(":adres", $data["adres"]);
                    $stmt->bindParam(":phone", $data["phone"]);
                    // $stmt->bindParam(":numbers", $data["numbers"]);
                    $stmt->execute();
                }
                catch(PDOException $e){
                    echo "Connection failed: " . $e->getMessage();
                }
            } else{
                echo "bij het invoegen in de database was niet alle data beschikbaar";
            }
        }else{
            echo "error empty post guest bij function controle home.";
        }
    }

   //Voegt een reservering toe aan de database
   function addReservering($data){
    $conn = openDatabaseConnection();
    $allExist = checkArrayExist($data, $keys = array("guest_name", "times", "horse"));

        if(!empty($data) && isset($data)){
            if ($allExist) {
                try {
                    $stmt = $conn->prepare("INSERT INTO reservering(guest_name, times, horse) VALUES (:guest_name, :times, :horse)");
                    $stmt->bindParam(":guest_name", $data["guest_name"]);
                    $stmt->bindParam(":times", $data["times"]);
                    $stmt->bindParam(":horse", $data["horse"]);
                    $stmt->execute();
                }
                catch(PDOException $e){
                    echo "Connection failed: " . $e->getMessage();
                }
            } else{
                echo "bij het invoegen in de database was niet alle data beschikbaar";
            }
        }else{
            echo "error empty post reservering bij function controle reservering.";
        }
    }

    //--------------------------------------------Update functions--------------------------------------------
     //Edit een paard uit de database
     function editHorse($data){
        $conn = openDatabaseConnection();
        $data["id"] = intval($data["id"]);
        $check = getTable("horse", $data["id"]);;
       
        if(!empty($data["id"]) && isset($data["id"]) && is_numeric($data["id"]) && !empty($check) && isset($check)){
            $query = $conn->prepare("UPDATE horse SET horse_age=:horse_age, jump=:jump  WHERE id=:id");
            $query->bindParam(":horse_age",  $data["horse_age"]);
            $query->bindParam(":jump",  $data["jump"]);
            $query->bindParam(":id", $data["id"]);
            $query->execute(); 
        }  
    }

    //Edit een pony uit de database
        function editPony($data){
        $conn = openDatabaseConnection();
        $data["id"] = intval($data["id"]);
        $check = getTable("pony", $data["id"]);;
        
        if(!empty($data["id"]) && isset($data["id"]) && is_numeric($data["id"]) && !empty($check) && isset($check)){
            $query = $conn->prepare("UPDATE pony SET pony_age=:pony_age, height=:height  WHERE id=:id");
            $query->bindParam(":pony_age",  $data["pony_age"]);
            $query->bindParam(":height",  $data["height"]);
            $query->bindParam(":id", $data["id"]);
            $query->execute(); 
        }  
    }

    //Edit een reservering uit de database
    function editReservering($data){
        $conn = openDatabaseConnection();
        $data["id"] = intval($data["id"]);
        $check = getTable("reservering", $data["id"]);
    
        if(!empty($data["id"]) && isset($data["id"]) && is_numeric($data["id"]) && !empty($check) && isset($check)){
            $query = $conn->prepare("UPDATE reservering SET times=:times, horse=:horse WHERE id=:id");
            $query->bindParam(":times",  $data["times"]);
            $query->bindParam(":horse",  $data["horse"]);
            $query->bindParam(":id", $data["id"]);
            $query->execute(); 
        }  
    }

    //Edit een guest uit de database
    function editGuest($data){
        $conn = openDatabaseConnection();
        $data["id"] = intval($data["id"]);
        $check = getTable("guest", $data["id"]);
        
        var_dump($data);

        if(!empty($data["id"]) && isset($data["id"]) && is_numeric($data["id"]) && !empty($check) && isset($check)){
            $query = $conn->prepare("UPDATE guest SET adres=:adres, phone=:phone WHERE id=:id");
            $query->bindParam(":adres",  $data["adres"]);
            $query->bindParam(":phone",  $data["phone"]);
            $query->bindParam(":id", $data["id"]);
            $query->execute(); 
        }  
    }

    //--------------------------------------------Delete functions--------------------------------------------
    // Verwijderd 1 paard uit de database
     function deleteHorse($id){
        $conn = openDatabaseConnection();
        $id = intval($id);
        $check = getTable("horse", $id);

        if (!empty($id) && isset($id) && is_numeric($id) && !empty($check) && isset($check)){
            try {
                $stmt = $conn->prepare("DELETE FROM horse WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            }
            catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }   
        } 
    }

    // Verwijderd 1 pony uit de database
   function deletePony($id){
        $conn = openDatabaseConnection();
        $id = intval($id);
        $check = getTable("pony", $id);

        if (!empty($id) && isset($id) && is_numeric($id) && !empty($check) && isset($check)){
            try {
                $stmt = $conn->prepare("DELETE FROM pony WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            }
            catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }   
        } 
    }

    // Verwijderd 1 reservering uit de database
   function deleteGuest($id){
        $conn = openDatabaseConnection();
        $id = intval($id);
        $check = getTable("reservering", $id);

        if (!empty($id) && isset($id) && is_numeric($id) && !empty($check) && isset($check)){
            try {
                $stmt = $conn->prepare("DELETE FROM reservering WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            }
            catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }   
        } 
    }

    // Verwijderd 1 guest uit de database
    function deleteHome($id){
        $conn = openDatabaseConnection();
        $id = intval($id);
        $check = getTable("guest", $id);

        if (!empty($id) && isset($id) && is_numeric($id) && !empty($check) && isset($check)){
            try {
                $stmt = $conn->prepare("DELETE FROM guest WHERE id = :id");
                $stmt->bindParam(":id", $id);
                $stmt->execute();
            }
            catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }   
        } 
    }

    //--------------------------------------------Controle functions--------------------------------------------
    //Controle de input van paarden
	function controle(&$errors){
        $data = [];

        if(!empty($_POST["id"])){
            $id = trimdata($_POST["id"]);
            if(empty($_POST["id"])){
                echo("Er is geen id meegegeven!");
            }else{
                $data["id"] = $id;
            }
        }

        if(!empty($_POST["horse_name"])){
            $horse_name = trimdata($_POST["horse_name"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $horse_name)){
                $errors["horse_name"] = "Alleen letters en spaties zijn toegestaan!";
            }else{
                $data["horse_name"] = $horse_name;
            }
        }

        if(!empty($_POST["horse_breed"])){
            $horse_breed = trimdata($_POST["horse_breed"]);
            if(!preg_match("/^[a-zA-Z-' , ]*$/", $horse_breed)){
                $errors["horse_breed"] = "Alleen letters en spaties zijn toegestaan!";
            }else{
                $data["horse_breed"] = $horse_breed;
            }
        }
		
		if(!empty($_POST["horse_age"])){
            $horse_age = trimdata($_POST["horse_age"]);
            if(!preg_match("/[0-9]/", $horse_age)){
                $errors["horse_age"] = "Alleen letters en spaties zijn toegestaan!";
            }else{
                $data["horse_age"] = $horse_age;
            }
        }

		if(!empty($_POST["jump"])){
            $jump = trimdata($_POST["jump"]);
            if($_POST["jump"] =="ja" || $_POST["jump"] =="nee"){
                $data["jump"] = $jump;
            }else{
               $errors["jump"] = "Alleen ja/nee toegestaan!";
            }
        }
        return $data;
    }
    //$_POST["jump"] !="ja" || !="nee" && 
    

    //Controlleert de input van pony's
	function controle2(){
        $data = [];

        if(!empty($_POST["id"])){
            $id = trimdata($_POST["id"]);
            if(empty($_POST["id"])){
                echo("Er is geen id meegegeven!");
            }else{
                $data["id"] = $id;
            }
        }

        if(!empty($_POST["pony_name"])){
            $pony_name = trimdata($_POST["pony_name"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $pony_name)){
                echo("Alleen letters en spaties zijn toegestaan!");
            }else{
                $data["pony_name"] = $pony_name;
            }
        }

        if(!empty($_POST["pony_breed"])){
            $pony_breed = trimdata($_POST["pony_breed"]);
            if(!preg_match("/^[a-zA-Z-' , ]*$/", $pony_breed)){
                echo("Alleen letters en spaties zijn toegestaan!");
            }else{
                $data["pony_breed"] = $pony_breed;
            }
        }
		
		if(!empty($_POST["pony_age"])){
            $pony_age = trimdata($_POST["pony_age"]);
            if(!preg_match("/[0-9]/", $pony_age)){
                echo("Alleen cijfers zijn toegestaan!");
            }else{
                $data["pony_age"] = $pony_age;
            }
        }

		if(!empty($_POST["height"])){
            $height = trimdata($_POST["height"]);
            if(!preg_match("/[0-9]/", $height)){
                echo("Alleen letters en spaties zijn toegestaan!");
            }else{
                $data["height"] = $height;
            }
        }
        return $data;
    }

    //Controlleert de input van reserveringen
	function controle3(){
        $data = [];

        if(!empty($_POST["id"])){
            $id = trimdata($_POST["id"]);
            if(empty($_POST["id"])){
                echo("Er is geen id meegegeven!");
            }else{
                $data["id"] = $id;
            }
        }

        if(!empty($_POST["guest_name"])){
            $guest_name = trimdata($_POST["guest_name"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $guest_name)){
                echo("Alleen letters en spaties zijn toegestaan!");
            }else{
                $data["guest_name"] = $guest_name;
            }
        }

        if(!empty($_POST["times"])){
            $times = trimdata($_POST["times"]);
            if(!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $times)){
                echo("Alleen letters en spaties zijn toegestaan!");
            }else{
                $data["times"] = $times;
            }
        }
		
		if(!empty($_POST["horse"])){
            $horse = trimdata($_POST["horse"]);
            if(!preg_match("/^[a-zA-Z-' , ]*$/", $horse)){
                echo("Alleen letters en spaties zijn toegestaan!");
            }else{
                $data["horse"] = $horse;
            }
        }

		if(!empty($_POST["price"])){
            $price = trimdata($_POST["price"]);
            if(!preg_match("/[0-9]/", $price)){
                echo("Alleen cijfers zijn toegestaan!");
            }else{
                $data["price"] = $price;
            }
        }
        return $data;
    }

    //Controlleert de input van guest
	function controle4(){
        $data = [];
        
        // if(!empty($_POST["id"])){
        //     $id = trimdata($_POST["id"]);
        //     if(empty($_POST["id"])){
        //         echo("Er is geen id meegegeven!");
        //     }else{
        //         $data["id"] = $id;
        //     }
        // }

        if(!empty($_POST["name"])){
            $name = trimdata($_POST["name"]);
            if(!preg_match("/^[a-zA-Z-' ]*$/", $name)){
                echo("Alleen letters en spaties zijn toegestaan!");
            }else{
                $data["name"] = $name;
            }
        }

        if(!empty($_POST["adres"])){
            $adres = trimdata($_POST["adres"]);
            if(!preg_match("/[A-Za-z0-9]+/", $adres)){
                echo("Alleen letters en spaties zijn toegestaan!");
            }else{
                $data["adres"] = $adres;
            }
        }
		
		if(!empty($_POST["phone"])){
            $phone = trimdata($_POST["phone"]);
            if(!preg_match("/[0-9]/", $phone)){
                echo("Alleen nummers zijn toegestaan!");
            }else{
                $data["phone"] = $phone;
            }
        }

		if(!empty($_POST["numbers"])){
            $numbers = trimdata($_POST["numbers"]);
            if(!preg_match("/[0-9]/", $numbers)){
                echo("Alleen nummers zijn toegestaan!"); 
            }else{
                $data["numbers"] = $numbers;
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
?>