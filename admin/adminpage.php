<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include('../include/connect.php');
include('../include/html_codes.php');
if(!isset($_SESSION['adminuser_id'])){
        header('Location:login.php');
}
$error_message='';
?>
<!DOCTYPE>
<html lang="en">
    <head>
        <title>
            Register
        </title>
        <link rel="stylesheet" href="../css/main.css">
         <link rel="stylesheet" href="../css/form.css">
         <link rel="stylesheet" href="../css/register.css">
    </head>
        <body>
        <div id="wrapper"><?php headerWithRegisterLinks()?>
            <aside id="left_side"><?php adminMenus() ?></aside>
            
            <section id="right_side">
                
                <form id="loginform" class="container" method="post" action="">
                    <h3>Welcome</h3>
                   <?php echo $error_message; ?>
                    <div class="field">
                        
                       </div>
                    
                    
                    
                    
                </form>
                
            </section>
            
            
        </div>
    </body>
</html>
