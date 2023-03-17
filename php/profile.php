<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['profile'])) {

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    $email = $_POST['email'];

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "guvi";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT useremail,username,userdob,usernumber,userid FROM auth where useremail='$email'";
    
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        die(json_encode(array("email" => $row["useremail"], "number" => $row["usernumber"], "dob" => $row["userdob"], "name" => $row["username"],"id"=>$row["userid"])));
    }

    $conn->close();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    $id = $_POST['id'];
    $name=$_POST["name"];
    $number=$_POST["number"];
    $email=$_POST["email"];
    $dob=$_POST["dob"];

    $servername = "guvi.cvvq0uavgzap.eu-north-1.rds.amazonaws.com";
    $username = "admin";
    $password = "administrator";
    $dbname = "guvi";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "Update auth set useremail='$email' ,usernumber='$number',username='$name',userdob='$dob' where userid='$id'";
    
    $result = $conn->query($sql);

    if($result)
    {
        die(json_encode((array("status"=>true))));
    }
    else
    {
        die(json_encode((array("status"=>false))));
    }

    $conn->close();
}


?>
