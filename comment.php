<?php
$id=$_GET['id'];
$comment=htmlentities($_POST['comment']);
require_once 'db_connect.php';
$qry=mysql_query("INSERT INTO comments(cmnt_id,comment)VALUES('$id','$comment')", $con);
if(!$qry)
{
mysql_close($con);
die("Query Failed: ".mysql_error());
}
else
{
mysql_close($con);
header("Location:articles.php?id=$id");
}
?>