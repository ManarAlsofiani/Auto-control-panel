<?php

// Inser Data in table DB
// $Rightinput= ;
// $Leftinput= ;
// $Forwardinput= ;
include_once("directions.php");

$conn1 = new mysqli("localhost", "root", "","Map");
if(isset($_POST['Save'])) {

   $stmt= $conn1->prepare("insert into ROBOT_MAP(Rightt,Leftt,Forward) values(?,?,?);");
   $stmt->bind_param("iii",$_POST["Right"],$_POST["Left"],$_POST["Forward"]);
   $stmt->execute();

   echo"Done";



 }
 // Display data
 $sql= "select * from ROBOT_MAP";
 $result= $conn1->query($sql);
 ?>



 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <table border="1" align="center" style="line-height:25px;text-align:center;">
      <tr>
        <th>id</th>
        <th>Right</th>
        <th>Left</th>
        <th>Forward</th>
        <th>Start</th>
        <th>Delete</th>

      </tr>
      <?php
      if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
       ?>
       <tr>
      <td><?php echo $row['id'] ?></td>
     <td><?php echo $row['Rightt'];?></td>
     <td><?php echo $row['Leftt'];?></td>
     <td><?php echo $row['Forward'];?></td>
<td><input type="button" onclick="Start(<?php echo $row['Forward'];?>,<?php echo $row['Rightt']; ?>,<?php echo $row['Leftt']; ?>)" name="Start" value="Start"></td>
<td><input type="button" onclick="deleteme(<?php echo $row['id']; ?>)" name="Delete" value="Delete"></td>
    </tr>

    <script language="javascript">
  function deleteme(delid){
if (confirm("Do you want delete it ?")) {
  window.location.href='delete.php?del_id='+delid+ '';
  return true;
}

  }
  function Start(Up,Right,Left){
  window.location.href="start.php?str_id="+Up+"&str_id2="+Right+"&str_id3="+Left+"";

  return true;


  }
</script>

    <?php
}
}
else{


     ?>
     <tr>
       <th colspan="6">There is no data found!!!</th>
     </tr>
     <?php
   }
     ?>
    

   </table>
   </body>
 </html>
