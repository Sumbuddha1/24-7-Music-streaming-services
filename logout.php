<?php
include "header.php";
  session_destroy();
   // unset($_SESSION["USERNAME"]);
   // unset($_SESSION["SURNAME"]);
   // unset($_SESSION["FIRSTNAME"]);
   // unset($_SESSION["MEMBER_ID"]);
   // unset($_SESSION["CATEGORY"]);
   echo "<script>
  location.href='index.php';
   </script>";
   include "footer.php";
?>
