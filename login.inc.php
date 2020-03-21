<?php
  if (isset($_POST["login-submit"])) {
    include "dbh.inc.php";
    $mailuid = $_POST["mail"];
    $password = $_POST["pwd"];

    if (empty($mailuid) || empty($password)) {
      header("Location: ../index.php?error=emptyfields");
      exit();
    }
    else {
      $sql = "SELECT * FROM users WHERE uidusers=? OR emailUsers=?;";
      $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
          $pwdCheck = password_verify($password, $row["pwdUsers"]);
          if ($pwdCheck == false) {
            header("Location: ../index.php?error=wrongpassword");
            echo "Wrong Password";
            exit();
          }
          else if($pwdCheck == true) {
            session_start();
            $_SESSION["UserId"] = $row["idUsers"];
            $_SESSION["UserUid"] = $row["uidusers"];
            header("Location: ../data.php?login=success");
            exit();
          }
          else {
            header("Location: ../index.php?error=sqlerror");
            exit();
          }
        }
        else {
          header("Location: ../index.php?error=nouser");
          echo "No such user";
          exit();
        }
      }
    }
  }
  else {
    header("Location: ../index.php");
  }
