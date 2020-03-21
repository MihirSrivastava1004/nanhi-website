<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <header>
      <nav>
        <a href="#">
          <img class="Header" src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/1024px-Instagram_logo_2016.svg.png" alt="logo">
        </a>
        <ul class="navigation">
          <li> <a href="index.php">Home</a> </li>
          <li> <a href="#">About Us</a> </li>
          <li> <a href="#">Portfolio</a> </li>
          <li> <a href="#">Contact</a> </li>
        </ul>
      </nav>
      <div>
        <?php
          if (isset($_SESSION["UserId"])) {
            echo '<br><form class="form1" action="includes/logout.inc.php" method="post"><br>
            <button class="button1" type="submit" name="logout-submit">Logout</button>
          </form>';
          }
          else {
            echo '<div class="overall"><br><form class="form2" action="includes/login.inc.php" method="post"><br>
              <input class="input1" type="text" name="mail" placeholder="Username/E-mail"><br>
              <input class="imput2" type="password" name="pwd" placeholder="Password"><br>
              <button class="button2" type="submit" name="login-submit">Login</button>
            </form>
              <a class="signup" href="signup.php">Signup</a></div>';

          }
        ?>


      </div>


    </header>
