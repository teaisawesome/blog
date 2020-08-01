<?php 

    $user_empty = false;
    $pwd_empty = false;
    $login_error = false;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty(trim($_POST["user"])))
            $user_empty = true;

        if(empty(trim($_POST["pwd"])))
            $pwd_empty = true;

        if(!$user_empty && !$pwd_empty)
        {
            if(!$controller->login(trim($_POST["user"]), sha1(trim($_POST["pwd"]))))
                $login_error = true;
        }
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Blogs</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/blog/">Login<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/blog/registration.php">Registration</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <h1 class="text-center">Blog - Login</h1>
    <h3 class="text-center" style="color: red"><?php echo $login_error ? "Nem sikerül bejelentkezned!" : ""; ?></h3>
    <form action="" method="post">
        <div class="form-group">
            <label>Felhasználónév:</label>
            <input class="form-control" type="text" name="user" placeholder="...">
            <label style="color: red"><?php echo $user_empty ? "Felhasználónév mező kitöltése kötelező!" : ""; ?></label>
        </div>
        <div class="form-group">
            <label>Jelszó:</label>
            <input class="form-control" type="password" name="pwd" placeholder="...">
            <label style="color: red"><?php echo $pwd_empty ? "Jelszó mező kitöltése kötelező!" : ""; ?></label>
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Belépés</button>
    </form>
</div>