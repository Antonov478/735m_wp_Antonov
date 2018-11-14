<?php
//Инициализация переменных
$name = "";
$location = "";
$job = "";
$work_type = "";
$price = "";
$uploadlink = "";

if (isset($_POST['delete']))
{
	foreach ($_SESSION['Items'] as $item){
		$id = $item['id'];
		if (isset($_POST["checkbox$id"])){
			deleteItem($id);
		}
	}
}	
?>

<button id="add" class='btn' onclick="location.href='index.php?command=add';">Добавить</button>
<br/><br/>

<form method='POST'>
<table class="data_table" border="1">
<tr>
	<th width="20%">Наименование методических указаний:</th>
	<th width="20%">Год издания:</th>
	<th width="20%">Авторы:</th>
	<th width="20%">Количество страниц:</th>
	<th width="20%">Издательство:</th>
</tr>
<?php 
if (!empty($_SESSION['Items'])) {
	foreach ($_SESSION['Items'] as $item){
		$name = $item['name'];
		$year = $item['year'];
		$publishing = $item['publishing'];
		$amount = $item['amount'];
		$authors = $item['authors'];
		$id = $item['id'];
	echo 
	"<tr>
	<td>$name</td>
	<td>$year</td>
	<td>
		<a href='index.php?command=item&id=$id';' style='color:black; display:inline;'>$publishing</a>
	</td>
	<td>$amount</td>
	<td>$authors</td>
	<td>$uploadlink</td>
	<td>
		<input type='checkbox' name='checkbox$id' value=$id/>
	</td>
</tr>";
	}
}
?>

</table>
<input id='delete' class='btn' type='submit' class='button' name='delete' value='Удалить'/>
</form>
