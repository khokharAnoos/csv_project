<?php
$connection = new mysqli("localhost","root","","csv");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}
?>