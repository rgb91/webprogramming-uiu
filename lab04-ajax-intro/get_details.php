<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginsignup";

$user_id =  '';
if (isset($_GET['user_id'])) {
	$user_id = $_GET['user_id'];
} else {
	die('Error');
}
// $user_id = isset($_GET['user_id'])? $_GET['user_id'] : die('User ID Needed');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user_details WHERE user_id=".$user_id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	echo '<h3>'.$row['name'].'</h3>';
    	echo 'Email: '.$row['email'].'<br>';
    	echo 'Address: '.$row['address'].'<br>';

    }
}

$conn->close();
?>