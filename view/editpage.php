<?php 
    $empty_content = false;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["content"]))
            $empty_content = true;

        if(!$empty_content)
        {
           $controller->editPost($_POST['content'], $postid);

           echo $_POST['content'];
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
        <a class="nav-link" href="http://localhost/blog/home.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/blog/newpost.php">New Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/blog/">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <h1 class="text-center">Edit Post</h1>
    <form action="" method="post">
        <div class="form-group">
            <label>Post:</label>
            <textarea class="form-control" name="content" rows="3"><?= $controller->getPostById($postid)['content'] ?></textarea>
            <label style="color: red"><?php echo $empty_content ? "Kitöltése kötelező!" : ""; ?></label>
        </div>
        <button class="btn btn-info" type="submit" name="submit">Confirm Editting</button>
    </form>
</div>
