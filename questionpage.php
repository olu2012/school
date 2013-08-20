<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include('include/connect.php');
include('include/html_codes.php');
$error_message='';
$options='';
if(!isset($_SESSION['user_id'])){
        header('Location:login.php');
}
//createcategory();t   onchange=\"changeContent(this.value)\"
//onchange="showUser(this.value)"

function CreateQuestion(){
    
    $subcatid=$_GET["subcatid"];
     $result=  mysql_query("select questionid, question from question where categoriesid=$subcatid") or die(mysql_error());
$label="";   
$dropdownanswer="";

$total="";
while($row = mysql_fetch_assoc($result)) 
    {
  //$dropdownanswer="<td>";
     $dropdownanswer="<td><select name='myinputs[]'><option value='1'>Never</option><option value='2'>Sometimes</option><option value='3'>Frequently</option><option value='4'>Always</option></select>";   
  $label="<tr><td class=\"question\">";
//$test.=$row['question'];
    $label.=$row['question'];
    $label.="</td>";
    //$label.="</td><td>.$dropdownanswer</td></tr>";
    $total.=$label .$dropdownanswer;
   // $total.=$total;
 // $dropdown .= "\r\n<option value='{$row['maincategoryid']}'>{$row['maincategoryname']}</option>";

}

//$dropdown .= "\r\n</select>";


//echo $dropdown;
//echo $label;l

    echo $total;

}





if(isset($_POST['submit']))
{
    $error_message='';
    $error=array();
    if(empty($_POST['firstname'])){
        $error[]='firstname should not be empty';
    }
    else if (ctype_alnum($_POST['firstname'])) {
    $firstname=$_POST['firstname'];
}
else 
    {
    $error[]='Firstname must consist of alphabets only';
}
if(empty($_POST['lastname'])){
        $error[]='firstname should not be empty';
    }
    else if (ctype_alnum($_POST['lastname'])) {
    $lastname=$_POST['lastname'];
    
    }
    
    if(empty($_POST['sex'])){
        $error[]='Please select a value for sex';
    }
    else if (ctype_alnum($_POST['sex'])) {
    $sex=$_POST['sex'];
        }
    
    
    if(empty($_POST['year'])){
        $error[]='year should not be empty';
    }
    else if (ctype_alnum($_POST['year'])) {
    $year=$_POST['year'];
    
    }
    if(empty($_POST['form1'])){
        $error[]='form should not be empty';
    }
    else if (ctype_alnum($_POST['form1'])) {
    $form=$_POST['form1'];
    
    }
    
    if(empty($_POST['tutor'])){
        $error[]='tutor should not be empty';
    }
    else if (ctype_alnum($_POST['tutor'])){
    $tutor=$_POST['tutor'];
        }
        if (empty($error))
        {
            //Add item into to the database
            $result=  mysql_query("select * from student where firstname=$firstname and lastname=$lastname") or die(mysql_error());
       
            if(mysql_num_rows($result)==0){
              $activationcode=  md5(uniqid(rand()),true);
              $result2=  mysql_query("insert into student(id,firstname,lastname,sex,year,form,tutor,address,city,password,email) values('','$firstname','$lastname','$sex')") or die(mysql_error());
             if(!$result2){
                 die('could not insert into database'.  mysql_error());
             }
            }
            else{
                header('location:prompt.php?x=2');
            }
            }
        else {
        $error_message='<span class="error">';
        foreach($error as $key=>$value){
          $error_message="$value";  
        }
        
        $error_message.='</span>';
        }
   
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
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();
}
</script>
         
         
    </head>
        <body>
        <div id="wrapper"><?php headerWithRegisterLinks()?>
            <aside id="left_side"></aside>
            
            <section id="right_side">
                
                <div id="main" class="container">
                    <h2>Answer the questions</h2>
                    <form id="questionwithanswer" method="post" action="drawtree.php">
                   <?php echo $error_message; ?>
                    <div class="field2">
                        <table>
                            
                       
                        
                        <?php CreateQuestion(); ?>
                       </table>
                        
                        <p class="hint">20 characters maximum</p>
                        </div>
                    <input id="button" type="submit" class="button" default="Submit">
                    </form>
                   
                
            </section>
            
            
        </div>
    </body>
</html>
