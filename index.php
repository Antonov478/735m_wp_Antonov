<?php include "lib.inc.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>"АО "ПЗЦМ""</title>
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
  <?php
  session_start(); 
$counter = $_COOKIE["counter"]; 
if (!isSet($counter)) 
$counter = date('Y-m-d H:i:s'); 
else 
$counter = $counter;
  ?>
  <?php include "top.inc.php" ?>
    
    <div class="container">
      <div class="row">
    
	<?php include "menu.inc.php" ?>
      <div class="col-md-9">
        <h2 class="zagolovok">Добро пожаловать в АО "ПЗЦМ"!</h2>
              <p><img src="images/View.jpg" class="view" alt="Лого">
              <span class="text-view"> Основной целью деятельности Общества является извлечение прибы-ли.
Основными видами деятельности Общества являются:
	<br> - Аффинаж драгоценных металлов;
<br> - Приобретение драгоценных металлов;
<br> - Изготовление и реализация стандартных и мерных слитков, стандартных образцов состава драгоценных металлов;
<br> - Изготовление и реализация порошков и химических соедине-ний драгоценных и цветных металлов, проката и проволоки драгоценных и цветных металлов, и их сплавов;
<br> - Заготовка и переработка лома и отходов драгоценных метал-лов; их первичная обработка и переработка с получением кон-центратов и других полупродуктов, предназначенных для аф-финажа;
<br> - Проведение количественного химического анализа драгоцен-ных и цветных металлов;
<br> - Производство и реализация ювелирной продукции из драго-ценных металлов, и их сплавов.
.</span></p>
      </div>
    </div>
    </div>

    <?php include "bottom.inc.php" ?>


  </body>
  </html>