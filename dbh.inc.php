<?php
  $server = "localhost";
  $us = "root";
  $ps = "";
  $dBName = "mihir";

  $con = mysqli_connect($server, $us, $ps);

  if (!$con) {
    die("Connection Failed: ".mysqli_connect_error());
  }
  else {
    mysqli_select_db($con, "mihir");
    
  }
