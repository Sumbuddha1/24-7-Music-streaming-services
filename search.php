<?php
 include "conn.php";

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

    <?php include "header.php";

    if(isset($_POST["addplaylist"])) {
$memberid= $_SESSION["MEMBER_ID"];
      $trackid = $_POST['trackid'];

      $get_playid = mysqli_query($dbConn,"SELECT * FROM memberPlaylist WHERE member_id='$memberid'");  // sql query
      $PLAYID = mysqli_fetch_assoc($get_playid);
      $play_list_id= $PLAYID["playlist_id"];

      // INSERT INTO THE PLAYLIST THE TRACK SELECTED
      $insert_track_playlist = mysqli_query($dbConn,"INSERT INTO playlist VALUES(0,'$play_list_id' ,'$trackid')");

    }
    $result_track = 0;
    ?>

<section  >
<div class="container sticky-top" >
  <nav class="navbar navbar-light ">
    <div  style="display:flex">
      <a class="nav-item nav-link active"  style="font-size:18px; color:black; opacity:1;">Search for Track/Artist/Album </a>
  </div>
    <form class="form-inline" method="post"  enctype="multipart/form-data">
      <input class="form-control mr-sm-2" name="searchtext"type="search" placeholder="Search" aria-label="Search" required>
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="Search">
    </form>
  </nav>


</div>
</section>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<section>
  <div class="container "  >
    <div style="background-color:navy;">
    <hr>
    <h5 style="margin-top: 3%; text-align:center; font-size:35px; color:white;">Tracks</h5>
    <hr>
  </div>
    <div class="row" id="row">
<?php
if(isset($_POST["submit"])) {
 // form variable to local
 $result_track = 0;
   $search = $_POST['searchtext'];
   $sql = "SELECT * FROM track WHERE track_title LIKE '%$search%'"; // sql query
   $result = mysqli_query($dbConn,$sql); // do query
   $result_track = mysqli_num_rows($result);
  while($track=mysqli_fetch_array($result)){
     ?>
     <div class="card mb-3 cards"  id="cards">
  <div class="row no-gutters" style="">
     <div class="col-md-4" >
       <?php
       $Albumid=$track["album_id"];
       $get_Album=mysqli_query($dbConn,"SELECT * FROM album WHERE album_id='$Albumid' ");
       $Albumtracks=mysqli_fetch_array($get_Album);
        ?>

       <img src="<?php echo $Albumtracks["thumble"]; ?>" class="card-img" alt="..." style="width:150px;height:100px;">
     </div>
     <div class="col-md-8">
       <div class="card-body">
         <?php
          if(!isset($_SESSION["MEMBER_ID"] )){
            ?>

            <?php
          }else{
            ?>
            <div class="float-right">
              <form class=""  method="post" enctype="multipart/form-data">
               <input type="hidden" name="trackid" value="<?php echo $track["track_id"]; ?>">
               <input class="btn bg-danger" style="color:white;" type="submit" name="addplaylist" value="Add to Playlist">
             </form>
           </div>
            <?php
          }
          ?>

         <h5 class="card-title"><a href="play.php?track=<?php echo $track["track_id"]; ?>"> <?php echo $track["track_title"]; ?></a></h5>
         <label class="card-text">Track Length: <?php echo $track["track_length"]; ?></label>

       </div>
     </div>

</div>
</div>

<?php } }?>
</div>
  </div>
  <?php
if($result_track == 0){
  ?>
  <h5 style="margin-top: 3%; text-align:center; font-size:12px;">No results Found</h5>
  <?php
}else{
  ?>
<h5 style="margin-top: 3%; text-align:center; font-size:35px;"><?php echo $result_track; ?> results Found</h5>
  <?php
}
   ?>
</section>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////SECTION 2//////////////////////////////////////////////// -->
<section>
  <div class="container "  >
    <div style="background-color:navy;">
    <hr>
    <h5 style="margin-top: 3%; text-align:center; font-size:35px; color:white;">Album</h5>
    <hr>
  </div>
    <div class="row" id="row">
<?php
 $result_album = 0;
if(isset($_POST["submit"])) {
 // form variable to local

   $search = $_POST['searchtext'];
   $sqlalbum = "SELECT * FROM album WHERE album_name LIKE '%$search%'"; // sql query
   $resultalbum = mysqli_query($dbConn,$sqlalbum); // do query
   $result_album = mysqli_num_rows($resultalbum);
  while($album=mysqli_fetch_array($resultalbum)){
     ?>
     <div class="card mb-3 cards"  id="cards">
  <div class="row no-gutters" style="">
     <div class="col-md-4" >
       <img src="<?php echo $album["thumble"]; ?>" class="card-img" alt="..." style="width:150px;height:100px;">
     </div>
     <div class="col-md-8">
       <div class="card-body">
 <h5 class="card-title"><?php echo $album["album_name"]; ?></h5>


       </div>
     </div>

</div>
</div>

<?php } }?>
</div>
  </div>
  <?php
if($result_album == 0){
  ?>
  <h5 style="margin-top: 3%; text-align:center; font-size:12px;">No results Found</h5>
  <?php
}else{
  ?>
<h5 style="margin-top: 3%; text-align:center; font-size:35px;"><?php echo $result_album; ?> results Found</h5>
  <?php
}
   ?>
</section>
<!-- /////////////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////SECTION 3//////////////////////////////////////////////// -->
<section>
  <div class="container "  >
    <div style="background-color:navy;">
      <hr>
      <h5 style="margin-top: 3%; text-align:center; font-size:35px; color:white;">Artist</h5>
      <hr>
    </div>

    <div class="row" id="row">
<?php
 $result_artist = 0;
if(isset($_POST["submit"])) {
 // form variable to local

   $search = $_POST['searchtext'];
   $sqlArtist = "SELECT * FROM artist WHERE artist_name LIKE '%$search%'"; // sql query
   $resultartist = mysqli_query($dbConn,$sqlArtist); // do query
   $result_artist= mysqli_num_rows($resultartist);
  while($artist=mysqli_fetch_array($resultartist)){
     ?>
     <div class="card mb-3 cards"  id="cards">
  <div class="row no-gutters" style="">
     <div class="col-md-4" >
       <img src="<?php echo $artist["thumble"]; ?>" class="card-img" alt="..." style="width:150px;height:100px;">
     </div>
     <div class="col-md-8">
       <div class="card-body">
 <h5 class="card-title"> <?php echo $artist["artist_name"]; ?></h5>


       </div>
     </div>

</div>
</div>

<?php } }?>
</div>
  </div>
  <?php
if($result_artist == 0){
  ?>
  <h5 style="margin-top: 3%; text-align:center; font-size:12px;">No results Found</h5>
  <?php
}else{
  ?>
<h5 style="margin-top: 3%; text-align:center; font-size:35px;"><?php echo $result_artist; ?> results Found</h5>
  <?php
}
   ?>
</section>
<!-- /////////////////////////////////////////////////////////////////////////////// -->



    <?php include "footer.php" ?>
    <!-- <div class="container">
      <div class="embed-responsive embed-responsive-21by9" width="300" height="380">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" width="300" height="380" frameborder="0" allowtransparency="true" allow="encryptedmedia"></iframe>
  </div> -->
      <!-- <iframe src="https://open.spotify.com/embed/track/##########" width="300" height="380" frameborder="0" allowtransparency="true" allow="encryptedmedia"></iframe>  -->
    <!-- </div> -->
