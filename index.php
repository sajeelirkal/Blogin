
<?php
require_once 'db_connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Blog In!!!</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="contain">
<div id="header">
<h1><?php echo "$sitename"; ?></h1>

</div>
<div id="menus">
<a href="index.php" target="_self">Home</a>

<?php
/*
Displaying List of Categories from the Table - Category and that is limited to 10
*/
$qry=mysql_query("SELECT * FROM category LIMIT 0, 10", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

/* Fetching datas from the field "category" and article id is transfered to articles.php file */
while($row=mysql_fetch_array($qry))
{
echo "&nbsp;&nbsp;<a href=articles.php?cat=".$row['category'].">".$row['category']."</a>&nbsp;&nbsp;";
}
?>
</div>
<div id="r_login">
<img src="images/admin_login.jpg" alt="admin login" height="25" width="20" >
<a href="login.php" target="_self">Admin Login</a>
</div>
<div id="l_space">
<h2>Latest topics:</h2>
<?php
/*
Selecting the last added articles to display in the section - "blog" from the table "articles"
*/
$qry=mysql_query("SELECT * FROM articles order by articles.id DESC LIMIT 0, 5", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

/* Fetching and dispalying the datas to blog section from the databse table "articles" */
/*
the php in-built function substr() is used to limit the no of characters displayed in blog section to 200 and when "Read more" is clicked article id is transfered through url to articles.php for displaying in full
*/
while($row=mysql_fetch_array($qry))
{
echo "<h2>".$row['title']."</h2>";
echo "<img src=".$row['image']." />";
echo "<p>".substr($row['contents'],0,200)." <a href=articles.php?id=".$row['id']." >  Read more..</a></p>";
}
?>
<p>&nbsp;</p>
</div>
<div id="r_space">
<h2>List of Recent Blog::</h2>
<?php
/* Selecting & querying the Table "articles"
in descending order referring to the field "id"
and limiting the number of result to 10 */
$qry=mysql_query("SELECT * FROM articles order by articles.id DESC LIMIT 0, 5", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

/* Fetching data from the field "title" */
while($row=mysql_fetch_array($qry))
{
echo "<li><a href=articles.php?id=".$row['id'].">".$row['title']."</a></li>";
}
?>
</div>
<div id="footer">
<div align="center"><strong>Powered by Blogin!!! @ 2012</strong></div>
</div>
</div>
</body>
</html>
