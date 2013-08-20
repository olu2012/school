<?php

/*
 * Connect to database
 * 
 */
$server='localhost';
$username='root';
$password='';
$db_selected='student';
$connect = mysql_connect($server, $username, $password);

if(!$connect)
{
    die('could not connect'.mysql_error());
}
$db_selected=  mysql_select_db($db_selected);

if(!$db_selected)
{
    die('could not select'.mysql_error());
}

?>
