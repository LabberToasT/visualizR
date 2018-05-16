<?php
require_once 'phpinfo.php';

function testDatabaseQuery() {
  $sqlQuery = "SELECT * FROM berlin_elections;";
  $result = $connection->query($sqlQuery);
  if ($result) {
    while ($row = $result->fetch_assoc()) {
    echo $row["BezirkNr"];
    }
  }
}
