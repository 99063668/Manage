<?php
	require(ROOT . "model/GuestModel.php");

	//Laat de guest page in
	function index() {
		$guests = getAllGuest();
		render("guest/index", $guests);
	}
