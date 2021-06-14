<h2>Bezoeker beheer:</h2>
<br>
<form method="post" action="<?=URL?>home/addHomes">  
    <p><b>Naam: </b><input type="text" name="name" required="<?php echo $name;?>" placeholder="Vul hier uw naam in"></p>

    <p><b>Adres: </b><input type="text" name="adres" required="<?php echo $adres;?>" placeholder="Vul hier uw adres in"></p>

    <p><b>Telefoonnummer: </b><input type="text" name="phone" required="<?php echo $phone;?>" placeholder="Vul hier uw telefoonnummer in"></p>

    <p><b>Identificatienummer: </b><input type="text" name="numbers" required="<?php echo $numbers;?>" placeholder="Identificatienummer"></p>
    
    <button class="btn btn-primary" name="SubmitBtn" value="confirm">Confirm</button>
</form>