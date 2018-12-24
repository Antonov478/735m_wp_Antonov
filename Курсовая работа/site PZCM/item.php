<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$id = clearData($_GET['id']);
		$row = getOne("SELECT * FROM tovar WHERE id = '$id'");  // получаем всю информацию из tovar по данному id
	}
?>

<br/>
<a href='index.php?page=catalog' style='margin-left:40px'>Назад</a>
<?php
	if ($_SESSION['user_login'] == "Администратор")
		echo "<a href='index.php?page=edit&id=".$id."' style='margin-left:20px'>Редактировать</a>";
?>
<br/><br/>
<div class="data">
<table  border="1" style="text-align:left;" align="center">
	<tr>
		<th bgcolor="#8080ff">Категория</th>
		<td  width="45%"><?= $row['type'] ?></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#8080ff">Название</th>
		<td  ><?= $row['title'] ?></td>
		<td rowspan="4"><img src='<?php if (empty($row['image'])) echo "images/catalog/no-image.jpg"; else echo $row['image'].'.jpg';?> '></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#8080ff">Вес</th>
		<td  ><?= $row['ves'] ?></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#8080ff">Проба</th>
		<td  ><?= $row['proba'] ?></td>
	</tr>
	<tr>
		<th bgcolor="#8080ff">Цена</th>
		<td><?= $row['price'] ?> руб.</td>
	</tr>
	<tr height="250">
		<th width="15%" bgcolor="#8080ff">Описание</th>
		<td valign="top"><?= $row['description'] ?></td>
	</tr>
</table>
</div>
<br/>
