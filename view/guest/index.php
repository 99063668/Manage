<?php
	// maak een overzicht lijst van ALLE personen
	$guests = getAllGuest();
?>
<h1>Overzicht van bezoekers</h1>
<?php
	foreach ($guests as $guest) {
?>
	<ul>
		<li>
			<span><?=$guest["name"]?> is <?=$guest["age"]?> jaar</span>
		</li>
	</ul>

<?php	
	}
?>
<a href="/guest/update/1">Wijzigen</a> <a href="/guest/delete/1">Verwijderen</a>

<?php
// de opbouw van de link bepaald welke method in welke controller aangeroepen wordt.
// het woordje "employee" in de url betekent dat het framework moet zoeken naar een controller genaamd "EmployeeController".
// Hij maakt van de eerste letter een hoofdletter en plakt er zelf "Controller" achter.
// Het woordje "update" of "delete" betekent dat hij in deze controller moet zoeken naar een method met deze naam.
?>
