<?php   
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
	if (!empty($_POST['title']) && !empty($_POST['price']))
	{	
		$title = clearData($_POST['title']);
		$type = clearData($_POST['type']);
		$ves = clearData($_POST['ves']);
		$proba = clearData($_POST['proba']);
		$price = clearData($_POST['price']);
		$description = clearData($_POST['description']);
		$cheakID = getOne("SELECT id FROM tovar WHERE title = '$title' ");				
		if (count($cheakID) == 0)
		{
			if ($_FILES['uploadfile']['tmp_name']) 
			{			
				$a = loadImage("add"); // получаем массив , содержащий сообщение в случае ошибки и ссылку на изображение			
				if (empty($a['mess'])) 
				{
					$image = $a['src'];
					executeQuery("INSERT INTO tovar (title,type,ves,proba,price,description,image) VALUES ('$title','$type','$ves','$proba','$price','$description','$image')");
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
				$image = "";
				executeQuery("INSERT INTO tovar (title,type,ves,proba,price,description,image) VALUES ('$title','$type','$ves','$proba','$price','$description','$image')");	
				header("Location: index.php?page=catalog");
				exit;
			}
		}
		else echo  '<font color="red">Запись с таким наименованием уже существует!</font>';
	}
	else 
		echo '<font color="red">Заполните все поля!</font>';	
}
?>


<div class="data">
	<center><h2>Добавить изделие</h2></center>
	<form method='POST' action='index.php?page=add' ENCTYPE='multipart/form-data'>			
		<table>
			<tr>
				<th>Наименование:<font color="red">*</font></th>
				<td><input type='text' name='title' required></td>
			</tr>
			<tr>
				<th>Категория:<font color="red">*</font></th> 
				<td style="width:100%">
					<select size="1" name="type">
						<option disabled>Выберите категорию товара</option>
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
				<th>Вес:<font color="red">*</font></th>
				<td><input type='number' step="0.1" name='ves' min="0" required>&nbsp;гр.</td>
			</tr>
			<tr>
				<th>Проба:<font color="red">*</font></th>
				<td><input type='number' step="0.01" name='proba' min="0" required>&nbsp;</td>
			</tr>
			<tr>
				<th>Цена:<font color="red">*</font></th>
				<td><input type='number' step="0.01" name='price' min="0" required>&nbsp;руб.</td>
			</tr>
			<tr>
				<th>Описание:</th>
				<td><textarea name='description' rows='10' style="resize:none; width:90%"></textarea></td>
			</tr>
			<tr>
				<th>Изображение:</th> 
				<td><input type='file' name='uploadfile' accept='image/jpeg'></td>
			</tr>
		</table>
		<center><p><input type='submit' value='Добавить' name='add'></p></center>
	</form>
</div>