    <div class="container-fluid fon-footer">
    <div class="container">
      <div class="row"> 
        <div class="col-md-4">
          <img src="Images/zvetmet.jpg" alt="Логотип" class="logotip-footer">
          <p class="text-logotip-footer">АО "ПЗЦМ" </p>
        </div>
        <div class="col-md-4">
	<?php date_default_timezone_set('Europe/Moscow')?>
	<p class="inform-bottom1">Ваш последний визит:<?php echo $counter; ?></p> 
	<p class="inform-bottom2"> Системное время: <?=date("d.m.Y H:i")?> 
	<p class="inform-bottom2"> Информация о сервере: <?=$_SERVER['SERVER_SOFTWARE']?>
        </div>
        <div class="col-md-4">
          <p class="phone-footer">г. Касимов мк. Приоксий</p>
        </div>
		<div class="col-md-4">
          <p class="phone-footer"> Тел: +7 (4912) 77-77</p>
        </div>
      </div>
    </div>
    </div>