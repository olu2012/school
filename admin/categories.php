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
      
        
           
           function showmaincategories(){
               $resultcategories=mysql_query("select * from maincategories") or die(mysql_error());
           while($test = mysql_fetch_array($resultcategories))
			{
				$id = $test['maincategoryid'];	
				echo "<tr align='center'>";	
				
				echo"<td><font color='black'>". $test['maincategoryname']. "</font></td>";	
				echo"<td> <a href ='categoriesview.php?catid=$id'>Edit</a>";
				echo"<td> <a href ='categoriesdelete.php?catid=$id'><center>Delete</center></a>";
									
				echo "</tr>";
			}
           }
           
      if(isset($_POST['save']))
{	
	$maincategoryname = $_POST['maincategoryname'];
	

	mysql_query("insert into  maincategories (maincategoryid,maincategoryname) values ('','$maincategoryname') ")
				or die(mysql_error()); 
	echo "Saved!";
	
	//header("Location: index.php");			
}     
           
           
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
                   <?php 
                   
               
                   showmaincategories();
                   ?>
                    
                </table>
                
                    <p></p>
                    <h2>Add a new Category</h2>
                     <form method="post">
                
                <table border="1" cellspacing="2" cellpadding="2">
                    <tr>
                        <td>Category Name</td><td>  <input type="text" name="maincategoryname"/> </td>
                        </td>
                        <td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
                    </tr>
                </table>
            </section>
            
            
        </div>
    </body>
</html>
