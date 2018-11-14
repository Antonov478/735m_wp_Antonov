<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$id = clearData($_GET['id']);
		$item = getItemById($id);

		$name = clearData($item['name']);
		$year = clearData($item['year']);
		$authors = clearData($item['authors']);
		$amount = clearData($item['amount']);
		$publishing = clearData($item['publishing']);
		$uploadfile = $item['uploadfile'];
	}
?>
<br/>
<a href='index.php?command=catalog' class="item-ref">Назад</a>
<a href='index.php?command=edit&id=<?=$id?>' class="item-ref">Редактировать</a>
<br/><br/>
<table class="data_table" border="1">
	<tr>
		<th width="15%" bgcolor="#8080ff">Наименование методических указаний:</th>
		<td colspan="2" width="45%" style="padding:0px 0px 0px 5px;"><?= $name ?></td>
		<td rowspan="5"><img src="<?php 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$uploadfile ?>" width="100%" height="100%"></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#8080ff">Год издания:</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $year ?></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#8080ff">Авторы:</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $authors ?></td>
	</tr>
	<tr height="250">
		<th width="15%" bgcolor="#8080ff">Количество страниц:</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $amount ?></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#8080ff">Издательство:</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $publishing ?></td>
	</tr>
</table>
<br/>
