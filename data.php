<?php
  if(isset($_POST['search'])){
    $ValueToSearch = $_POST['ValueToSearch'];
    $query = "SELECT * FROM users WHERE CONCAT('idUsers', 'uidusers') LIKE '%".$ValueToSearch."%'";
    $search_result = filterTable($query);
  }
  else {
    $query = "SELECT * FROM users";
    $search_result = filterTable($query);
  }
  function filterTable($query){
    include "includes/dbh.inc.php";
    $filter_Result = mysqli_query($con, $query);
    return $filter_Result;
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style>
      table, tr, th, td{
        border: 1px solid black;
      }
    </style>
    <title></title>
  </head>
  <body>
    <form action=<?php echo $_SERVER['PHP_SELF'] ?> method="post">
      <input type="text" name="ValueToSearch" placeholder="Value to search"><br><br>
      <input type="submit" name="search" value="Filter"><br><br>
      <table class="table">
        <tr>
          <th>UserId</th>
          <th>UserName</th>
        </tr>
        <?php while($row = mysqli_fetch_array($search_result)): ?>
        <tr>
          <td><?php echo $row["idUsers"];?></td>
          <td><?php echo $row["uidusers"];?></td>
        </tr>
      <?php endwhile; ?>
      </table>
    </form>
  </body>
</html>
