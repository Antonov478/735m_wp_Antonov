<?php
	$id = clearData($_GET['id']);	
	$row = getOne("SELECT * FROM tovar WHERE id = '$id'");  // получаем всю информацию из tovar по данному id
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{		
		if (!empty($_POST['title'])  && !empty($_POST['price']))
		{	
			$title = clearData($_POST['title']);
			$type = clearData($_POST['type']);
			$ves = clearData($_POST['ves']);
			$proba = clearData($_POST['proba']);
			$price = clearData($_POST['price']);
			$description = clearData($_POST['description']);
			if ($_FILES['uploadfile']['tmp_name']) 
			{				
				$a = loadImage("edit"); // получаем массив , содержащий сообщение в случае ошибки и ссылку на изображение			
				if (empty($a['mess'])) 
				{				
					$image = $a['src'];
					executeQuery("UPDATE tovar SET title = '$title', type = '$type', ves = '$ves', proba = '$proba', price = '$price', description = '$description', image ='$image' WHERE id = '$id'");		
					header("Location: index.php?page=catalog");
					exit;
				}
				else
				{ 
					echo $a['mess'];
				}
			}
			else 
			{						
				executeQuery("UPDATE tovar SET title = '$title', type = '$type', ves = '$ves', proba = '$proba', price = '$price', description = '$description' WHERE id = '$id'");								
				header("Location: index.php?page=catalog");
				exit;
			}
		}
		else 
			echo '<font color="red">Заполните все поля!</font>';		
	}
?>
<div class="data">	
<center><h2>Редактирование изделия</h2></center>

	<form method='POST' action='index.php?page=edit&id=<?php echo $id; ?>' ENCTYPE='multipart/form-data'>			
		<table>
			<tr>
				<th>Название:<font color="red">*</font></th>
				<td><input type='text' name='title' value='<?=$row['title']?>' size="60" required></td>
			</tr>
			<tr>
				<th>Категория:<font color="red">*</font></th> 
				<td>
					<select size="1" name="type">
						<option disabled>Выберите категорию товара</option>
						<option value="Золото" <?php if ($row['type'] == "Золото") echo "selected" ?> >Золото</option>
						<option value="Серебро" <?php if ($row['type'] == "Серебро") echo "selected" ?>>Серебро</option>
						<option value="Платина" <?php if ($row['type'] == "Платина") echo "selected" ?>>Платина</option>
						<option value="Паладий" <?php if ($row['type'] == "Паладий") echo "selected" ?>>Паладий</option>
						<option value="Родий" <?php if ($row['type'] == "Родий") echo "selected" ?>>Родий</option>
						<option value="Иридий" <?php if ($row['type'] == "Иридий") echo "selected" ?>>Иридий</option>
						<option value="Рутений" <?php if ($row['type'] == "Рутений") echo "selected" ?>>Рутений</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Вес:<font color="red">*</font></th>
				<td><input type='number' step="0.1" name='ves' value='<?=$row['ves']?>' required>&nbsp;гр.</td>
			</tr>
			<tr>
				<th>Проба:<font color="red">*</font></th>
				<td><input type='number' step="0.01" name='proba' value='<?=$row['proba']?>' required>&nbsp;</td>
			</tr>
			<tr>
				<th>Цена:<font color="red">*</font></th>
				<td><input type='number' step="0.01" name='price' value='<?=$row['price']?>' required>&nbsp;руб.</td>
			</tr>
			<tr>
				<th>Описание:</th>
				<td><textarea name='description' rows='10' cols='50' style="resize:none;" ><?=$row['description']?></textarea></td>
			</tr>
			<tr>
				<th>Изображение:</th> 
				<td><input type='file' name='uploadfile' "></td>
			</tr>
		</table>
		<center><p><input type='submit' value='Сохранить'></p></center>
	</form>
</div>