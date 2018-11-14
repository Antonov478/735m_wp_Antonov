    <div class="container-fluid fon-header">
    <div class="container">
      <div class="row">
      <div class="col-md-6">
        <img src="Images/zvetmet1.png" alt="Логотип" class="logotip">
        <p class="text-logotip">Официальный сайт АО "Приокский завод цветных металов"</p>
      </div>
	  
				<tr>  
					<td colspan="2" class="top_left">  
    <?php
		if (!empty($_SESSION['user_login'])){
            echo "<b>{$_SESSION['user_login']}</b> <a href='index.php?command=logout'>(Выход)</a>";
        } else {
            echo "User unlogged!";
        }	?>  
					</td>   	 					
	  </tr>
	  
      <div class="col-md-6">


      </div>
      </div>
    </div>
    </div>