<?php
	$horses = getAllHorse();
	$ponys = getAllPony();
?>

<h2>Maak een reservering:</h2>
<br>
<form method="post" action="<?=URL?>guest/addReserverings">  
    <p><b>Naam: </b><input type="text" name="guest_name" required value="<?php echo $guest_name;?>" placeholder="Vul hier uw naam in"></p>

    <p><b>Tijdstip: </b><input type="time" name="times" required value="<?php echo $times;?>" placeholder="Vul hier het tijdstip in"></p>

    <p><b>Dier: </b><input type="text" name="horse" required value="<?php echo $horse;?>" placeholder="Vul hier de naam in"></p>
    
    <button class="btn btn-primary" name="SubmitBtn3" value="confirm">Confirm</button>
</form>

<h2>Lijst met paarden/pony's:</h2>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Naam paarden</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach((array) $horses as $horse){
        ?>
        <tr>
            <td><?=$horse["horse_name"]?></td>
        </tr>
        <?php
            }
        ?>
        <th scope="col">Naam pony's</th>
        <?php
            foreach((array) $ponys as $pony){
        ?>
        <tr>
            <td><?=$pony["pony_name"]?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
