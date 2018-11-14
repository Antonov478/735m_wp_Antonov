<?php include "lib.inc.php"; ?>
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
    <div class="container-fluid fon-header">
    <div class="container">
      <div class="row">
      <div class="col-md-6">
        <img src="Images/zvetmet.jpg" alt="Логотип" class="logotip">
        <p class="text-logotip">АО "Приокский завод цветных металлов"</p>
      </div>
      <div class="col-md-6">

      </div>
      </div>
    </div>
    </div>

    <div class="container">
      <div class="row">
      <div class="col-md-3">
        <ul id="menu">
          <li><a href="index.php">Главная страница</a></li>
          <li><a href="lab_rab1.php">Работа №1</a></li>
        </ul>
      </div>
      <div class="col-md-9">
        <h3 class="zagolovok">ТАБЛИЧНАЯ СТРУКТУРА</h3>
           
        <table border="1">
			<tr>	
				<td colspan="2" rowspan="2" width="80" height="80" bgcolor = "blue"></td><td colspan="2" rowspan="2" width="80" height="80"></td><td colspan="4" rowspan="2" width="160" height="80"></td><td colspan="2" rowspan="2" width="80" height="80"></td></tr>
			<tr></tr>
			<tr>
				<td rowspan="4" width="40" height="160"></td><td rowspan="4" width="40" height="160"></td><td colspan="6" rowspan="2" width="240" height="80" bgcolor = "green"></td><td colspan="2" width="80" height="40" bgcolor = "red"></td></tr>
			<tr>
				<td colspan="2" width="80" height="40"></td></tr>
			<tr>
				<td colspan="4" rowspan="2" width="160" height="80"></td><td rowspan="2" width="40" height="80"></td><td rowspan="2" width="40" height="80" bgcolor = "yellow"></td><td colspan="2" rowspan="2" width="80" height="80"></td></tr>
			<tr></tr>
		</table>
              
              <h3><b> ФОРМА ПРИЕМА НА РАБОТУ </b></h3>
      <div>
      <form action="POST">
        <p>
          <b>Фамилия:</b> 
          <input type="text" name="surname" maxlength="70" class="qwe8 size="35" placeholder="Введите фамилию"/>
        </p>
                <p>
          <b>Имя:</b> 
          <input type="text" name="name" maxlength="70" class="qwe7 size="35" placeholder="Введите имя"/>
        </p>
                <p>
          <b> Отчество:</b> 
          <input type="text" name="PATRONYMIC" class="qwe6 maxlength="70" size="35" placeholder="Введите отчество"/>
        </p>
			<p>
                <label for="date">Дата рождения: </label>
                <input type="date" id="date" name="date"/>
            </p>      
			<p>
          <b>Наличие диплома </b>
          <input type="radio" name="yes" value="Stat1">Есть
          <input type="radio" name="no" value="Stat2">Нет
        </p>
        <p>
          <b>Вакантные должности:</b> 
          <select name="predmet" class="qwe2">
						<option value="Разработчик ПО">Разработчик ПО</option>
						<option value="Тестировщик">Тестировщик</option>
						<option value="Менеджер отдела продаж">Менеджер отдела продаж</option>
						<option value="Проектировщик">Проектировщик</option>
						<option value="Сиситемный аналитик">Сиситемный аналитик</option>
					</select>
          </p> 
		  
		    
		  <p>
          <b>Возможный график работы</b>
          <input type="checkbox" name="fulltime" value="Stat1">Полный день  
          <input type="checkbox" name="flaxebl" value="Stat2">Гибгий график
          <input type="checkbox" name="two/two" value="Stat3">Два через два
        </p>
         
     
          <p>
           <b>Коментарии к заявке</b> <br/>
           <textarea name="improve" cols="70" rows="5" placeholder="Введите текс"></textarea>
          </p>
        
           <input type="submit" style="margin: 10px" value="Отправить"/>
      </form>
      </div>
      </div>
    </div>
    </div>
    <div class="container-fluid fon-footer">
    <div class="container">
      <div class="row"> 
        <div class="col-md-4">
          <img src="Images/zvetmet.jpg" alt="Логотип" class="logotip-footer">
          <p class="text-logotip-footer">АО "ПЗЦМ"</p>
        </div>
        <div class="col-md-4">
          <p class="address-footer">г. Касимов, мк. Приокский</p>
        </div>
        <div class="col-md-4">
          <p class="phone-footer">+7 (4912) 77-77</p>
        </div>
      </div>
    </div>
    </div>

  </body>
  </html>