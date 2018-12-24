<?php			
	if ($_SESSION['user_login'] == "Администратор")
		$menu = array(
			"Главная"=>"index.php", 
			"Каталог"=>"index.php?page=catalog",
			"Список пользователей"=>"index.php?page=userlist");
	else
		$menu = array(
			"Главная"=>"index.php", 
			"Каталог"=>"index.php?page=catalog",
			"Мой профиль"=>"index.php?page=profile&id=".$_SESSION['user_id'], 
			"Мой каталог"=>"index.php?page=usercatalog");
			
		
?>	

<td style="height:100%">
	<table class="menu">
		<tr>
			<td>
				<?php
					getMenu($menu);
				?>
			</td>
		</tr>
	</table>
</td>