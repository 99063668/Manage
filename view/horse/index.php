<?php
    $horses = getAllHorse();
    $ponys = getAllPony();
?>

<h1>Paarden beheren</h1>
<a href="<?=URL?>horse/openForm">Paard toevoegen</a>
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

            <td><form action="<?=URL?>horse/editForm?id=<?= $horse["id"]?>"  method="post">
                <button class="btn btn-primary btn-sm" type="submit" name="Edit" value="Edit">Wijzigen</button>
            </form></td>

            <td><form action="<?=URL?>horse/openDelete?id=<?= $horse["id"]?>" method="post">
            <button class="btn btn-primary btn-sm" type="submit" name="Delete" value="Delete">Verwijderen</button>
            </form></td>

        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<br>

<h1>Pony's beheren</h1>
<a href="<?=URL?>horse/openForm2">Pony toevoegen</a>
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
			
            <td><form action="<?=URL?>horse/editForm2?id=<?= $pony["id"]?>"  method="post">
                <button class="btn btn-primary btn-sm" type="submit" name="Edit" value="Edit">Wijzigen</button>
            </form></td>

            <td><form action="<?=URL?>horse/openDelete2?id=<?= $pony["id"]?>" method="post">
            <button class="btn btn-primary btn-sm" type="submit" name="Delete" value="Delete">Verwijderen</button>
            </form></td>

        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
