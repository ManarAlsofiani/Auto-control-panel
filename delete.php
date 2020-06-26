<?php
 include_once("add.php");
$select = "Delete from ROBOT_MAP where id='".$_GET['del_id']."'";
$query= mysqli_query($conn1,$select)or die($select);
header("location:add.php");
 ?>
