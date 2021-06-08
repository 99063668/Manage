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
     function addHorses() {
        $horse = addHorse();
        render("horse/add", $horse);
    }
?>