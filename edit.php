<?php 
    require "includes.php";

    if($_SESSION["logged"])
    {
        $controller->editPostPage($controller, $_GET['post']);
    }
    else
    {
        header("Location: http://localhost/blog/");
    }

?>