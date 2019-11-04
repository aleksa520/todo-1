<?php
include './../../connection.php';

session_start();
$userid = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = '$userid'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
echo json_encode($row);
