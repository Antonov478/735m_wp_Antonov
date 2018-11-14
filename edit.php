<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{	
		$id = clearData($_GET['id']);
		$item = getItemById($id);
		$name = $item['name'];
		$year = $item['year'];
		$authors = $item['authors'];
		$amount = $item['amount'];
		$publishing = $item['publishing'];
		$uploadfile = $item['uploadfile'];
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//filter
		if (empty($_POST['name']) | empty($_POST['year']) | 
		empty($_POST['authors']) | empty($_POST['amount']) |
		empty($_POST['publishing']) | empty($_POST['id']))
		{
			echo 'Полностью заполните форму!';
		} else {
			$id = clearData($_POST['id']);
			$temp = editItem($id);
			addItem($temp);
			header("Location: index.php?command=catalog");
		}
	}
?>
	
<div>
	<h3>Редактировать запись</h3>
	<?php include "item_form.php" ?>
</div>
