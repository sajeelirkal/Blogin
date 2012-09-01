<?php
require_once 'db_connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Articles</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
a:link {
text-decoration: none;
}
a:visited {
text-decoration: none;
}
a:hover {
text-decoration: underline;
}
a:active {
text-decoration: none;
}
</style>
</head>

<body>
<div id="contain">
<div id="header">
<h1><?php echo "$sitename";?></h1>
</div>
<div id="menus">
<a href="index.php" target="_self">Home</a>
<?php
/*
Displaying List of Categories from the Table - Category and that is limited to 6
*/
$qry=mysql_query("SELECT * FROM category LIMIT 0, 6", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

/* Fetching datas from the field "category" and article id is transfered to articles.php file */
while($row=mysql_fetch_array($qry))
{
echo "&nbsp;&nbsp;<a href=articles.php?cat=".$row['category'].">".$row['category']."</a>&nbsp;";
}
?>
</div>

<div id="l_space">
<h2>Blog in this Categoy::</h2>
<?php
/*
isset() is used to check wheather arctile id is received through url from "index.php" file and if it is set corresponding arctile is displayted using SELECT statement.
*/

if(isset($_GET['id']))
{
$id=$_GET['id'];
$qry=mysql_query("SELECT * FROM articles WHERE id=$id", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
                /* Fetching data from the field "title" */
while($row=mysql_fetch_array($qry))
{
echo "<h2>".$row['title']."</h2>";
echo "<img src=".$row['image']." />";
echo "<p>".$row['contents']."</p>";
}
echo "<h2>Comments</h2>";
}

/*
based on the category name received from index.php file the last added article is displayed
*/
if(isset($_GET['cat']))
{
//echo $_GET['cat'];
$cat=$_GET['cat'];
$qry=mysql_query("SELECT * FROM articles WHERE category='$cat' order by articles.id DESC LIMIT 0, 5", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}

                /* Fetching data from the field "title" */
while($row=mysql_fetch_array($qry))
{
echo "<h2>".$row['title']."</h2>";
echo "<img src=".$row['image']." />";
echo "<p>".$row['contents']."</p>";
echo "<p>".substr($row['contents'],0,0)."<a href=articles.php?id=".$row['id']." > See Article..</a></p>";
}
}

?>

<form action='comment.php?id=<?php echo $id ?>' method='post'>
  <?php
  if(isset($_GET['id']))
  {
  
  echo "<textarea name='comment' cols='50' rows='3' id='comment'></textarea>";
  echo "</br>";
  echo "<input type='submit' value='Submit' />";
  }
  ?> 
  </form>
  <?php
  if(isset($_GET['id']))
  {
	  $id=$_GET['id'];
	  	  
  $qry=mysql_query("SELECT * FROM comments WHERE cmnt_id='$id' order by comments.cmnt_id ASC", $con);
	if(!$qry)
	{
		die("Query Failed: ". mysql_error());
	}

	/* Fetching data from the field "title" */
	while($row=mysql_fetch_array($qry))
	{
	echo "</br>_______________________________________________________________</br>";
	echo "<b>Commented on : ".$row['comment_dt']."</b></br></br>";
	echo $row['comment'];
	}
	
  }
	?>
	<br>
	<br><br>
</div>

   <div id="r_space">
<h2>List in this Category</h2>
<?php
/*
based on the id received from index.php through url, the category of the particular article is determined
*/
if(isset($_GET['id']))
{
$id=$_GET['id'];
$qry=mysql_query("SELECT category FROM articles WHERE id='$id'", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
/* Fetching data from the field "title" */
$row=mysql_fetch_array($qry);
$cat=$row['category'];

/*
once the category of the article is determined this section is used to display the title of all the articles belonging to that category
*/                          
$qry=mysql_query("SELECT * FROM articles WHERE category='$cat' order by articles.id DESC", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
while($row=mysql_fetch_array($qry))
{
//echo $row['title'];
echo "<li><a href=articles.php?id=".$row['id'].">".$row['title']."</a></li>";
}
}

/*
based on the category name received from index.php file title names of all the articles belong to the category is displayed with hyperlinks
*/          
if(isset($_GET['cat']))
{
$cat=$_GET['cat'];


$qry=mysql_query("SELECT * FROM articles WHERE category='$cat' order by articles.id DESC", $con);
if(!$qry)
{
die("Query Failed: ". mysql_error());
}
while($row=mysql_fetch_array($qry))
{
echo "<li><a href=articles.php?id=".$row['id'].">".$row['title']."</a></li>";
}

}
?>

</div>

<div id="footer">
<div align="center"><strong>Powered by Blogin!!! @ 2012</strong></div>
<br>
</body>
</html>
