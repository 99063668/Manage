<?php
	$guests = AllGuest();
?>

<h1>Alle bezoekers:</h1>
<a href="<?=URL?>home/openForm">Bezoeker toevoegen</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Adres</th>
            <th scope="col">Telefoonnummer</th>
			<th scope="col">Uniek identificatienummer</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach((array) $guests as $guest){
        ?>
        <tr>
            <td><?=$guest["name"]?></td>
            <td><?=$guest["adres"]?></td>
            <td><?=$guest["phone"]?></td>
			<td><?=$guest["numbers"]?></td>
			
            <td><form action="<?=URL?>home/editForm2?id=<?= $guest["id"]?>"  method="post">
                <button class="btn btn-primary btn-sm" type="submit" name="Edit" value="Edit">Wijzigen</button>
            </form></td>

            <td><form action="<?=URL?>home/openDelete?id=<?= $guest["id"]?>" method="post">
            <button class="btn btn-primary btn-sm" type="submit" name="Delete" value="Delete">Verwijderen</button>
            </form></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

