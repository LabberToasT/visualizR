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
		$data = testDatabaseQuery($connection);
	?>
	<!-- testDatabaseQuery -->

	<p>testDatabaseQuery :</p> 
	<?php
		$testData = testDatabaseQuery($connection);
		for ($i = 0; $i < count($testData); $i++) {
	?>
	
	<?= $testData[$i] ?>
	
	
	<!-- testDatabaseQuery  End of for loop -->
	<?php
		}
	?>
	
	<!-- jsonData -->
	<p>jsonData :</p>
	<?php
		$jsonData = convertIntoJson($data);
	?>
	
	<?= $jsonData ?>

	
</body>
</html>
