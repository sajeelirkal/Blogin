<html>
<head>
<title>Blogin Installer</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="contain">
<div id="header">
<h1>Blog In!!!</h1>
</div>
<h2 align="center">Welcome to blogin installer..</h2>
<h5 align="center">Enter your credentials below:</h5>

<form id="form1" name="installer" method="post" action="check_config.php">
<p align="center">
Host name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input id="hostname" type="text" name="hostname"></p>
<p align="center">
Database username: <input id="username" type="text" name="username"></p>
<p align="center">
Database password: <input id="password" type="text" name="password"></p>
<p align="center">
Desired Site name:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="sitename" name="sitename"></p>
<p align="center">
Database name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input id="database" type="text" name="database"></p>
<p align="center">
Cms Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="cms_username" name="cms_username"></p>
<p align="center">
Cms Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" id="cms_password" name="cms_password"></p>
<p align="center">
<input type="submit" value="install" name="submit"></p>
</form>
<br><br>
<div id="footer">
<div align="center"><strong>Powered by Blogin!!! @ 2012</strong></div>
</div>
</div>
</body>
</html>