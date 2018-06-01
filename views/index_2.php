<?php
require_once 'phpinfo.php';
require_once 'functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
      <title>
          VisualizR
      </title>
    </head>
    <body>
        <?php
            $data = testDistrictName($connection);
        ?>
        <!-- testDatabaseQuery -->
    
        <p>
            testDistrictName :
        </p>
        <?php
      
            $testData = testDistrictName($connection);
            
            $count = count($testData);
            for ($i = 0; $i < $count; $i++) {
    
                var_dump($testData[$id]);
            }
        ?>
    </body>
</html>
