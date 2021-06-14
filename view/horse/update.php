<?php
    if(isset($_GET["id"])){
        $horse= getTable("horse", $_GET["id"]);
        if(!$horse){
            echo "Paard bestaat niet";
        }
    }else{
        echo "Updaten mislukt";
    }

?>

<h2>Wijzig een paard:</h2>
    <br>
    <form method="post" action="<?=URL?>horse/editHorses".php>  
        <p><b>Paard is: </b><?= $horse["horse_name"] ?></p>
        <input type="hidden" name="id" value="<?php echo $horse["id"];?>">

        
        <p><b>Ras is: </b><?= $horse["horse_breed"] ?></p>

        <p><b>Leeftijd: </b><input type="text" name="horse_age" required="<?php echo $horse_age;?>" placeholder="Vul hier de leeftijd in"></p>

        <p><b>Springsport: </b><input type="text" name="jump" required="<?php echo $jump;?>" placeholder="ja/nee"></p>
            
        <button class="btn btn-primary" name="SubmitBtn2" value="confirm">Confirm</button>
    </form>