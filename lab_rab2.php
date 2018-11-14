<?php
	ini_set('display_errors',0);
	?>


				<tr>
					<td class="content_td">
					<!-- Область основного контента сайта -->
	<p>Задание 1</p>
<table border="0">
<tr>
<td><form method="POST" action="">
    <p>Возвести в степень</p>
	
               <br>Введите число :<input type="text" name="a" required value= ""><br>

              <br>Введите степень :<input type="text" name="b" required value= ""><br>

<input type="submit" name="button" value="Отправить">

</form></th>
<td><?php
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

?></td>
</tr>
</table>

					<p>Задание 2</p>

					
<table border="1">
<tr>
<tr>Список<p>серверных переменных:</tr>
<tr><?php
echo "<pre>" ;
print_r($GLOBALS);
echo "</pre>";
?></tr>
</tr>





</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
      </div>
    </div>
