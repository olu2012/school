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
    else{
    $tutor=$_POST['tutor'];
        }
        
        if(empty($_POST['homeaddress'])){
        $error[]='address should not be empty';
    }
    else {
    $address=$_POST['homeaddress'];
        }
        
        if(empty($_POST['postcode'])){
        $error[]='post code should not be empty';
    }
    else {
    $postcode=$_POST['postcode'];
        }
        
        if(empty($_POST['city'])){
        $error[]='city should not be empty';
    }
    else if (ctype_alnum($_POST['city'])){
    $city=$_POST['city'];
        }
        
        
        if(empty($_POST['password'])){
        $password[]='password should not be empty';
    }
    else{
       $password= $_POST['password'];
    }
        
        
        
   if(empty($_POST['email']))
            {
        $error[]='email should not be empty';
    }
    else 
        {
    $email=$_POST['email'];
        }
        
        
        
        if (empty($error))
        {
            //Add item into to the database
            $result=  mysql_query("select * from student where firstname='$firstname' and lastname='$lastname'") or die(mysql_error());
       
            if(mysql_num_rows($result)==0){
              $activationcode=  md5(uniqid(rand()),true);
              $username=$firstname.".".$lastname;
              $active=0;
              $result2=  mysql_query(" insert into student(id,firstname,lastname,sex,year,form,tutor,postcode,address1,city,username,password,email,active) values('','$firstname','$lastname','$sex','$year','$form','$tutor','$postcode','$address','$city','$username','$password','$email','$active')") or die(mysql_error());
             if(!$result2){
                 die('could not insert into database'.  mysql_error());
             }
             else{
                  header('location:successfullsignup.php?x=2');
                 
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
function diplaytutor() {
    
    
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
         
         <script type="text/javascript" charset="utf-8">  
             
    function validatePass(p1, p2) {
    if (p1.value != p2.value || p1.value == '' || p2.value == '') {
        p2.setCustomValidity('Password incorrect');
    } else {
        p2.setCustomValidity('');
    }
}

function updateUsername(){         
first = document.getElementById("firstname").value;         
last = document.getElementById("lastname").value;  
document.getElementById("username").value = first+"."+last;     
} </script>
    </head>
        <body>
        <div id="wrapper"><?php headerWithRegisterLinks()?>
            <aside id="left_side"></aside>
            
            <section id="right_side">
                
                <form id="generform" class="container" method="post" action="">
                    <h3>Register</h3>
                   <?php echo $error_message; ?>
                    <div class="field">
                        <label for="firstname"> First Name:*</label>
                        <input type="text" class="input" id="firstname" name="firstname" maxlength="20" required onkeyup="updateUsername();" />
                        <p class="hint">20 characters maximum</p>
                        </div>
                    
                    <div class="field">
                        <label for="lastname"> Middle Name:</label>
                        <input type="text" class="input" id="middlename" name="middlename" maxlength="20" />
                        <p class="hint">20 characters maximum</p>
                       </div>
                    
                    <div class="field">
                        <label for="lastname"> Last Name:* </label>
                        <input type="text" class="input" id="lastname" name="lastname" maxlength="20" required onkeyup="updateUsername();" />
                        <p class="hint">20 characters maximum</p>
                       </div>
                    <div class="field">
                        <label for="username"> Username:* </label>
                        <input type="text" class="input" id="username" name="username" maxlength="20" required/>
                        <p class="hint">20 characters maximum</p>
                       </div>
                    <div class="field">
                        <label for="dateofbirth"> Date of Birth:* </label>
                        <input type="date" class="input" id="dob" name="dob" maxlength="20" required/>
                        <p class="hint">20 characters maximum</p>
                       </div>
                    <div class="field">
                        <label for="sex"> Sex:</label>
                        <select name="sex" id="sex" class="input">
                          
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                          </select>
                        <p class="hint">Select sex</p>
                       </div>
                    
                    
                    <div class="field">
                        <label for="year"> Year:</label>
                        <input type="text" class="input" id="year" name="year" maxlength="20" />
                        <p class="hint">20 characters maximum</p>
                       </div>
                    <div class="field">
                        <label for="form1">Form Tutor:*</label>
                        <input type="text" class="input" id="form1" name="form1" maxlength="20"  required />
                        <p class="hint">20 characters maximum</p>
                       </div>
                    <div class="field">
                        <label for="tutor"> tutor:</label>
                        <input type="text" class="input" id="tutor" name="tutor" maxlength="20" />
                        <p class="hint">20 characters maximum</p>
                       </div>
                    <div class="field">
                        <label for="homeaddress"> Home Address:</label>
                        <input type="text" class="input" id="homeaddress" name="homeaddress" maxlength="40" />
                        <p class="hint">40 characters maximum</p>
                       </div>
                    
                    <div class="field">
                        <fieldset>
                   <legend>Contact Details:</legend>  
                        <label for="contactfullname"> Full Name:</label>
                        <input type="text" class="input" id="contactfullname" name="contactfullname" maxlength="40" />
                        <p class="hint">40 characters maximum</p>
                        <label for="contactemail"> Email:</label>
                        <input type="text" class="input" id="contactemail" name="contactemail" maxlength="40" />
                        <p class="hint">40 characters maximum</p>
                        
                        <label for="contactnumber"> Contact Number:</label>
                        <input type="text" class="input" id="contactnumber" name="contactnumber" maxlength="40" />
                        <p class="hint">40 characters maximum</p>
                        
                        <input type="checkbox" class="input1" id="contactuser" name="contactuser" maxlength="40" /><label>Do you want to make this person a user</label>
                        
                        </fieldset>
                       </div>
                    
                    
                    <div class="field">
                        <label for="postcode"> Post Code:</label>
                        <input type="text" class="input" id="postcode" name="postcode" maxlength="10" />
                        <p class="hint">10 characters maximum</p>
                       </div>
                    <div class="field">
                        <label for="city"> City:</label>
                        <input type="text" class="input" id="city" name="city" maxlength="20" />
                        <p class="hint">20 characters maximum</p>
                       </div>
                    <div class="field">
                        <label for="password"> Password:</label>
                        <input type="password" class="input" id="password" name="password" maxlength="20" required />
                        <p class="hint">20 characters maximum</p>
                       </div>
                    <div class="field">
                        <label for="confirmpassword">Confirm Password:*</label>
                        <input type="password" class="input" id="confirmpassword" name="confirmpassword" maxlength="20" required onfocus="validatePass(document.getElementById('password'), this);" oninput="validatePass(document.getElementById('password'), this); />
                        <p class="hint">20 characters maximum</p>
                       </div>
                    <div class="field">
                        <label for="lastname"> Email:</label>
                        <input type="text" class="input" id="email" name="email" maxlength="20" />
                        <p class="hint">40 characters maximum</p>
                       </div>
                     <div class="field">
                    <input type="submit"  name="submit" id="submit"  class="button" value="submit">
                     </div>
                </form>
                
            </section>
            
            
        </div>
    </body>
</html>