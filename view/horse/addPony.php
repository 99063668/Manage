<h2>Pony beheer:</h2>
<br>
<form method="post" action="<?=URL?>horse/addPonys">  
    <p><b>Naam: </b><input type="text" name="pony_name" required value="<?php echo $pony_name;?>" placeholder="Vul hier de naam in"></p>

    <p><b>Ras: </b><input type="text" name="pony_breed" required value="<?php echo $pony_breed;?>" placeholder="Vul hier het ras in"></p>

    <p><b>Leeftijd: </b><input type="text" name="pony_age" required value="<?php echo $pony_age;?>" placeholder="Vul hier de leeftijd in"></p>

    <p><b>Schofthoogte: </b><input type="text" name="height" required value="<?php echo $height;?>" placeholder="Vul hier de schofthoogte in"></p>
    
    <button class="btn btn-primary" name="SubmitBtn2" value="confirm">Confirm</button>
</form>