<?php
include_once("add.php");

// $sql=$conn1->prepare("select Forward, Right, Left from ROBOT_MAP
//  where
// Forward='".$_GET['str_id']."'  Right='".$_GET['str_id2']."' Left='".$_GET['str_id3']."'
// ");
$F = $_GET['str_id'];
$R = $_GET['str_id2'];
$L = $_GET['str_id3'];

$result= $conn1->query("select
 Forward, Rightt, Leftt
 from ROBOT_MAP
 where
  Forward= ".$F."

")
or
die($conn1->error);

?>
 <!DOCTYPE html>
 <html>
 <body>

 <canvas id="myCanvas" width="500" height="500" style="border:1px solid #d3d3d3;">
 Your browser does not support the HTML5 canvas tag.</canvas>
<?php




if ($row['Rightt'] !== 0 &&  $row['Leftt'] !== 0 && $row['Forward'] !== 0) {
    while ($row = $result->fetch_assoc()) {
  // echo $row['Forward'];
  // echo $row['Rightt'];
  // echo $row['Leftt'];


  ?>
  <script>
  var c = document.getElementById("myCanvas");
  var ctx = c.getContext("2d");
  var ctx1 = c.getContext("2d");



  ctx1.lineWidth = 10;
  ctx1.lineJoin = "miter";
  ctx1.miterLimit = 5;
  ctx1.moveTo(10+10, <?php echo $row['Forward'];?>-10);
  ctx1.lineTo(10, <?php echo $row['Forward'];?>+4);
  ctx1.lineTo(10-10, <?php echo $row['Forward'];?> -10);
  ctx1.stroke();

  ctx.beginPath();
  ctx.lineWidth = 10;

  ctx.lineCap = "square";
  ctx.moveTo(10, 10);
  ctx.lineTo(10, <?php echo $row['Forward'];?>);
  ctx.stroke();


  ctx1.lineWidth = 10;
  ctx1.lineJoin = "miter";
  ctx1.miterLimit = 5;
  ctx1.moveTo(<?php echo $row['Rightt'];?>-10, <?php echo $row['Forward'];?>+10);
  ctx1.lineTo(<?php echo $row['Rightt'];?>+4, <?php echo $row['Forward'];?>);
  ctx1.lineTo(<?php echo $row['Rightt'];?>-10, <?php echo $row['Forward'];?> -10);
  ctx1.stroke();


  ctx.beginPath();
  ctx.lineCap = "square";
  ctx.moveTo(10, <?php echo $row['Forward'];?>);
  ctx.lineTo(<?php echo $row['Rightt'];?>, <?php echo $row['Forward'];?>);
  ctx.stroke();

  ctx1.lineWidth = 10;
  ctx1.lineJoin = "miter";
  ctx1.miterLimit = 5;
  ctx1.moveTo(<?php echo $row['Rightt'];?>+10, <?php echo $row['Leftt'];?>-10);
  ctx1.lineTo(<?php echo $row['Rightt'];?>, <?php echo $row['Leftt'];?>+3);
  ctx1.lineTo(<?php echo $row['Rightt'];?>-10, <?php echo $row['Leftt'];?> -10);
  ctx1.stroke();


  ctx.beginPath();
  ctx.lineCap = "square";
  ctx.moveTo(<?php echo $row['Rightt'];?>, <?php echo $row['Forward'];?>);
  ctx.lineTo(<?php echo $row['Rightt'];?>, <?php echo $row['Leftt'];?>);
  ctx.stroke();

  </script>
<?php



}}
?>


 </body>
 </html>
