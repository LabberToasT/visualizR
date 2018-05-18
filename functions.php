<?php

// Check connection
if ($connection->connect_error) {
	die("Connection failed: " . mysqli_connect_error());
}

function testDistrictName($connection) {
	return sqlQuery($connection,  "SELECT * FROM berlin_elections limit 5;");
}

function testElectorsProParty($connection) {
	return sqlQuery($connection,  "select
bezirk_nr,
bezirk_name,
sum(gueltig) as gueltig,
sum(cdu) +
sum(die_linke) +
sum(spd) +
sum(gruene) +
sum(fdp) +
sum(piraten) +
sum(npd) +
sum(bueso) +
sum(mlpd) +
sum(afd) +
sum(big) +
sum(pro_deutschland) +
sum(freie_waehler) +
sum(die_partei) +
sum(boes) +
sum(b) +
sum(buendniss_21_rrp) +
sum(dkp) +
sum(die_violetten) +
sum(ditsche) +
sum(di_leo) +
sum(sylla) +
sum(fricke) +
sum(otto) +
sum(beckmann) +
sum(snelinski) as test_wert,
sum(cdu) as cdu,
sum(die_linke) as die_linke,
sum(spd) as spd,
sum(gruene) as gruene,
sum(fdp) as fdp,
sum(piraten) as piraten,
sum(npd) as npd,
sum(bueso) as bueso,
sum(mlpd) as mlpd,
sum(afd) as afd,
sum(big) as big,
sum(pro_deutschland) as pro_deutschland,
sum(freie_waehler) as freie_waehler,
sum(die_partei) as die_partei,
sum(boes) as boes,
sum(b) as b,
sum(buendniss_21_rrp) as buendniss_21_rrp,
sum(dkp) as dkp,
sum(die_violetten) as die_violetten,
sum(ditsche) as ditsche,
sum(di_leo) as di_leo,
sum(sylla) as sylla ,
sum(fricke) as fricke ,
sum(otto) as otto,
sum(beckmann) as beckmann,
sum(snelinski) as snelinski
from
berlin_elections
group by
bezirk_nr;");
}

function sqlQuery($connection, $query) {
	$data = [];
	$sqlQuery = $query;
	$result = $connection->query($sqlQuery);
	if ($result) {
		while ($row = $result->fetch_assoc()) {
			$data[] = $row ;
		}
	}
	return $data;
}

// Write to json file
function convertIntoJson($data) {
	return json_encode($data);
}

// Return json data 
function returnJsonData($data) {
	$json = [];
	array_push($json, $data);
	header('Content-Type: application/json');
	echo json_encode($json);
}





