<?php

$con = mysql_connect("localhost","root","");
if(!$con)
{
die("connection to database failed".mysql_error());
}

$dataselect = mysql_select_db("blogin",$con);
if(!$dataselect)
{
die("Database namelist not selected".mysql_error());
}
$sitename="Blogin";
?>