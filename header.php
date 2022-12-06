<?php include "sessions.php"; ?>
<section id="header-section">
<center>
  <h1 style="color:#ffff;padding-top:3%;">Welcome to 247 Music</h1>
  <label style="font-style:italic;color:#ffff;">This is where all kind of music can be found. Listen to Music, and add your ouwn playlist.</label><br>
    <label style="color:#ffff;">Enjoy the cool Music</label><br>
    <div class="">
      <?php
if($_SESSION["MEMBER_ID"] != null){
       ?>
    <label style="color:#ffff;">User Name: <?php echo $_SESSION["USERNAME"]; ?></label>
    <label style="color:#ffff;">NAME: <?php echo $_SESSION["SURNAME"];echo " "; echo $_SESSION["FIRSTNAME"]; ?></label>
    <label style="color:#ffff;">Membership: <?php echo $_SESSION["CATEGORY"]; ?></label>
  <?php } ?>
    </div>
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
        <a class="nav-item nav-link active" href="index.php" style="font-size:18px; color:navy; opacity:1;">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link active" href="songs.php" style="font-size:18px; color:navy; opacity:1;" >Songs</a>
        <a class="nav-item nav-link active" href="search.php" style="font-size:18px; color:navy; opacity:1;" >Search</a>
        <?php
        if(!isset($_SESSION["MEMBER_ID"])){
          ?>
  <a class="nav-item nav-link active" href="signin" style="font-size:18px; color:navy; opacity:1;">Sign In</a>
          <?php
        }else{
          ?>
            <a class="nav-item nav-link active" href="Playlist" style="font-size:18px; color:navy; opacity:1;">Playlist</a>
<a class="nav-item nav-link active" href="logout.php" style="font-size:18px; color:navy; opacity:1;">Log Out</a>
          <?php
        }
         ?>


      </div>
    </div>
  </nav>
</div>
