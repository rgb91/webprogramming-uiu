<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loginsignup";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_id, name FROM user_details";
$result = $conn->query($sql);

$conn->close();

?>
<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
<body>

<h1>AJAX Intro</h1>

<?php 
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
      <a href="#" onclick="getUserDetails(<?php echo $row['user_id']; ?>);return false;"><?php echo $row['name']; ?></a><br>
<?php 
    }
  }
?>
<br>
<br>
<p id="user_details"></p>

<script>
// get_details.php?user_id=
function getUserDetails(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("user_details").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("user_details").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "get_details.php?user_id="+str, true);
  xhttp.send();
}
</script>

</body>
</html>
