<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include('include/connect.php');
include('include/html_codes.php');
if(!isset($_SESSION['user_id'])){
        header('Location:login.php');
}

$error_message='';
$options='';
//createcategory();t   onchange=\"changeContent(this.value)\"
//onchange="showUser(this.value)"
function CreateCategory(){
     $result=  mysql_query("select maincategoryid, maincategoryname from maincategories") or die(mysql_error());
   
     $dropdown = "<select name='categories' onchange=\"showUser(this.value)\">";
$maincategorylink="<ul id=\"maincategorieslink\" >";
while($row = mysql_fetch_assoc($result)) {

  $dropdown .= "\r\n<option value='{$row['maincategoryid']}'>{$row['maincategoryname']}</option>";
$maincategorylink.="<li><a href=\"subcategory.php?subcatid={$row['maincategoryid']}\">{$row['maincategoryname']}</a> </li>";
}

$dropdown .= "\r\n</select>";
$maincategorylink.="</ul>";
//echo $dropdown;
echo $maincategorylink;


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
         

         
         
    </head>
        <body>
        <div id="wrapper"><?php headerWithRegisterLinks()?>
            <aside id="left_side"></aside>
            
            <section id="right_side">
                
                <div id="main" class="container">
                    <h3>Pick a Category Answer the questions</h3>
                    
                   <?php echo $error_message; ?>
                    <div class="field">
                        <label for="firstname"> Chose Category:</label>
                        
                        <table>
                            <tr><td>
                        <?php CreateCategory(); ?>
                      </td></tr>
                       </table>
                       
                        </div>
                   
                
            </section>
            
            
        </div>
    </body>
</html>