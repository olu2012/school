<?php

/*
 * Connect to database
 * 
 */
$server='db485717078.db.1and1.com';
$username='dbo485717078';
$password='marsstudent';
$db_selected='db485717078';
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
