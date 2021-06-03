<?php
   require(ROOT . "model/HorseModel.php");

   function index()
   {
       $horses = getAllHorse();
       render("horse/index", $horses);
   }

   function index2()
   {
       $ponys = getAllPony();
       render("horse/index", $ponys);
   }
?>