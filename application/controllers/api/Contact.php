<?php
include '../DBConnector.php';
session_start();
class Contact
{
    public static function post($name, $lastname, $date, $email, $phone){
        if(isset($_POST['contact'])){
            $dbConnection = new DBConnector();
            $userid = $_SESSION['id'];
            $sql = "INSERT INTO contacts (first_name, last_name, birth_date, email, phone, user_id) VALUES (\"$name\", \"$lastname\", \"$date \", \"$email\", \"$phone\", \"$userid\")";
            $result = $dbConnection->getConnection()->query($sql);
            if ($result) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $result = $dbConnection->getConnection()->error;
            }
        }
    }

    public static function get($id = null, $sorted = null){
        $sql = '';
        $dbConnection = new DBConnector();
        $userid = $_SESSION['id'];
        if(isset($id)){
            $sql = "SELECT * FROM contacts WHERE user_id = $userid AND id = $id";
            $result = $dbConnection->getConnection()->query($sql);
        }else{
            $sql = "SELECT * FROM contacts WHERE user_id = $userid";
            $result = $dbConnection->getConnection()->query($sql);
        }
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($data, $row);
        }
        if($sorted == true){
            usort($data, array('Contact', 'comparation'));
        }
        echo json_encode($data);
    }

    public static function delete($id)
    {
        if (isset($_SESSION['id'])) {
            $dbConnection = new DBConnector();
            $sql = "DELETE FROM contacts WHERE id = $id";
            $result = $dbConnection->getConnection()->query($sql);
        }
    }

    public static function put($contact){
        if (isset($_SESSION['id'])) {
            $dbConnection = new DBConnector();
            $sql = "UPDATE contacts SET first_name = \"$contact->first_name\", last_name = \"$contact->last_name\", birth_date = \"$contact->birth_date\", email = \"$contact->email\", phone = \"$contact->phone\" WHERE id = $contact->id  ";
            $result = $dbConnection->getConnection()->query($sql);
            echo $sql;
        }
    }

    public static function search($searchInput){
        if (isset($_SESSION['id'])) {
            $userid = $_SESSION['id'];
            $dbConnection = new DBConnector();
            $sql = "SELECT * FROM contacts where user_id = $userid AND (first_name LIKE '%".$searchInput."%' OR last_name LIKE '%".$searchInput."%' OR birth_date LIKE '%".$searchInput."%' OR email LIKE '%".$searchInput."%' OR phone LIKE '%".$searchInput."%')";
            $result = $dbConnection->getConnection()->query($sql);
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($data, $row);
            }
            echo json_encode($data);
        }
    }

    public static function comparation($contact1,$contact2){
        return $contact1['first_name'] > $contact2['first_name'];
    }
}