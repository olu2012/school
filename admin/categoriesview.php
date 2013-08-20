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
$result = mysql_query("SELECT * FROM maincategories WHERE maincategoryid  = '$catid'");
$rows = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$categoryname=$rows['maincategoryname'] ;
				
if(isset($_POST['save']))
{	
	$maincategoryname = $_POST['maincategoryname'];
	

	mysql_query("UPDATE maincategories SET maincategoryname ='$maincategoryname' WHERE maincategoryid = '$catid'")
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
                
                <form method="post">
                
                <table border="0" cellspacing="2" cellpadding="2">
                    <tr>
                        <td>Category Name</td><td>  <input type="text" name="maincategoryname" value="<?php echo $categoryname ?>"/> </td>
                        </td>
                        <td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
                    </tr>
                </table>
                </form>
            </section>
            
            
        </div>
    </body>
</html>
