<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Login Panel</title>
<style type="text/css">
body h2 {
color: #EE4902;
}
#form1 p {
color: #EE4902;
}
.para {
color: #F00;
}
</style>
</head>

<body>
<h2 align="center">&nbsp;</h2>
<h2 align="center">&nbsp;</h2>
<h2 align="center">Administrator Login page</h2>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<form id="form1" name="form1" method="post" action="verify_user.php">
<p align="center">Username :
<label for="u_name"></label>
<input type="text" name="u_name" id="u_name" />
</p>
<p align="center">Password :
<label for="pass"></label>
<input type="password" name="pass" id="pass" />
</p>
<p align="center">
<input type="submit" name="submit" id="submit" value="Login" />
</p>
</form>
<br\>

<h3 align="center" class="para">

<?php
if(isset($_GET['id']))
{
echo $_GET['id'];
}
?><br/><br/>
<a href="index.php">Go to home page</a>
</h3>

</body>
</html>
