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
    ?>



<section>

  <div class="container" >
    <hr style="margin-top: 3%;">
    <h5 style=" text-align:center; font-size:35px;">Albums</h5>
    <hr>
    <div class=" row album ">


    <?php

    $get_album=mysqli_query($dbConn,"SELECT * FROM album ");
  while($track_album=mysqli_fetch_array($get_album)){
     ?>
    <div class="card " id="card" >
  <img src="<?php echo $track_album["thumble"]; ?>" class="card-img-top"height="150" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-size:12px;">Album Name: <?php echo $track_album["album_name"]; ?></h5>
    <p class="card-text" style="font-size:12px;">Album Year: <?php echo $track_album["album_date"]; ?></p>
    <?php
$albumid=$track_album["album_id"];
$get_album_track=mysqli_query($dbConn,"SELECT * FROM track WHERE album_id='$albumid' ");
$track_Number=mysqli_num_rows($get_album_track);
     ?>
    <p class="card-text" style="font-size:12px;">Songs: <?php echo $track_Number ?></p>

  </div>
</div>
<?php } ?>

</div>
<hr>
  </div>
</section>
<section>

  <div class="container "  >

    <h5 style="margin-top: 3%; text-align:center; font-size:35px;">Tracks</h5>
    <hr>
    <div class="row" id="row">


<?php

    $get_track=mysqli_query($dbConn,"SELECT * FROM track ");
  while($track=mysqli_fetch_array($get_track)){
     ?>
     <div class="card mb-3 cards"  id="cards">
  <div class="row no-gutters" style="display:flex;">
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
         <h5 class="card-title"><?php echo $track["track_title"]; ?></h5>
         <p class="card-text">Track Length: <?php echo $track["track_length"]; ?></p>

       </div>
     </div>

</div>
</div>

<?php } ?>


</div>
  </div>
</section>
<section>
  <div class="container">
    <hr>
    <h5 style="margin-top: 3%; text-align:center; font-size:35px;">Artist</h5>
    <hr>
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <div class="">
              <ul class="list-group">
              <li class="list-group-item active">Artist Title</li>
              <?php
              $playlist_query = "SELECT * FROM artist";
              $get_executed = mysqli_query($dbConn,$playlist_query);
              $count_playlist = 0;
              while($get_playlist = mysqli_fetch_assoc($get_executed)){
                ?>
                <center>
                    <li class="list-group-item"><?php echo $get_playlist["artist_name"]; ?> </li>
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


    <?php include "footer.php" ?>
    <!-- <div class="container">
      <div class="embed-responsive embed-responsive-21by9" width="300" height="380">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" width="300" height="380" frameborder="0" allowtransparency="true" allow="encryptedmedia"></iframe>
  </div> -->
      <!-- <iframe src="https://open.spotify.com/embed/track/##########" width="300" height="380" frameborder="0" allowtransparency="true" allow="encryptedmedia"></iframe>  -->
    <!-- </div> -->
