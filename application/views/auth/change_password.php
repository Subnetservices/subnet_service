<!DOCTYPE html>
<html>
<head>
	<title>Reset password</title>
</head>
<body>

<div>
	

<form method="post">
	<h3>Change your password</h3>
	<span><?php echo $message?></span>
	
	<label> Enter password</label>
	<input type="hidden" name="username" value="<?php echo $user->username?>">
	<input type="text" name="password" placeholder="Password"><br>
	<p>
	<label>retype password</label>
	<input type="text" name="retype_password" placeholder="re-type password">
   </p>
	<input type="submit" name="changepass" value="change">
</form>
</div>
</body>
</html>