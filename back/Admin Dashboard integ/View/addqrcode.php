<?php

$conn = new mysqli('localhost', 'root', '', 'zestymar');
if(isset($_POST['qrvalue'])){
    $qrvalue=$_POST['qrvalue'];
    $sql="INSERT INTO qrcode (value) VALUES(' $qrvalue')" ;
}
$conn->close();

?>