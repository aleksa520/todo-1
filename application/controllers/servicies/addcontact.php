<?php
include './../../connection.php';
    session_start();

if(isset($_POST['contact'])) {
    $userid = $_SESSION['id'];
    $name = mysqli_real_escape_string($mysqli, $_POST['contact']['first_name']);
    $lastname = mysqli_real_escape_string($mysqli, $_POST['contact']['last_name']);
    $date = mysqli_real_escape_string($mysqli, $_POST['contact']['date']);
    $email = mysqli_real_escape_string($mysqli, $_POST['contact']['email']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['contact']['phone']);


// use escaped double quote
    $sql = "INSERT INTO contacts (first_name, last_name, birth_date, email, phone, user_id)
VALUES (\"$name\", \"$lastname\", \"$date\", \"$email\", \"$phone\", \"$userid\")";

    $result = $mysqli->query($sql);
    print_r($result);
    if ($result) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>