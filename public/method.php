<?php

//var_dump($_POST);

$azione = $_POST['azione'];

switch($azione){
    case "1":
        header("Location: /personas");
        break;
    case "2":
        header("Location: /form/get");
        break;
    case "3":
        header("Location: /form/createp");
        break;
    case "4":
        header("Location: /form/edit");
        break;
    case "5":
        header("Location: /form/delete");
        break;
    default:
        header("Location: /form/all");
        break;
}
?>