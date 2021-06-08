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

    //Laad de add page in
    function addHorses() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = controle();
            addHorse($data);
            index();
        }
    }
    
?>