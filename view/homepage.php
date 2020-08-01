<?php 
  if(isset($_POST['deletepost']))
  {
      $controller->deletePost($_POST['postid']);
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
      <li>
        <span>Logged-in as </span><span><?= $controller->getUsernameById($_SESSION['uid'])?></span>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
<?php 
foreach ($blogposts as $value)
{ 
?>  
<div class="row mt-3">
  <div class='col-md-12'><h4><?= $controller->getUsernameById($value['uid'])?></h4><p><?= $value['date']?></p></div>
  <div class='col-md-12 content'><span><?= $value['content'];?></span></div>
  <div class='col-md-12'>

  <?php
    if($value['uid'] == $_SESSION['uid'])
    {
  ?>
    <div class="mt-2">
    <form action="" method="post"><a href="http://localhost/blog/edit.php?post=<?=$value['id']?>">
      <button type="button" class="btn btn-warning mr-2">Edit</button></a>
      <button type="submit" class="btn btn-danger" name='deletepost'>Delete</button>
      <input type="hidden" name="postid" value=<?= $value['id'] ?>>
    </form>
    </div>
  <?php 
    }
  ?>

  </div>
</div>
<?php 
}
?>
</div>