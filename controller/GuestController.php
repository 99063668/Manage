<?php

require(ROOT . "model/GuestModel.php");

function index() {
	$guests = getAllGuest();
	render("guest/index", $guests);
}
