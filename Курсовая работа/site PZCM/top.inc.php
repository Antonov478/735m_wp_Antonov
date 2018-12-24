<td colspan="2" style="height:15%">
	<!-- Верхняя часть сайта --> 
	<table class="top">
		<tr>
			<td>
				<table style="text-align:left">
				
					<tr>
					<td >
				<a href="index.php"><img src="images/logo.jpg" alt="Логотип" /></a>
			</td>
			<td >
				<h2> Приокский завод цветных металов </h2>
			</td>	
					</tr>
					
				</table>
				
			</td>
			
		</tr>
		<tr>
			<td class="top_left"> 
				<?php
					if (!empty($_SESSION['user_login']))
						echo "Привет,<b>".$_SESSION['user_login']."</b> <a href='index.php?logout=true'>(Выход)</a>";
				?> 
			</td>
			
		</tr>
   </table>
</td>
