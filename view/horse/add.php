<h2>Paarden beheer:</h2>
<br>
<form method="post" action="<?=URL?>horse/addHorses">  
    <p><b>Naam: </b><input type="text" name="horse_name" required value="<?php echo $horse_name;?>" placeholder="Vul hier de naam in"></p>

    <p><b>Ras: </b><input type="text" name="horse_breed" required value="<?php echo $horse_breed;?>" placeholder="Vul hier het ras in"></p>

    <p><b>Leeftijd: </b><input type="text" name="horse_age" required value="<?php echo $horse_age;?>" placeholder="Vul hier de leeftijd in"></p>

    <p><b>Springsport: </b><input type="text" name="jump" required value="<?php echo $jump;?>" placeholder="ja/nee"></p>
    
    <button class="btn btn-primary" name="SubmitBtn" value="confirm">Confirm</button>
</form>