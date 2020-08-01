<?php 

    $user_empty = false;
    $email_empty = false;
    $email_invalid = false;
    $pwd_empty = false;
    $reg_error = false;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty(trim($_POST["user"])))
            $user_empty = true;

        if(empty(trim($_POST["email"])))
            $email_empty = true;

        if(empty(trim($_POST["pwd"])))
            $pwd_empty = true;

        if(!$email_empty)
        {
            if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            {
                $email_invalid = true;
            }
            else
            {
                if($controller->registration(trim($_POST["user"]), trim($_POST["email"]), sha1(trim($_POST["pwd"]))))
                    $reg_error = true;
                
            }
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
    <h1 class="text-center">Blog - Registration</h1>
    <h3 class="text-center" style="color: red"><?php echo $reg_error ? "Váratlan hiba történt, nem sikerült a regisztráció!" : ""; ?></h3>
    <form action="" method="post">
        <div class="form-group">
            <label>Felhasználónév:</label>
            <input class="form-control" type="text" name="user" placeholder="...">
            <label style="color: red"><?php echo $user_empty ? "Felhasználónév mező kitöltése kötelező!" : ""; ?></label>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input class="form-control" type="text" name="email" placeholder="...">
            <label style="color: red"><?php echo $email_empty ? "Email mező kitöltése kötelező!" : ""; echo $email_invalid ? "Email formátum kötelező!" : "";?></label>
        </div>
        <div class="form-group">
            <label>Jelszó:</label>
            <input class="form-control" type="password" name="pwd" placeholder="...">
            <label style="color: red"><?php echo $pwd_empty ? "Jelszó mező kitöltése kötelező!" : ""; ?></label>
        </div>

        <button class="btn btn-warning" type="submit" name="submit">Regisztráció</button>
    </form>
</div>