<?php
	require(ROOT . "model/HorseModel.php");

	//Laat de guest page in
	function index() {
		$guests = getAllGuest();
		render("guest/index", $guests);
	}

	//Laad de add page in
    function openReserverings() {
        render("guest/add");
    }

    //Laad de add function in
    function addReserverings() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = controle3();
            addReservering($data);
            index();
        }
    }

       //laad de delete page
    function openDelete() {
        render("home/delete");
    }

    //laad de delete function in
    function deleteGuests() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if (!empty($_POST["Delete"])) {
                //Show confirm form
            } elseif (!empty($_POST["Delete2"])) {
                deleteGuest($_GET["id"]);
                index();
            } elseif (!empty($_POST["Delete3"])) {
                index();
            }
        }
    }