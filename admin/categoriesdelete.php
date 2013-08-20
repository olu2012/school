<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include('../include/connect.php');
include('../include/html_codes.php');
if(!isset($_SESSION['adminuser_id'])){
        header('Location:logout.php');
}

$error_message='';
      
        $catid =$_REQUEST['catid'];
$result = mysql_query("delete FROM maincategories WHERE maincategoryid  = '$catid'");
//$rows = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				//$categoryname=$rows['maincategoryname'] ;
				
?>

<!DOCTYPE>
<html lang="en">
    <head>
        <title>
            Categories
        </title>
        <link rel="stylesheet" href="../css/main.css">
         <link rel="stylesheet" href="../css/form.css">
         <link rel="stylesheet" href="../css/register.css">
    </head>
        <body>
        <div id="wrapper"><?php headerWithRegisterLinks()?>
            <aside id="left_side">
                <?php adminMenus() ?>
                
                
            </aside>
            
            <section id="right_side">
                
                <?php     //   echo  $categories_string
                ?>
                
                <table border="0" cellspacing="2" cellpadding="2">
                   
                </table>
                
            </section>
            
            
        </div>
    </body>
</html>
