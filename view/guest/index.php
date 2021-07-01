<?php
	$guests = getAllGuest();
?>
<h1>Een reservering plannen</h1>
<a href="<?=URL?>guest/openReserverings">Reserveren</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Bezoeker</th>
            <th scope="col">Tijdstip</th>
            <th scope="col">Paard/Pony</th>
			<th scope="col">Prijs</th>
            <th scope="col">Beheer reservering</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach((array) $guests as $guest){
        ?>
        <tr>
            <td><?=$guest["guest_name"]?></td>
            <td><?=$guest["times"]?></td>
            <td><?=$guest["horse"]?></td>
			<td>€55,-</td>
			
            <td><form action="<?=URL?>guest/editForm?id=<?= $guest["id"]?>" method="post">
                <button class="btn btn-primary btn-sm" type="submit" name="Edit" value="Edit">Wijzigen</button>
            </form></td>

            <td><form action="<?=URL?>guest/openDelete?id=<?= $guest["id"]?>" method="post">
            <button class="btn btn-primary btn-sm" type="submit" name="Delete" value="Delete">Verwijderen</button>
            </form></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
