<?php
    if(isset($_GET["id"])){
        $reservering= getTable("reservering", $_GET["id"]);
        if(!$guest){
            
        }else{
            echo "Updaten mislukt";
        }
    }

    $detail = getTable("reservering", $_GET["id"]);
?>

<h2>Wijzig een guest:</h2>
    <br>
    <form method="post" action="<?=URL?>guest/editReserverings">  
        <p><b>Guest is: </b><?= $reservering["guest_name"] ?></p>
        <input type="hidden" name="id" value="<?php echo $reservering["id"];?>">

        <p><b>Tijdstip: </b><input type="time" name="times" required value="<?php echo $times;?>" placeholder="Vul hier het tijdstip in" value="<?php echo $detail["times"]?>"></p>

        <p><b>Paard is: </b><input type="text" name="horse" required="<?php echo $horse;?>" placeholder="Vul hier het paard in" value="<?php echo $detail["horse"]?>"></p>

        <p><b>Prijs is: </b>€55,-</p>
            
        <button class="btn btn-primary" name="SubmitBtn2" value="confirm">Confirm</button>
    </form>