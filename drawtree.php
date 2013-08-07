<?php
session_start();
include('/include/connect.php');
include('/include/html_codes.php');
$error_message='';
$options='';
if(isset($_POST['submit']))
{
   // $error_message='';
    //$error=array();
    //if(empty($_POST['firstname'])){
      //  $error[]='firstname should not be empty';
    //}
    //else if (ctype_alnum($_POST['firstname'])) {
    //$firstname=$_POST['firstname'];
    echo 'olumi';
    $myInputs = $_POST['myInputs'];
foreach ($myInputs as $eachInput) {
     echo $eachInput . "<br>";
}
//}
    echo " Hola " ; 
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
echo $total;
echo "<br>";
echo $count;
$overall=$count*3;
$averagepercentage=$total/$count *100;
if ($averagepercentage<=33){
    $colorcode='#000000';
}
if ($averagepercentage<=66){
     $colorcode='#ff00ff';
}
if ($averagepercentage>66){
    $colorcode='#00ff00';
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


context.stroke();
// draw circle
context.globalAlpha = 0.5; // set global alpha
context.beginPath();
context.arc(359, 150, 70, 0, 2 * Math.PI, false);
context.fillStyle = "red";
context.fill();
// part of the cloud
context.globalAlpha=0.5;
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

}
</script>
         
         
    </head>
        <body>
        <div id="wrapper"><?php headerWithRegisterLinks()?>
            <aside id="left_side"></aside>
            
            <section id="right_side">
                
                <div id="main" class="container">
                    <h3>Answer the questions</h3>
                    <form id="questionwithanswer" method="post" action="drawtree.php">
                   <?php echo $error_message; ?>
                    <div class="field2">
                        <label for="firstname"> </label>
                        
                       
                      
                        
                        <p class="hint">20 characters maximum</p>
                        <canvas id="myCanvas" width="700" height="450" style="border:1px
solid black;">
</canvas>
                    <?php echo "Israel me"; ?>  
                    </div>
                    <input id="button" type="submit" class="button" default="Submit">
                    </form>
                   
                
            </section>
            
            
        </div>
    </body>
</html>

