 <?php
require_once 'db_connect.php';
session_start();
if(!$_SESSION['name'])
{
header("Location:login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
</style>
<link href="admin_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h2>&nbsp;</h2>
<?php
$cat=$_POST['category'];
$qry=mysql_query("DELETE FROM category WHERE category='$cat'", $con);
if(!$qry)
{
echo "</br><a href='administration.php' target='_self'>Back to Administration<<</a>";
die("Query Failed: ". mysql_error());
}
else
{
echo "<br/>";
echo "Category ".$cat." removed Successfully";
echo "<br/>";
echo "</br><a href='administration.php' target='_self'>Back to Administration<<</a>";
}

?>
<a href="administration.php" target="_self">Back to Administration</a>
<?php mysql_close($con); ?>
</body>
</html>