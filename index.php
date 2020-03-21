    <?php
      include "header.php";
    ?>

    <main>
      <?php
      if (isset($_GET["error"])) {

        /*if (isset($_SESSION["UserId"])) {
          echo "You are logged in!";
        }*/
        if ($_GET["error"] == "nouser"){
          echo "<p>No such user found</p>";
        }
        elseif ($_GET["error"] == "wrongpassword") {
          echo "<p>Please enter correct password</p>";
        }
        elseif ($_GET["error"] == "emptyfields") {
          echo "<p>Please enter the required info!</p>";
        }
      }
      else {
        if (isset($_SESSION["UserId"])) {
          echo "You are logged in!";
        }
        /*if ($_GET["login"] == "success") {
          echo "<p>You are logged in!</p>";
        }*/
        elseif(!isset($_session["UserId"])) {
          echo "<p>You are logged out</p>";
        }
      }

      ?>
    </main>

    <?php
      include "footer.php";
    ?>
