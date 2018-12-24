<?php
	session_start();
	ob_start();
	ini_set('display_errors',1);
	//error_reporting(E_ALL);
	date_default_timezone_set('Asia/Muscat');
	header("Content-Type: text/html; charset=utf-8");
	header("Cache-control: no-store");
	include "base_reg.php";
	include "lib.inc.php";
	if (isset($_COOKIE['dateVisit']))
		$dateVisit = $_COOKIE['dateVisit'];
	setcookie('dateVisit',date('Y-m-d H:i:s'),time()+0xFFFFFFF);
	if (empty($_GET['page']))
		$page = "";
	else
		$page = $_GET['page'];	
?>

<!DOCTYPE html>

<html lang="en">

<head>
	<title>Главная страница</title>
	<link rel="stylesheet" href="stylea.css" type="text/css" media="screen" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	<table class="header">
		<tr>
			<?php include "top.inc.php" ?>
		</tr>
		<tr>
			<?php if (!empty($_SESSION['user_login'])) include "menu.inc.php" ?>
            <td>
				<table class="content">
					<tr>
						<td class="content_td">
							<?php
								if ($page=="reg")
									require 'registration.php';	
								else
									require 'auth.php';								
								if (isset($_SESSION['user_login']))	
								{									
									if (empty($page)) {
										echo '<div>
											<h2>Добро пожаловать в АО "ПЗЦМ"!</h2>
											<p><img src="images/12.jpg" alt="Фото" style="width:600px; height:200px;"/></p>
											<p>Основной целью деятельности Общества является извлечение прибыли.</p>
											<p>Основными видами деятельности Общества являются:
	<br> - Аффинаж драгоценных металлов;
<br> - Приобретение драгоценных металлов;
<br> - Изготовление и реализация стандартных и мерных слитков, стандартных образцов состава драгоценных металлов;
<br> - Изготовление и реализация порошков и химических соедине-ний драгоценных и цветных металлов, проката и проволоки драгоценных и цветных металлов, и их сплавов;
<br> - Заготовка и переработка лома и отходов драгоценных метал-лов; их первичная обработка и переработка с получением кон-центратов и других полупродуктов, предназначенных для аф-финажа;
<br> - Проведение количественного химического анализа драгоцен-ных и цветных металлов;
<br> - Производство и реализация ювелирной продукции из драго-ценных металлов, и их сплавов.</span></p>
																			
										</div>';
										
									}
									else
									{									
										switch($page)
										{
											case 'catalog': include 'catalog.php';break;	
											case 'add': include 'add.php'; break;
											case 'item': include 'item.php'; break;	
											case 'edit': include 'edit.php'; break;
											case 'userlist': include 'userlist.php'; break;
											case 'profile': include 'profile.php'; break;
											case 'usercatalog': include 'usercatalog.php'; break;
											
										}
									}								
								}							
							?>
						</td>
					</tr>
				</table>
            </td>
         </tr>
        <tr>
			<?php include "bottom.inc.php" ?>
         </tr>
	</table>
</body>
</html>
<?php
	ob_end_flush();
?>