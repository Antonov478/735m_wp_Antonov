<?php
	include_once "lib.inc.php";
	//logining handler
	if (isset($_POST['login']) && isset($_POST['password']))
	{
		$login = clearData($_POST['login']);
    	$password = clearData($_POST['password']);
    	ini_set('session.save_path', getcwd());
		session_start(); 
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		$_SESSION['user_login'] = $login;
		$goal = $_SESSION['goal_url'];
		unset($_SESSION['goal_url']);
		header("Location: http://".$_SERVER['HTTP_HOST'].$goal);
		
		exit;
	}
?>

<table align="center" style="margin-left:40px">
	<tr>
		<td>
			<h3>Вход в систему</h3>
			<form method="POST" action="auth.php">
				<p>Логин:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="login"><br>
				<p>Пароль:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="password" name="password"><br>
				<p><input type="submit"><br>
			</form>
		</td>
	</tr>
</table>