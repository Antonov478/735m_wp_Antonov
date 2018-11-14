    <div class="container-fluid fon-footer">
    <div class="container">
      <div class="row"> 
        <div class="col-md-4">
          <img src="Images/zvetmet1.png" alt="Логотип" class="logotip-footer">
          <p class="text-logotip-footer">АО "ПЗЦМ"</p>
        </div>
        <div class="col-md-4">
	<?php date_default_timezone_set('Europe/Moscow')?>
	<p class="inform-bottom1">Ваш последний визит: <?=$visitDate?> </p>
	<p class="inform-bottom2"> Системное время: <?=date("d.m.Y H:i")?> </p>
	<p class="inform-bottom2"> Информация о сервере: <?=$_SERVER['SERVER_SOFTWARE']?></p>
        </div>
        <div class="col-md-4">
          <p class="phone-footer">г. Касимов мк. Приоксий</p>
        </div>
      </div>
    </div>
    </div>