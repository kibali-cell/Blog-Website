<?php
require 'config/constants.php';

 //connect to db
 $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

 if(mysqli_errno($connection)) {
    die(mysqli_error($connection));
 }

?>