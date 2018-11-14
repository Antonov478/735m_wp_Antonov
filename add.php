<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//filter
	if (empty($_POST['name']) | empty($_POST['year']) | 
	empty($_POST['authors']) | empty($_POST['amount']) |
	empty($_POST['publishing']))
	{
		echo 'Полностью заполните форму!';	
	} else {
		$item = createNewItem();
		addItem($item);
		echo '<a href="index.php?command=catalog">Новаая запись была добавлена!</a>';
		//header("Location: index.php?command=catalog");
		exit;
	}
}
?>
<div>	
	<h3>Добавить запись</h3>
	<?php include "item_form.php"; ?>
</div>
