<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include('include/connect.php');
include('include/html_codes.php');
if(isset($_SESSION['user_id'])){
        header('Location:http://s485703299.websitehome.co.uk/answerquestions.php');
}

$error_message='';
if(isset($_POST['submit']))
{
    $error_message='';
    $error=array();
    if(empty($_POST['username']))
        {
        $error[]='username should not be empty';
    }
    else{
         $username= mysql_real_escape_string($_POST['username']);
    }
   
if(empty($_POST['password'])){
        $error[]='password should not be empty';
    }
    else {
       $password= mysql_real_escape_string($_POST['password']);
   
}
         
        if (empty($error))
        {
            $_SESSION['user_id']=null;
            echo 'ttteooo';
           // echo $username;
           // echo '<br>';
            //echo $password;
            //login code here
               $result=  mysql_query("select id from student where username='$username' and password='$password'") or die(mysql_error());
           if(mysql_num_rows($result)==1){
               echo 'israel';
               while ($row=mysql_fetch_array($result)){
                   $_SESSION['user_id']=$row['id'];
               }
               
               echo $username;
            echo '<br>';
            echo $password;
                header('Location: http://s485703299.websitehome.co.uk/answerquestions.php');
               }
               
            else{
                $error_message='<span class="error">Username or password is incorrect</span>';
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