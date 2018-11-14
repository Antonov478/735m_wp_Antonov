<?php
	ini_set('display_errors',0);
	error_reporting(E_ALL);
	date_default_timezone_set('Asia/Muscat');
	include "lib.inc.php";
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
      <div class="col-md-9">
<table class="content">
				<tr>
					<td class="content_td">
					<!-- Область основного контента сайта -->
					<p>Задание 1</p>

				</tr>
<table border="1">
<tr>
<th>Список<p>серверных переменных:</p></th>
<td>
<?php
echo "<pre>" ;
print_r($GLOBALS);
echo "</pre>";
?>
</td>
</tr>
</table>

<p></p>
<p>Задание 2</p>
<form method="POST" action="">
    <p>Возвести в степень</p>
	
               <br>Введите число :<input type="text" name="a" required value= "5"><br>

              <br>Введите степень :<input type="text" name="b" required value= "2"><br>

<input type="submit" name="button" value="Отправить">

</form>

<?php
function myDegree($a, $b){
  if($b == 0){
    return 1;
  }
  if($b < 0){
    return myDegree( 1/$a, -$b); // -$b значит смену знака с отрицательного на положительный
  }
  return $a * myDegree($a, $b-1); // вызов функции внутри функции
}

$a = $_POST['a'];

$b = $_POST['b'];

if ($_POST['button'])

{
$c = $a * myDegree($a, $b-1); echo "Число" ."  " .$a. "  в степени   "  .$b.  "   равно   " . $c;
}
session_start(); 
$counter = $_COOKIE["counter"]; 
if (!isSet($counter)) 
$counter = date('Y-m-d H:i:s'); 
else 
$counter = $counter;
?>

</form>
</td>

</table>

</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
      </div>
    </div>
    </div>

	<?php include "bottom.inc.php" ?>


  </body>
  </html>