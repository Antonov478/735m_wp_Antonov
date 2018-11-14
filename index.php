<?php
	include_once "lib.inc.php";
	ini_set('session.save_path', getcwd());
	session_start();

	if (isset($_COOKIE['visitDate'])) {
		$visitDate = $_COOKIE['visitDate'];
	} else {
			setcookie('visitDate', date('Y-m-d H:i:s'), time()+0xFFFFFFF);
	}

	//filter
	//if session is empty and command isn't login then redirict
	if(isset($_GET['command'])){
		if(!isset($_SESSION['user_login'])){
			if ($_GET['command'] != 'login') {
				$_SESSION['goal_url'] = $_SERVER['REQUEST_URI'];
				header("Location: index.php?command=login");
				exit;
			} 
		}
	}

		//logout handler
		if(isset($_GET['command'])){
			if($_GET['command'] == 'logout'){
				session_destroy();
				header("Location: index.php");
				exit;
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>АО "ПЗЦМ"</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<?php include "top.inc.php" ?>

    <div class="container">
      <div class="row">
	<?php include "menu.inc.php" ?>
	
			<div class="content">
			<?php
			//someting like command controller
			if(!empty($_GET['command'])){
				$command = $_GET['command'];
				switch($command)
				{	
				case 'login': include 'auth.php'; break;
				case 'lab1': include 'lab_rab1.html'; break;
				case 'lab2': include 'lab_rab2.php'; break;
				case 'lab3': include 'lab_rab3.php'; break;				
				case 'catalog': include 'catalog.php'; break;	
				case 'add': include 'add.php'; break;
				case 'item': include 'item.php'; break;	
				case 'edit': include 'edit.php'; break;
				}
			} else { echo
	      '<div class="col-md-9">
        <h2 class="zagolovok">Добро пожаловать в АО "ПЗЦМ"!</h2>
              <p><img src="Images/View1.jpg" class="view" alt="Здание">
              <span class="text-view">Основной целью деятельности Общества является извлечение прибы-ли.
Основными видами деятельности Общества являются:
	<br> - Аффинаж драгоценных металлов;
<br> - Приобретение драгоценных металлов;
<br> - Изготовление и реализация стандартных и мерных слитков, стандартных образцов состава драгоценных металлов;
<br> - Изготовление и реализация порошков и химических соедине-ний драгоценных и цветных металлов, проката и проволоки драгоценных и цветных металлов, и их сплавов;
<br> - Заготовка и переработка лома и отходов драгоценных метал-лов; их первичная обработка и переработка с получением кон-центратов и других полупродуктов, предназначенных для аф-финажа;
<br> - Проведение количественного химического анализа драгоцен-ных и цветных металлов;
<br> - Производство и реализация ювелирной продукции из драго-ценных металлов, и их сплавов.</span></p>
      </div>';
			}?>
    </div>
    </div> 
	</div>
	<?php include "bottom.inc.php" ?>

  
  </body>
  </html>
  

