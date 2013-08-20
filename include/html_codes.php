<?php
//headerWithRegisterLinks();
//topRightLinks();
//Code for header
function headerWithRegisterLinks()
{
   echo '<header id="main_header">
       <div id="align_right">
    
' ;
   topRightLinks();
   echo "</div>
       
<a href=\"index.php\"><img src=\"images/logo.gif\"></a>
</header>"
;
}
function topRightLinks()
{
    if(!isset($_SESSION['user_id'])){
        echo '<a href="register.php">Register</a> | <a href="login.php">Login</a>';
    }
 else 
     {
     
        echo '<a href="account.php">My Account</a> | <a href="logout.php">Log Out</a>'; 
 }
}

function adminMenus(){
    if(isset($_SESSION['adminuser_id'])){
    echo '<ul><li>Reports</li><li>Users</li><li>Manage Questions</li>
<li><a href="categories.php">Manage Questions Categories</a></li>
<li>Manage Questions</li>
</ul>';
}

    }
?>
