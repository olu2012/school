<?php
session_start();
include('include/connect.php');
include('include/html_codes.php');
$error_message='';
$options='';
if(!isset($_SESSION['user_id'])){
        header('Location:login.php');
}
if(isset($_POST['submit']))
{
   // $error_message='';
    //$error=array();
    //if(empty($_POST['firstname'])){
      //  $error[]='firstname should not be empty';
    //}
    //else if (ctype_alnum($_POST['firstname'])) {
    //$firstname=$_POST['firstname'];
   // echo 'olumi';
    $myInputs = $_POST['myInputs'];
foreach ($myInputs as $eachInput) {
     echo $eachInput . "<br>";
}
//}
  //  echo " Hola " ; 
//}

}
 else {
     $total=0;
     $count=0;
     
     $myInputs = $_POST['myinputs'];
foreach ($myInputs as $eachInput) {
    $multiplier=0;
    $count=$count +1;
    if($eachInput==2)
    {
        $multiplier=1;
    }
    if($eachInput==3)
    {
        $multiplier=2;
    }
    if($eachInput==4)
    {
        $multiplier=3;
    }
    $total=$total + 1 * $multiplier;
     //echo $eachInput . "<br>";
}
//echo $total;
echo "<br>";
//echo $count;
$overall=$count*3;
$averagepercentage=$total/($overall)*100;
if ($averagepercentage<=33){
    $colorcode='#000000';
    $treeimage="treeactivecitizenbrown.jpg";
}
if ($averagepercentage>33 && $averagepercentage<= 66){
     $colorcode='#89e07b';
     $treeimage="treeactivecitizenlightgreen.jpg";
}
if ($averagepercentage>66){
    $colorcode='#295223';
    $treeimage="treeactivecitizendarkgreen.jpg";
}

if ($averagepercentage==0){
    $colorcode='#fff';
    $treeimage="treeblank.jpg";
}
  // $colorcode='#00ff00';
}
?>
<!DOCTYPE>
<html lang="en">
    <head>
        <title>
            Register
        </title>
        <link rel="stylesheet" href="css/main.css">
         <link rel="stylesheet" href="css/form.css">
         <link rel="stylesheet" href="css/register.css">
         <script type="text/javascript" src="js/ajax.js"></script>
         <script>
window.onload = function(){
var canvas = document.getElementById("myCanvas");
var context = canvas.getContext("2d");
var startX = 200;
var startY = 100;
// draw tree shape
context.beginPath();
context.moveTo(startX, startY);
context.bezierCurveTo(startX - 40, startY + 20, startX - 40,
startY + 70, startX + 60, startY + 70);
context.bezierCurveTo(startX + 80, startY + 100, startX + 150,
startY + 100, startX + 170, startY + 70);
context.bezierCurveTo(startX + 250, startY + 70, startX + 250,
startY + 40, startX + 220, startY + 20);
context.bezierCurveTo(startX + 260, startY - 40, startX + 200,
startY - 50, startX + 170, startY - 30);
context.bezierCurveTo(startX + 150, startY - 75, startX + 80,
startY - 60, startX + 80, startY - 30);
context.bezierCurveTo(startX + 30, startY - 75, startX - 20,
startY - 60, startX, startY);
context.closePath();


//add a radial gradient
//var grdCenterX = 260;
//var grdCenterY = 80;
//var grd = context.createRadialGradient(grdCenterX, grdCenterY,
//10, grdCenterX, grdCenterY, 200);
//grd.addColorStop(0, "#00f400"); // light blue 8ED6FF
//grd.addColorStop(1, "#00ff00"); // dark blue 004CB3
//context.fillStyle = grd;
//context.fill();
// set the line width and stroke color
var colorcode = "<?php echo $colorcode; ?>";
//colorcode="#333333";
context.lineWidth = 2;
//context.strokeStyle = "#00ff00";
context.strokeStyle = colorcode;
context.fillStyle = "white";
context.fill();

//$averagepercentage
var wordpercent ="<?php echo $averagepercentage; ?>";
context.stroke();
// draw circle
//context.globalAlpha = 0.5; // set global alpha
//context.beginPath();
//context.arc(359, 150, 70, 0, 2 * Math.PI, false);
//context.fillStyle = "red";
//context.fill();
// part of the cloud
//context.globalAlpha=0.5;
context.beginPath();
context.moveTo(startX, startY);
context.bezierCurveTo(startX - 40, startY + 20, startX - 40,
startY + 70, startX + 60, startY + 70);
context.bezierCurveTo(startX + 80, startY + 100, startX + 150,
startY + 100, startX + 170, startY + 70);
context.closePath();
var colorcode = "<?php echo $colorcode; ?>";
//colorcode="#333333";
context.lineWidth = 2;
//context.strokeStyle = "#00ff00";
context.strokeStyle = colorcode;
context.fillStyle = colorcode;
context.fill();


// rectangle
var canvas = document.getElementById("myCanvas2");
var context = canvas.getContext("2d");
context.rect(canvas.width / 2 - 100, canvas.height / 2 -150,
100, 350);
context.fillStyle = "#0000ff";
context.fill();
context.lineWidth = 2;
context.strokeStyle = "black";
context.stroke();
//inner rectangle

var canvas = document.getElementById("myCanvas2");
var context = canvas.getContext("2d");
context.rect(canvas.width / 2 - 200, canvas.height / 2 -150,
100, 350);
context.fillStyle = "#0000ff";
context.font = "40px sans-serif";
context.fillText(wordpercent, 30, 80);
//context.globalAlpha=0.5;
context.fill();
context.lineWidth = 2;
context.strokeStyle = "black";
context.stroke();
//
//third rectangle

//var canvas = document.getElementById("myCanvas2");
//var context = canvas.getContext("2d");
//context.rect(canvas.width / 2 + 100, canvas.height / 2 -150,
////100, 350);
//context.fillStyle = "#0000ff";
//context.fill();
//context.lineWidth = 2;
//context.strokeStyle = "black";
//context.stroke();

}
</script>
         
         
    </head>
        <body>
        <div id="wrapper"><?php headerWithRegisterLinks()?>
            <aside id="left_side"></aside>
            
            <section id="right_side">
                
                <div id="main" class="container">
                    <h3></h3>
                    <img src="images/<?php echo $treeimage?>" alt="images"><br/>
                    <p></p> <br>
                    <form id="questionwithanswer" method="post" action="drawtree.php">
                   <?php echo $error_message; ?>
                    <div class="field2">
                        <label for="firstname"> </label>
                        
                       
                      
                        
                        <p class="hint"></p>
                        <canvas id="myCanvas" width="700" height="400" style="border:1px
solid black;">
</canvas>
                        <p></p> <br>
                        
                        <canvas id="myCanvas2" width="700" height="400" style="border:1px
solid black;">
</canvas>
                    </div>
                   
                    </form>
                   
                
            </section>
            
            
        </div>
    </body>
</html>

