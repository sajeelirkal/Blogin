<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Logout</title>
</head>
<?php
session_start();
$_SESSION=array();
setcookie(session_name(),"",time()-3600);
session_destroy();
header("Location: login.php?id=You are successfully logged out");
?>
<body>
</body>
</html>
