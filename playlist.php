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
    if(isset($_POST["play_name"])) {

       $name = $_POST['playname'];
       $memberid= $_SESSION["MEMBER_ID"];

       $sql = "INSERT INTO memberPlaylist VALUES(0,'$memberid','$name')"; // sql query
       $result = mysqli_query($dbConn,$sql); // do query
     }
    ?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <div class="">
              <ul class="list-group">
              <li class="list-group-item active">Your playlist</li>
              <?php
              $memberid= $_SESSION["MEMBER_ID"];
              $playlist_query = "SELECT * FROM memberPlaylist WHERE member_id='$memberid' ";
              $get_executed = mysqli_query($dbConn,$playlist_query);
              $count_playlist = 0;
              while($get_playlist = mysqli_fetch_assoc($get_executed)){
                ?>
                <center>
                    <li class="list-group-item"><?php echo $get_playlist["playlist_name"]; ?> </li>
                  </center>
                <?php
              }
              $count_playlist =mysqli_num_rows($get_executed);
              if ($count_playlist== 0) {
                ?>
                <div >
                  <form   method="post" enctype=" multipart/form-data " autocomplete="off">
                    <div class="form-group" style="display:flex;">

                          <input style="margin:10px;" type="text" name="playname" class="form-control" id="formGroupExampleInput" placeholder="Playlist Name">
                          <input style="margin:10px; color:white;" type="submit" class="btn bg-danger" name="play_name" value="ADD">
                    </div>

                  </form>
                </div>
                <center>
                <li class="list-group-item"> No playlist Created </li>
              </center>
                <?php
              }
               ?>


            </ul>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>
</section>
<section>

  <div class="container "  >

    <div class="row" id="row">


<?php
//CHECKING THE PLAYLIST ADDED Tracks
$memberID = $_SESSION["MEMBER_ID"];

$getmemberplay= mysqli_fetch_assoc(mysqli_query($dbConn,"SELECT * FROM memberPlaylist WHERE member_id='$memberID'"));
if($getmemberplay !=null){
$getplaylistID = $getmemberplay["playlist_id"];

$tracks = mysqli_query($dbConn,"SELECT * FROM playlist WHERE playlist_id='$getplaylistID'");

while( $trackdatas=mysqli_fetch_assoc($tracks)){
$trackID = $trackdatas["track_id"];
$get_track = mysqli_query($dbConn,"SELECT * FROM track WHERE track_id='$trackID'");
  while($track=mysqli_fetch_array($get_track)){
     ?>

        <div class="card mb-3 cards"  style="width:100%; border-style:none;background-color:#fffdd0;">
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

         <h5 class="card-title"><a href="play.php?track=<?php echo $track["track_id"]; ?>"> <?php echo $track["track_title"]; ?></a></h5>
         <p class="card-text">Track Length: <?php echo $track["track_length"]; ?></p>
       </div>
       </div>

       </div>
       </div>
       <hr>
<?php }
}
}?>


</section>

    <?php include "footer.php" ?>
    <!-- <div class="container">
      <div class="embed-responsive embed-responsive-21by9" width="300" height="380">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" width="300" height="380" frameborder="0" allowtransparency="true" allow="encryptedmedia"></iframe>
  </div> -->
      <!-- <iframe src="https://open.spotify.com/embed/track/##########" width="300" height="380" frameborder="0" allowtransparency="true" allow="encryptedmedia"></iframe>  -->
    <!-- </div> -->
