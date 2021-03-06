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
        $errors = [];
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = controle($errors);
            if(empty($errors)) {
                addHorse($data);
                index();
            }else{
                render("horse/add", ["errors" => $errors, "data" => $data]);
            }
        }
    }

    //Laad de add page voor pony's in
    function openForm2() {
        render("horse/addPony");
    }

    //Laad de add function voor pony's in
    function addPonys() {
        $error = [];
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data2 = controle2($error);
            if(empty($error)){
                addPony($data2);
                index();
            }else{
                render("horse/addPony", ["error" => $error, "data2" => $data2]);
            }
        }
    }

    //laad de delete page
    function openDelete() {
        render("horse/delete");
    }

    //laad de delete function in
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

    //laad de delete page voor pony
    function openDelete2() {
        render("horse/deletePony");
    }

    //laad de delete function voor pony
    function deletePonys() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if (!empty($_POST["Delete"])) {
                //Show confirm form
            } elseif (!empty($_POST["Delete2"])) {
                deletePony($_GET["id"]);
                index();
            } elseif (!empty($_POST["Delete3"])) {
                index();
            }
        }
    }

    //Laad de edit page in
    function editForm() {
        render("horse/update");
    }

    //laad de edit function
    function editHorses(){
        $errors = [];
        if(!empty($_POST["SubmitBtn2"])) {
            $data = controle($errors);
            if(empty($errors)) {
                editHorse($data);
                index();
            }else{
                render("horse/edit", ["errors" => $errors, "data" => $data]);
            }
        }
    }

      //Laad de edit page voor pony in
      function editForm2() {
        render("horse/updatePony");
    }
    
    //laad de edit funtion voor pony
    function editPonys(){
        if(!empty($_POST["SubmitBtn3"])) {
        $data = controle2();
        editPony($data);
        index();
        }
    }
?>