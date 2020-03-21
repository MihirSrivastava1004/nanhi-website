<?php
  include "header.php";
?>

<main>
  <h1>Signup</h1>
  <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyfields") {
        echo "<p>Fill in all fields!</p>";
      }
      elseif ($_GET["error"] == "invalidemailuid") {
        echo "<p>Invalid E-mail and Username</p>";
      }
      elseif ($_GET["error"] == "invalidemail") {
        echo "<p>Invalid E-mail</p>";
      }
      elseif ($_GET["error"] == "invaliduid") {
        echo "<p>Invalid Username</p>";
      }
      elseif ($_GET["error"] == "passwordchek") {
        echo "<p>Passwords don't match</p>";
      }
      elseif ($_GET["error"] == "usertaken") {
        echo "<p>User already taken</p>";
      }
    }
    if(isset($_GET["signup"])) {
      if ($_GET["signup"] == "success") {
        echo "<p>Signed up successfully</p>";
      }
    }

  ?>
  <form action="includes/signup.inc.php" method="post">
    <input type="text" name="uid" placeholder="Username">
    <input type="text" name="mail" placeholder="E-mail">
    <input type="password" name="pwd" placeholder="Password">
    <input type="password" name="pwd-repeat" placeholder="Repeat password">
    <button type="submit" name="signup-submit">Signup</button>
  </form>
</main>

<?php
  include "footer.php";
?>
