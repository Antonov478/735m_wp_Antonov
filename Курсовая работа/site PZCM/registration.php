<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!empty($_POST['password_main']) && !empty($_POST['password_confirm']) && !empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['name'])) 
        {
			$password_main = clearData($_POST['password_main']);
			$password_confirm = clearData($_POST['password_confirm']);            
            if ($password_main == $password_confirm)
            {           
                $password = md5(md5($password_main.'salt'));   // хэшируем пароль 
                $login = clearData($_POST['login']);
                $surname = clearData($_POST['surname']);                               				
				$name = clearData($_POST['name']);				
				$email = clearData($_POST['email']);				
                $phone = clearData($_POST['phone']);
                addUser($login, $password, $surname, $name, $email, $phone);                       
            }
            else echo '<font color=red>Пароли не совпадают!</font>';
        }
        else echo '<font color=red>Заполните все обязательные поля!</font>';
    }
?>

<center>
	<table>
		<tr>
			<td>		
				<h2 align="center">Регистрация</h2>
				<form method="POST">
					<table>
						<tr style="height:30px;">
							<td>Логин <font color="red">*</font></td>
							<td><input type="text" name="login" required></td>
						</tr>
						<tr style="height:30px;">
							<td>Пароль <font color="red">*</font></td>
							<td><input type="password" name="password_main" required></td>
						</tr>
						<tr style="height:30px;">
							<td>Повторите пароль <font color="red">*</font></td>
							<td><input type="password" name="password_confirm" required></td>
						</tr>
						</tr>      
						<tr style="height:30px;">
							<td>Фамилия</td>
							<td><input type="text" name="surname"></td>
						</tr>
						<tr style="height:30px;">
							<td>Имя <font color="red">*</font></td>
							<td><input type="text" name="name" required></td>
						</tr>
						<tr style="height:30px;">
							<td>Email <font color="red">*</font></td>
							<td><input type="text" name="email" required></td>
						</tr>
						<tr style="height:30px;">
							<td>Телефон</td>
							<td><input type="text" name="phone" placeholder="+7(___)___-__-__"></td>
						</tr>
					</table>
					<p>
						<input type="submit" value="Сохранить">
						<input type="reset" value="Сброс">
					</p>
					<br>
					<font color="red">*</font> - Обязательные поля для заполнения
				</form>
			</td>
		</tr>
	</table>
</center>
