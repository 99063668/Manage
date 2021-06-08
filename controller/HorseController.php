<?php
   require(ROOT . "model/HorseModel.php");

   //Laad de horse + pony page in
   function indexHorse() {
        $horses = getAllHorse();
        render("horse/index", $horses);
    }

    //Laad de horse + pony page in
    function indexPony() {
        $ponys = getAllPony();
        render("horse/index", $ponys);
    }

    //Laad de home page in
    function indexHome() {
        render("home/index");	
    }

    //Laat de guest page in
    function indexGuest() {
        $guests = getAllGuest();
        render("guest/index", $guests);
    }
    
?>