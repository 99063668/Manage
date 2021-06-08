<?php
	$guests = getAllGuest();
?>
<h1>Een reservering plannen</h1>
<a href="/guest/add/1">Reserveren</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Bezoeker</th>
            <th scope="col">Begintijd</th>
            <th scope="col">Paard</th>
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
			<td>€<?=$guest["price"]?></td>
			<td><a href="/guest/update/1">Wijzigen</a> / <a href="/guest/delete/1">Verwijderen</a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
