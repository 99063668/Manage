<?php
    if(isset($_GET["id"])){
        $reservering= getTable("reservering", $_GET["id"]);
        if(!$reservering){
            echo "Reservering bestaat niet";
        }
    }else{
        echo "Verwijderen mislukt";
    }
?>

<form action="<?=URL?>guest/deleteGuests?id=<?= $reservering["id"]?>" method="post">
    <label for="Confirm"><b>Are you sure you want to delete <?= $reservering["guest_name"]?>?</b></label>
    <button class="btn btn-success btn-sm" type="submit" name="Delete2" value="true">Yes</button>
    <button class="btn btn-danger btn-sm" type="submit" name="Delete3" value="false">Cancel</button>
</form>