<?php
	require(ROOT . "model/HorseModel.php");

	//Laat de home page in
	function index() {
		render("home/index");	
	}

     //Laad de add page in
     function openForm() {
        render("home/add");
    }

    //Laad de add function in
    function addHomes() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = controle4();
            addHome($data);
            index();
        }
    }

	//laad de delete page
    function openDelete() {
        render("home/delete");
    }

    //laad de delete function in
    function deleteHomes() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if (!empty($_POST["Delete"])) {
                //Show confirm form
            } elseif (!empty($_POST["Delete2"])) {
                deleteHome($_GET["id"]);
                index();
            } elseif (!empty($_POST["Delete3"])) {
                index();
            }
        }
    }

    //Laad de edit page in
    function editForm2() {
        render("home/update");
    }
    
    //laad de edit function
    function editGuests(){
        if(!empty($_POST["SubmitBtn2"])) {
        $data = controle4();
        editGuest($data);
        index();
        }
    }