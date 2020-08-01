<?php 
    session_start();

    require("controller/Controller.php");
    require("model/Connection.php");
    require("model/BlogModel.php");
    
    $dbcon = new DBConnection();
    
    $model = new BlogModel($dbcon);

    $controller = new Controller($model);

?>