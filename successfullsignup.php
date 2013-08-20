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
                
                <div id="main" class="container">
                    <h3>Thank you for signing up</h3>
                   The Administrator would get back to you as soon as possible
                       
                      
                        
                      
                   
                
            </section>
            
            
        </div>
    </body>
</html>

