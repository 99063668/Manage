<h2>Paarden beheer:</h2>
<br>
<form method="post" action="<?=URL?>horse/addHorses">  
    <p><b>Naam: </b><input type="text" name="horse_name" required value="<?php echo $data["horse_name"];?>" placeholder="Vul hier de naam in"></p>
    <?php if(!empty($errors["horse_name"])){ ?>
        <p class="error"><?php echo $errors["horse_name"];?></p>
    <?php } ?>

    <p><b>Ras: </b><input type="text" name="horse_breed" required value="<?php echo $data["horse_breed"];?>" placeholder="Vul hier het ras in"></p>
    <?php if(!empty($errors["horse_breed"])){ ?>
        <p class="error"><?php echo $errors["horse_breed"];?></p>
    <?php } ?>

    <p><b>Leeftijd: </b><input type="text" name="horse_age" required value="<?php echo $data["horse_age"];?>" placeholder="Vul hier de leeftijd in"></p>
    <?php if(!empty($errors["horse_age"])){ ?>
        <p class="error"><?php echo $errors["horse_age"];?></p>
    <?php } ?>

    <p><b>Springsport: </b><input type="text" name="jump" required value="<?php echo $jump;?>" placeholder="ja/nee"></p>
    <?php if(!empty($errors["jump"])){ ?>
        <p class="error"><?php echo $errors["jump"];?></p>
    <?php } ?>
    
    <button class="btn btn-primary" name="SubmitBtn" value="confirm">Confirm</button>
</form>
