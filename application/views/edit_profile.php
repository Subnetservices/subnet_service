
<!DOCTYPE html>
<html>
<head>
	<title>home  (<?php echo $user->first_name?>)</title>
</head>
<body>
<nav>
	<a href="change_password">change password</a>
	<a href="logout">logout</a>
</nav>
<div>
	<div>
		<form method="post">
			<input type="hidden" name="username" value="<?php echo $user->username?>">
			<div>
				<label>first name</label>
			<input type="text" name="first_name" value="<?php echo $user->first_name?>"><br>
			</div>
			<div>
				<label>last name</label>
		    	<input type="text" name="last_name" value="<?php echo $user->last_name?>"><br>
			</div>
            <div>
            	<label>phone</label>
			    <input type="text" name="phone" value="<?php echo $user->phone?>"><br>
            </div>
			<div>
				<input type="submit" name="update" value="update">
			</div>
			
		</form>
	</div>
</div>
</body>
</html>