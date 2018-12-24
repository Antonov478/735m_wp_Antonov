<?php	
	$id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['name'])) 
        {
			$login = clearData($_POST['login']);
			$surname = clearData($_POST['surname']);                               				
			$name = clearData($_POST['name']);				
			$email = clearData($_POST['email']);				
			$phone = clearData($_POST['phone']);                                			
			$password_main = clearData($_POST['password_main']);
			$password_confirm = clearData($_POST['password_confirm']);          			
			editUser($id,$login, $password_main, $password_confirm, $surname, $name, $email, $phone);
        }
        else echo '<font color=red>Заполните все обязательные поля!</font>';
    }	
	
	$res = getOne("SELECT * from users where id=$id");
?>
<div class="data">
	<table class="table">
		<tr>
			<td>		
				<h2 align="center">Профиль пользователя</h2>
				<form action="index.php?page=profile&id=<?php echo $id; ?>" method="POST">
					<table>
						<tr style="height:30px;">
							<td>Логин <font color="red">*</font></td>
							<td><input type="text" name="login" value="<?php echo $res['login']; ?>" required></td>
						</tr>
						<tr style="height:30px;">
							<td>Пароль <font color="red">*</font></td>
							<td><input type="password" name="password_main" ></td>
						</tr>
						<tr style="height:30px;">
							<td>Повторите пароль <font color="red">*</font></td>
							<td><input type="password" name="password_confirm" ></td>
						</tr>
						</tr>      
						<tr style="height:30px;">
							<td>Фамилия</td>
							<td><input type="text" name="surname" value="<?php echo $res['surname']; ?>"></td>
						</tr>
						<tr style="height:30px;">
							<td>Имя <font color="red">*</font></td>
							<td><input type="text" name="name" value="<?php echo $res['name']; ?>" required></td>
						</tr>
						<tr style="height:30px;">
							<td>Email <font color="red">*</font></td>
							<td><input type="text" name="email" value="<?php echo $res['email']; ?>" required></td>
						</tr>
						<tr style="height:30px;">
							<td>Телефон</td>
							<td><input type="text" name="phone" placeholder="+7(___)___-__-__" value="<?php echo $res['phone']; ?>"></td>
						</tr>
					</table>
					<p>
						<input type="submit" value="Сохранить">						
					</p>
				</form>
			</td>
		</tr>
	</table>
</div>
