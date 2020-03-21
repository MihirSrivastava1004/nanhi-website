<?php
  if (isset($_POST["signup-submit"])) {
    include "dbh.inc.php";
    $username = $_POST["uid"];
    $email = $_POST["mail"];
    $password = $_POST["pwd"];
    $passwordrepeat = $_POST["pwd-repeat"];

    if (empty($username) || empty($email) || empty($password) || empty($passwordrepeat)) {
      header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
      exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invalidemailuid");
      exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../signup.php?error=invalidemail&uid=".$username);
      exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      header("Location: ../signup.php?error=invaliduid&mail=".$email);
      exit();
    }
    elseif ($password != $passwordrepeat) {
      header("Location: ../signup.php?error=passwordchek&uid=".$username."&email=".$email);
    }
    else {
      $sql = "SELECT uidusers FROM users WHERE uidusers=?";
      $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
          header("Location: ../signup.php?error=usertaken&email=".$email);
          exit();
        }
        else {
          $sql = "INSERT INTO users(uidusers, emailUsers, pwdUsers) VALUES(?, ?, ?)";
          $stmt = mysqli_stmt_init($con);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
          }
          else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
            mysqli_stmt_execute($stmt);
            header("Location: ../signup.php?signup=success");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
  }
  else {
    header("Location: ../signup.php?signup=failed"); 
    exit();
  }
