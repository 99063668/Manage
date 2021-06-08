<?php
	require(ROOT . "model/HorseModel.php");

	//Laat de guest page in
	function index() {
		$guests = getAllGuest();
		render("guest/index", $guests);
	}
