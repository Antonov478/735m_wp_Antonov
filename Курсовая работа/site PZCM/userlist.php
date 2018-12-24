<?php
	if	(isset($_POST['del'])){	
		if (!empty($_POST['delId'])){			    
			foreach($_POST['delId'] as $val)
			{
				executeQuery("DELETE FROM users WHERE id = '$val'"); // удаляем записи из таблицы tovar
				executeQuery("DELETE FROM usercatalog WHERE id_user = '$val'"); // удаляем записи из таблицы tovar
			}
		}
		else echo "<font color='red'>Сначала отметьте записи, которые необходимо удалить!</font>";
	}
	
	if (isset($_SESSION['sort']))  // поле сортировки сортировка
	{
		$_SESSION['sort'] = "login";
		if (isset($_GET['sort']))
		{
			switch ($_GET['sort']){
				case "login":$sort = "login"; break;
				case "surname":$sort = "surname"; break;
				case "name":$sort = "name"; break;						
				case "email":$sort = "email"; break;						
				case "phone":$sort = "phone"; break;									
			}
		}
	}
	else
		$_SESSION['sort'] = "login";
	
	$query = "SELECT * FROM users ORDER BY ".$_SESSION['sort']." ASC";				
	$rows = getAll($query);
	
?>
<div class="data">
	<center><h2>Список зарегестрированных пользователей</h2></center>	
	<form action="index.php?page=userlist" method="POST">
		<input type="submit" name="del" value="Удалить">	
		<br><br>
		<b>Страницы:</b>
		<?php
			$all_count = count($rows); // получаем общее количество записей
			$on_page = 7; // кол-во записей на странице
			$shift = makePager($on_page, $all_count, "userlist"); // формируем пагенацию
			$rows = getAll($query." LIMIT $shift, $on_page"); 
		?>
		<table class="table" border="1">
			<tr>				
				<th><a href="index.php?page=userlist&sort=login">Логин</a></th>
				<th><a href="index.php?page=userlist&sort=surname">Фамилия</a></th>				
				<th><a href="index.php?page=userlist&sort=name">Имя</a></th>
				<th><a href="index.php?page=userlist&sort=email">Email</a></th>				
				<th><a href="index.php?page=userlist&sort=phone">Телефон</a></th>
				<th></th>
			<tr>			
			<?php

				if (!empty($rows)){
					foreach($rows as $item)
					{
						echo "<tr>";												
						echo "<td><a href='index.php?page=profile&id=".$item['id']."'>".$item['login']."</a></td>";
						echo "<td>".$item['surname']."</td><td>".$item['name']."</td>";
						echo "<td>".$item['email']."</td><td>".$item['phone']."</td>";
						echo "<td width='10px'><input type='checkbox' name='delId[]' value=".$item['id']."></td>";
						echo "</tr>";
					}
				}
			?>
		</table>
		<br>
		Число записей:<b><?php echo $all_count; ?></b>
	</form>
</div>