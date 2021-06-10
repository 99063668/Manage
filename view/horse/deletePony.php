<?php
    if(isset($_GET["id"])){
        $pony= getTable("pony", $_GET["id"]);
        if(!$pony){
            echo "Pony bestaat niet";
        }
    }else{
        echo "Verwijderen mislukt";
    }
?>

<form action="<?=URL?>horse/deletePonys?id=<?= $pony["id"]?>" method="post">
    <label for="Confirm"><b>Are you sure you want to delete <?= $pony["pony_name"]?>?</b></label>
    <button class="btn btn-success btn-sm" type="submit" name="Delete2" value="true">Yes</button>
    <button class="btn btn-danger btn-sm" type="submit" name="Delete3" value="false">Cancel</button>
</form>