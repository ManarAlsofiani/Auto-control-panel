<!DOCTYPE html>
<?php
$conn = new mysqli("localhost", "root", "");
// Check connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE Map";
if ($conn->query($sql) === TRUE) {
echo "successfully";

}

$conn->close();

$conn1 = new mysqli("localhost", "root", "","Map");
// Check connection
if ($conn1->connect_error) {
  die("Connection failed: " . $conn1->connect_error);
}

// sql to create table
$sql = "CREATE TABLE ROBOT_MAP (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Rightt VARCHAR(50),
Leftt VARCHAR(50),
Forward VARCHAR(50)
)";

if ($conn1->query($sql) === TRUE) {
echo "successfully";

}



?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!-- Form: for user inter data  -->
    <form class="" action="add.php" method="post">
      <label>Right</label>
      <br>
      <input type="number" name="Right" value="Right" >
      <br><br>
      <label>Forward</label>
      <br>
      <input type="number" name="Forward" value="Forward">
      <br><br>
      <label>Left</label>
      <br>
      <input type="number" name="Left" value="Left">
      <br><br>
      <button type="submit" name="Save" value="Save"> Save</button>

    </form>
    <br><br>



  </body>
</html>
