<?php

require(ROOT . "model/GuestModel.php");

function index()
{
	render("guest/index", array(
		'guests' => getAllGuest()
	));
}
