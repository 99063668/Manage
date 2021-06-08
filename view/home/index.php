<?php
	$guests = AllGuest();
?>

<h1>Alle bezoekers:</h1>
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
			<td><?=$guest["number"]?></td>
			<td><a href="/home/update/1">Wijzigen</a> / <a href="/home/delete/1">Verwijderen</a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

