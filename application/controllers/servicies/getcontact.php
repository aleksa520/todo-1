<?php
include './../../connection.php';

session_start();
$contactid = $_GET['id'];

$sql = "SELECT * FROM contacts WHERE id = $contactid";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
echo json_encode($row);
