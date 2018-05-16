<?php
require_once 'phpinfo.php';
require_once 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
    $sqlQuery = "SELECT * FROM berlin_elections;";
    $result = $connection->query($sqlQuery);
    if ($result) {
      while ($row = $result->fetch_assoc()) {
      echo $row["BezirkNr"];
      }
    }
  ?>
  <p>test : <?= testDatabaseQuery(); ?></p>

</body>
</html>
