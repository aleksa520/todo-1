<?php
include './../../connection.php';
session_start();
$id = $_SESSION['id'];
$result = [];
$sql = '';
if(isset($_POST['inputText'])){
    $search = mysqli_real_escape_string($mysqli, $_POST["inputText"]);
    $sql = "SELECT * FROM contacts WHERE user_id = $id and (first_name LIKE '%".$search."%' OR last_name LIKE '%".$search."%'OR birth_date LIKE '%".$search."%' OR email LIKE '%".$search."%' OR phone LIKE '%".$search."%')";

}else{
    $sql = "SELECT * FROM contacts WHERE user_id = $id";
}
$result = mysqli_query($mysqli, $sql);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    array_push($data, $row);
}

echo json_encode($data);



