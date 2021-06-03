<?php
    $horses = getAllHorse();
    $ponys = getAllPony();
?>

<h1>Paarden beheren</h1>
<a href="/guest/add/1">Toevoegen</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Ras</th>
            <th scope="col">Leeftijd</th>
			<th scope="col">Springsport</th>
            <th scope="col">Beheer paarden</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach((array) $horses as $horse){
        ?>
        <tr>
            <td><?=$horse["horse_name"]?></td>
            <td><?=$horse["horse_breed"]?></td>
            <td><?=$horse["horse_age"]?></td>
			<td><?=$horse["jump"]?></td>
			<td><a href="/horse/update/1">Wijzigen</a> / <a href="/horse/delete/1">Verwijderen</a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<br>

<h1>Pony's beheren</h1>
<a href="/horse/addPony/1">Toevoegen</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Ras</th>
            <th scope="col">Leeftijd</th>
			<th scope="col">Schofthoogte </th>
            <th scope="col">Beheer pony's</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach((array) $ponys as $pony){
        ?>
        <tr>
            <td><?=$pony["pony_name"]?></td>
            <td><?=$pony["pony_breed"]?></td>
            <td><?=$pony["pony_age"]?></td>
			<td><?=$pony["height"]?></td>
			<td><a href="/horse/updatePony/1">Wijzigen</a> / <a href="/horse/deletePony/1">Verwijderen</a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
