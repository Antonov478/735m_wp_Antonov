<?php
	
	if	(isset($_POST['del'])){	
		if (!empty($_POST['delId'])){			    
			$id_user = $_SESSION['user_id'];
			foreach($_POST['delId'] as $val)
			{
				executeQuery("DELETE FROM usercatalog WHERE id_tovar = $val and id_user = $id_user"); 
			}
		}
		else echo "<font color='red'>Сначала отметьте записи, которые необходимо удалить!</font>";
	}	
	
	if (isset($_SESSION['sort'])) 
	{
		$_SESSION['sort'] = "title";
		if (isset($_GET['sort'])) 
		{
			switch ($_GET['sort']){
				case "title":$_SESSION['sort'] = "title"; break;
				case "type":$_SESSION['sort'] = "type"; break;
				case "ves":$_SESSION['sort'] = "ves"; break;
				case "proba":$_SESSION['sort'] = "proba"; break;
				case "price":$_SESSION['sort'] = "price"; break;									
			}
		}
	}
	else
		$_SESSION['sort'] = "title";
	
	$where ="WHERE id_user = ".$_SESSION['user_id']." ";
	if (isset($_POST['search'])) 
	{
		$type = clearData($_POST['type']);
		$title = clearData($_POST['title']);					
		if ($type == "Любая")
		{
			if (!empty($title))
				$where = $where."and lower(title) like lower('%".$title."%') ";
		}
		if (empty($title))
		{
			if ($type != "Любая")
				$where = $where."and type = '".$type."' ";						
		}
		if (!empty($title) && $type != "Любая")
			$where = $where. "and type = '".$type."' and lower(title) like lower('%".$title."%') ";
	}	
	$query = "SELECT tovar.* FROM usercatalog LEFT JOIN tovar on tovar.id = usercatalog.id_tovar ".$where."ORDER BY ".$_SESSION['sort']." ASC";		
	$rows = getAll($query);
?>
<div class="data">
	<center><h2>Пользовательский каталог продукции</h2></center>		
	<form action="index.php?page=usercatalog" method="POST">
		<table>
			<tr>
				<td>Категория:</td> 
				<td>
					<select size="1" name="type">
						<option value="Любая">Любая</option>
						<option value="Золото">Золото</option>
						<option value="Серебро">Серебро</option>
						<option value="Платина">Платина</option>
						<option value="Паладий">Паладий</option>
						<option value="Родий">Родий</option>
						<option value="Иридий">Иридий</option>
						<option value="Рутений">Рутений</option>
					</select>
				</td>				
			</tr>	
			<tr>
				<td>Название</td>
				<td><input type="text" name="title" placeholder="введите часть названия или название целиком" size="50"></td>
			</tr>
		</table>
		<input type="submit" name="search" value="Поиск">
	    <input type="submit" name="del" value="Удалить">		
		<br><br><br>
		<b>Страницы:</b>
		<?php
			$all_count = count($rows); // получаем общее количество записей
			$on_page = 7; // кол-во записей на странице
			$shift = makePager($on_page, $all_count, "usercatalog"); // формируем пагенацию
			$rows = getAll($query." LIMIT $shift, $on_page"); 
		?>
		<table class="table" border="1">
			<tr>				
				<th><a href="index.php?page=usercatalog&sort=title">Название</a></th>
				<th><a href="index.php?page=usercatalog&sort=type">Категория</a></th>	
				<th><a href="index.php?page=usercatalog&sort=ves">Вес</a></th>
				<th><a href="index.php?page=usercatalog&sort=proba">Проба</a></th>					
				<th><a href="index.php?page=usercatalog&sort=price">Цена</a></th>
				<th></th>
			<tr>			
			<?php

				if (!empty($rows)){
					foreach($rows as $item)
					{
						echo "<tr>";												
						echo "<td><a href='index.php?page=item&id=".$item['id']."'>".$item['title']."</a></td><td>".$item['type']."</td><td>".$item['ves']."</td><td>".$item['proba']."</td><td>".$item['price']."</td>";
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