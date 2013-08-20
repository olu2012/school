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
//$id = $_GET['id'];

function displaymaincategories(){
    $q = mysql_query("SELECT * FROM maincategories");
    while($row = mysql_fetch_array($q)) {
echo"<option value=\"".$row['maincategoryid']."\" >".$row['maincategoryname']."</option>";
}
echo"</select>";
}
      function getcategoriesdropdown(){
          //$id = $_GET['id'];
          $id=0;
          echo'<form name="testform">';
$q = mysql_query("SELECT * FROM maincategories");
echo"<select name=\"cat\" onChange=\"Load_id()\">";



while($row = mysql_fetch_array($q)) {
$selected = ($row["maincategoryid"] == $id)? "SELECTED":"";
echo"<option value=\"".$row['maincategoryid']."\"". $selected." >".$row['maincategoryname']."</option>";
}
echo"</select>";
          
          
      }
        
           
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
         <script>
             
             function getSubCategories(strURL)
{
 alert("hello");
   var req = getXMLHTTP();
   if (req)
   {
       //alert("hello");
     req.onreadystatechange = function()
     {
      if (req.readyState == 4)
      {
	 // only if "OK"
	 if (req.status == 200)
         {
             alert(req.responseText);
	    document.getElementById('citydiv').innerHTML=req.responseText;
	 } else {
   	   alert("There was a problem while using XMLHTTP:\n" + req.statusText);
	 }
       }
      }
   req.open("GET", strURL, true);
   req.send(null);
   }
   else{
       
        alert("hello");
   }
}
             </script>
             <script type="text/javascript"> 
        function getXMLHTTP() {
           var x = false;
           try {
              x = new XMLHttpRequest();
           }catch(e) {
             try {
                x = new ActiveXObject("Microsoft.XMLHTTP");
             }catch(ex) {
                try {
                    req = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e1) {
                    x = false;
                }
             }
          }
          return x;
        }
        </script>
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
                    <h2>Add a new Question</h2>
                     <form method="post">
                
                <table border="1" cellspacing="2" cellpadding="2">
                    <tr>
                        <td>Category Name</td><td>  <input type="text" name="maincategoryname"/> </td>
                        </td>
                        <td>  
  <select style="background-color: #ffffa0" name="maincategory" onchange= "getSubCategories('findSubCategories.php?maincategory=+ this.value')"><option>Select Category</option>  <?php displaymaincategories(); ?>     </select></td> 
		<td> <div id="citydiv">
 <select name="select">
 <option>Select City</option>
     </select></div>  </td>
                        <td><input type="submit" name="save" value="save" /></td>
                    </tr>
                </table>
            </section>
            
            
        </div>
    </body>
</html>
