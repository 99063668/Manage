<?php
    if(isset($_GET["id"])){
        $guest= getTable("guest", $_GET["id"]);
        if(!$guest){
            echo "Paard bestaat niet";
        }
    }else{
        echo "Verwijderen mislukt";
    }
?>

<form action="<?=URL?>home/deleteHomes?id=<?= $guest["id"]?>" method="post">
    <label for="Confirm"><b>Are you sure you want to delete <?= $guest["name"]?>?</b></label>
    <button class="btn btn-success btn-sm" type="submit" name="Delete2" value="true">Yes</button>
    <button class="btn btn-danger btn-sm" type="submit" name="Delete3" value="false">Cancel</button>
</form>