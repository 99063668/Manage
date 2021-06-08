<?php
	require(ROOT . "model/HomeModel.php");

	//Laat de home page in
	function index() {
		render("home/index");	
	}