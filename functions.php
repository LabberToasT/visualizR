<?php

function testDatabaseQuery($connection) {
	// Check connection
	if ($connection->connect_error) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$data = [];
	$sqlQuery = "SELECT * FROM berlin_elections limit 5;";
	$result = $connection->query($sqlQuery);
	if ($result) {
		while ($row = $result->fetch_assoc()) {
			$data[] = $row["bezirk_nr"];
		}
	}
	return $data;
}

function convertIntoJson($data) {
	return json_encode($data);
}