<?php
    if(isset($_GET["id"])){
        $horse= getTable("horse", $_GET["id"]);
        if(!$horse){
            echo "Paard bestaat niet";
        }
    }else{
        echo "Paard bestaat niet";
    }
?>

<form action="<?=URL?>horse/addHorses?id=<?= $horse["id"]?>" method="post">
    <label for="Confirm"><b>Are you sure you want to delete<?= $horse["horse_name"]?>?</b></label>
    <button class="btn btn-success btn-sm" type="submit" name="Delete2" value="true">Yes</button>
    <button class="btn btn-danger btn-sm" type="submit" name="Delete3" value="false">Cancel</button>
</form>