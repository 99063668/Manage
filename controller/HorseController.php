<?php
   require(ROOT . "model/HorseModel.php");

   //Laad de horse + pony page in
   function index() {
        $horses = getAllHorse();
        render("horse/index", $horses);
    }

    //Laad de horse + pony page in
    function indexPony() {
        $ponys = getAllPony();
        render("horse/index", $ponys);
    }

    //Laad de add page in
    function openForm() {
        render("horse/add");
    }

    //Laad de add function in
    function addHorses() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = controle();
            addHorse($data);
            index();
        }
    }

    //Laad de add page voor pony's in
    function openForm2() {
        render("horse/addPony");
    }

    //Laad de add function voor pony's in
    function addPonys() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = controle2();
            addPony($data);
            index();
        }
    }

    //laad de delete page
    function openDelete() {
        render("horse/delete");
    }

    //ladd de delete function in
    function deleteHorses() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if (!empty($_POST["Delete"])) {
                //Show confirm form
            } elseif (!empty($_POST["Delete2"])) {
                deleteHorse($_GET["id"]);
                index();
            } elseif (!empty($_POST["Delete3"])) {
                index();
            }
        }
    }
    
?>