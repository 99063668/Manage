<?php
    if(isset($_GET["id"])){
        $guest= getTable("guest", $_GET["id"]);
        if(!$guest){
            echo "Guest bestaat niet";
        }
    }else{
        echo "Updaten mislukt";
    }

    $detail = getTable("guest", $_GET["id"]);
?>

<h2>Wijzig een Bezoeker:</h2>
    <br>
    <form method="post" action="<?=URL?>home/editGuests".php>  
        <p><b>Bezoeker is: </b><?= $guest["name"] ?></p>
        <input type="hidden" name="id" value="<?php echo $guest["id"];?>">

        
        <p><b>Adres: </b><input type="text" name="adres" required="<?php echo $adres;?>" placeholder="Uw adres" value="<?php echo $detail["adres"]?>"></p>

        <p><b>Telefoonnummer: </b><input type="text" name="phone" required="<?php echo $phone;?>" placeholder="Uw telefoonnummer" value="<?php echo $detail["phone"]?>"></p>

        <p><b>Identificatienummer is: </b><?= $guest["numbers"] ?></p>
            
        <button class="btn btn-primary" name="SubmitBtn2" value="confirm">Confirm</button>
    </form>