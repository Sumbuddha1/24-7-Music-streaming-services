<?php
 include "sessions.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>247 Music</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="CSS/css/bootstrap.min.css">
  </head>
  <body>
    <section id="header-section">
    <center>
      <h1 style="color:#ffff;padding-top:3%;">Welcome to 247 Music</h1>
      <label style="font-style:italic;color:#ffff;">This is where all kind of music can be found. Listen to Music, and add your ouwn playlist.</label><br>
        <label style="color:#ffff;">Enjoy the cool Music</label><br>
    </center>
    </section>
    <div class="container sticky-top" id="menu-nav">
      <nav class="navbar navbar-expand-lg  bg-light" style=" ">
        <a class="navbar-brand" href="index" style="font-size:24px;font-weight:bold;color:navy;">247Music</a>
        <button class="navbar-toggler" style="" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" ></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index" style="font-size:18px; color:navy; opacity:1;">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="Songs" style="font-size:18px; color:navy; opacity:1;" >Songs</a>
            <a class="nav-item nav-link active" href="Search" style="font-size:18px; color:navy; opacity:1;" >Search</a>

      <a class="nav-item nav-link active" href="signin.php" style="font-size:18px; color:navy; opacity:1;">Sign In</a>
          </div>
        </div>
      </nav>
    </div>

<section>
  <div class="container" style="margin-top:5%;">
    <div class="row">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-6">
      <center>
        <form method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="form-group">
            <label for="exampleInputText">User Name</label>
            <input type="text" width="200" name="username" class="form-control" id="exampleInputText" placeholder="Enter Username" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
          </div>

          <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
  </center>
    </div>
    <div class="col-lg-3">

    </div>
    </div>

</div>
</section>

<?php include "footer.php" ?>
