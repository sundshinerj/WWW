<div id="login">
	<form action="passwordDo.php" method="post" id="login">
		<p><img src="images/password.png" /></p>
		<table class="tablogin" style="width:100%" cellpadding="0" cellspacing="20">
			<tr><td>Username</td><td><?php echo $_SESSION['name']?></td></tr>
			<tr><td>Password</td><td><input type="password" name="password" id="password"></td></tr>
			<tr><td colspan="2" style="text-align:left"><input type="submit" style="width:80px" class="button" value="submit"/></td></tr>
		</table>
	</form>
</div>