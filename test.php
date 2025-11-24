<?php
echo "PHP is working!";
echo "<br>Current directory: " . __DIR__;
echo "<br>File exists index.php: " . (file_exists('index.php') ? 'Yes' : 'No');
echo "<br>Directory permissions: " . substr(sprintf('%o', fileperms('.')), -4);
?>