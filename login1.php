<?php
require('autorization.php');
require('func_index.php');	
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
 </head>
<body>
 <h2>Hi, you unregistrated user!</h2>
 <form action="" method="POST" enctype="multipart/form-data">
	<p><input type="textarea" name="alogin" value=""> Login</p>
	<p><input type="textarea" name="apass" value=""> Password</p>
	<p><input type="submit" name="aresult" value="sign in"></p>
</form>
</body>
</html>