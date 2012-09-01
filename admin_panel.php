<?php
session_start();
if(isset($_SESSION['name']))
{
if(!$_SESSION['name']=='admin')
{
header("Location:login.php?id=You are not authorised to access this page unless you are administrator of this website");
}
}
else
{
header("Location:login.php?id=You are not authorised to access this page unless you are administrator of this website");
}
?>
<?php
require_once 'db_connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Admin Dashboard</title>
<style type="text/css">
#hold #log {
color: #EE4902;
}
</style>
<link href="admin_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="hold">
<div id="top">
<h2 align="center">CONTENT MANAGEMENT SYSTEM ADMINISTRATION PANEL</h2>
</div>
<div id="log">
<?php
echo "Welcome ".$_SESSION['name'];
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<a href=logout.php>Logout</a>";
?>
</div>

<h3>Admin Dashboard</h3><br/>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php" target="_blank"><img src="images/Home.jpg" alt="See home page" width="150" height="150" ><!-- See the page edited --></a> &nbsp;&nbsp;&nbsp;&nbsp;
<a href=new_category.php ><img src="images/Useredit.jpg" alt="Create Article" width="150" height="150"><!-- Create New Category --></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href=remove_category.php ><img src="images/delete.jpg" alt="delete Article"width="150" height="150"><!-- Remove a Category --></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href=create_new.php ><img src="images/create.jpg" alt="Create Article" width="150" height="150"><!-- Create New Article --></a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href=admin_panel.php?id=viewall><img src="images/view.jpg" alt="Create Article" width="150" height="150"><!-- View all Articles --></a><br/><br/>
<div id="left">
<b>Articles by Category:</b>
<?php
$qry=mysql_query("SELECT * FROM category ", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
/* Fetching data from the field "title" */
while($row=mysql_fetch_array($qry))
{
echo "<li><a href=admin_panel.php?cat=".$row['category'].">".$row['category']."</a></li>";
}
?>
</div>
<div id="right">

<?php
if(isset($_GET['id'])=="viewall")
{
$qry=mysql_query("SELECT * FROM articles order by articles.id DESC ", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
echo "<table>";
/* Fetching data from the field "title" */
while($row=mysql_fetch_array($qry))
{
echo "<tr>";
echo "<td><a href=articles.php?id=".$row['id'].">".$row['title']."</a></td>";
echo "<td><a href=edit_article.php?id=".$row['id'].">edit</a></td>";
echo "<td><a href=delete_article.php?id=".$row['id'].">delete</a></td>";
echo "</tr>";
}
echo "</table>";
}
?>

  <?php
if(isset($_GET['cat']))
{
$cat=$_GET['cat'];


$qry=mysql_query("SELECT * FROM articles WHERE category='$cat' order by articles.id DESC", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

echo "<table>";
while($row=mysql_fetch_array($qry))
{
//echo $row['title'];
echo "<tr>";
echo "<td><a href=articles.php?id=".$row['id'].">".$row['title']."</a></td>";
echo "<td><a href=edit_article.php?id=".$row['id'].">edit</a></td>";
echo "<td><a href=delete_article.php?id=".$row['id'].">delete</a></td>";
echo "</tr>";
}
echo "</table>";
}
?>
</div>
</div>
</body>
</html>
