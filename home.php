<?php 
    include("includes.php");

    if($_SESSION["logged"])
    {
        $controller->homePage($controller);
    }
    else
    {
        header("Location: http://localhost/blog/");
    }
?>