<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include('include/connect.php');
include('include/html_codes.php');
$error_message='';
if(isset($_POST['submit']))
{
    $error_message='olu';
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
 else {
    echo'oooo';
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
    </head>
        <body>
        <div id="wrapper"><?php headerWithRegisterLinks()?>
            <aside id="left_side"></aside>
            
            <section id="right_side">
                
                <form id="loginform" class="container" method="post" action="">
                    <h3>Login</h3>
                   <?php echo $error_message; ?>
                    <div class="field">
                        <label for="username"> Username:</label>
                        <input type="text" class="input" id="username" name="username" maxlength="20" />
                        <p class="hint">20 characters maximum</p>
                        </div>
                    <div class="field">
                        <label for="lastname"> Password:</label>
                        <input type="password" class="input" id="password" name="password" maxlength="20" />
                        <p class="hint">20 characters maximum</p>
                       </div>
                    
                    
                    
                    <input type="submit"  name="submit" id="submit"  class="button" value="submit">
                </form>
                
            </section>
            
            
        </div>
    </body>
</html>
