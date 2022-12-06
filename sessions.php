<?php
session_start();

include "conn.php";
if(isset($_POST["login"])){
  $username =$_POST['username'];
  $password = hash("sha256",$_POST["password"]);
  $query= "SELECT * FROM membership WHERE username='$username' AND password='$password'";
  $execute = mysqli_query($dbConn,$query);
  if($execute){

    $row = mysqli_fetch_assoc($execute);
    $_SESSION["USERNAME"]=$row["username"];
		$_SESSION["SURNAME"]=$row["surname"];
	  $_SESSION["FIRSTNAME"]=$row["firstname"];
		$_SESSION["MEMBER_ID"]=$row["member_id"];
		$_SESSION["CATEGORY"]=$row["category"];
 echo "<script>
location.href='Search.php';
 </script>";

  }else{
    echo "Failed";
  }

}

 ?>
