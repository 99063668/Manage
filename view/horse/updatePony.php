<?php
    if(isset($_GET["id"])){
        $pony= getTable("pony", $_GET["id"]);
        if(!$pony){
            echo "Pony bestaat niet";
        }
    }else{
        echo "Updaten mislukt";
    }

?>

<h2>Wijzig een pony:</h2>
    <br>
    <form method="post" action="<?=URL?>horse/editPonys".php>  
        <p><b>Pony is: </b><?= $pony["pony_name"] ?></p>
        <input type="hidden" name="id" value="<?php echo $pony["id"];?>">

        
        <p><b>Ras is: </b><?= $pony["pony_breed"] ?></p>

        <p><b>Leeftijd: </b><input type="text" name="pony_age" required="<?php echo $pony_age;?>" placeholder="Vul hier de leeftijd in"></p>

        <p><b>Schofthoogte: </b><input type="text" name="height" required="<?php echo $height;?>" placeholder="Vul hier de schofthoogte in"></p>
            
        <button class="btn btn-primary" name="SubmitBtn3" value="confirm">Confirm</button>
    </form>