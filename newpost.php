<?php 
    require "includes.php";

    if($_SESSION["logged"])
    {
        $controller->newPostPage($controller);
    }
    else
    {
        header("Location: http://localhost/blog/");
    }
?>