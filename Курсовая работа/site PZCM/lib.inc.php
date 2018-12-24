<?php
	function getMenu($menu, $vertical=true)
	{
		$style = "";
		if(!$vertical)
		{
			$style = "display:inline";
		}
		echo '<ul style="list-style-type:none">';
			foreach ($menu as $link=>$href)
			{
				echo "<li style='$style'><a href=\"$href\">", $link, '</a></li>';
			}
		
		echo '</ul>';
	}
	
	
	function clearData($data)
	{
		return trim(strip_tags($data));
	}
	
	function loadImage($p){    // функция принимает параметр, который получает значение либо add(новое изображение) либо edit(замена изображения)
		$a = array("mess"=>"","src"=>""); // возвращаемый массив из двух элементов $a['mess'] - сообщение об ошибке если есть и $a['src'] - путь к изображению 
		if ($_FILES['uploadfile']['type'] != 'image/jpeg') 
			$a['mess']= '<font color="red" align="center" >Не верный тип изображения!</font>';
		else
		{
			if ($_FILES['uploadfile']['size'] > 100000) 
				$a['mess'] = '<font color="red" align="center" >Размер изображения слишком большой! (макс.=100кб.)</font>';
			else
			{
				$Image = imagecreatefromjpeg($_FILES['uploadfile']['tmp_name']); // создаем изображение
				$Size = getimagesize($_FILES['uploadfile']['tmp_name']); // получаем размер изображения
				$Tmp = imagecreatetruecolor(300, 300);
				imagecopyresampled($Tmp, $Image, 0, 0, 0, 0, 300, 300, $Size[0], $Size[1]);	// изменяем размер на 300 на 300 $Size[0] и $Size[1] текущие размеры выбранного изображения							
				if ($p=="add")
					$Download = 'images/catalog/'.count($_SESSION['catalog']);
				else 
					$Download = $_SESSION['catalog'][$_GET['id']]['image'];
				if (empty($Download)) $Download = 'images/catalog/'.$_GET['id'];
				imagejpeg($Tmp, $Download.'.jpg'); // сохраняем изображение на сервере в каталоге $Download 
				imagedestroy($Image);
				imagedestroy($Tmp);
				$a['src']=$Download;
			}		
		}
		return $a;
	}
	
	
	
	
	
	$connect = false;
	function connectDB(){   // функция подключения к БД
		global $connect;
		$host = "127.0.0.1";
		$user = "root";
		$password = "";
		$database = "pzcm";
		$connect = mysqli_connect($host,$user,$password,$database) or die("Не удалось подключиться к БД"); // подключение к базе данных			
		/* изменение набора символов на utf8 */
		mysqli_set_charset($connect,"utf8");
	}
	
	function getOne($query){ // функция получения одной записи из БД
		global $connect;
		connectDB();
		$result_set = mysqli_query($connect,$query) or die("Ошибка " . mysqli_error($connect));;
		closeDB();
		return $result_set->fetch_assoc();
	}	
	
	
	function getAll($query){ // функция получения нескольких записей из БД
		global $connect;
		connectDB();
		$result_set = mysqli_query($connect,$query) or die("Ошибка " . mysqli_error($connect));;
		closeDB();
		return resultSetArray($result_set);
	}
	
	function executeQuery($query){  // функция выполнения запросов, которые не возвращают данные (INSERT,UODATE,DELETE и т.д)
		global $connect;
		connectDB();
		$result_set = mysqli_query($connect,$query) or die("Ошибка " . mysqli_error($connect));;
		closeDB();		
	}	
	
	function resultSetArray($result_set){  // функция преобразования полученных данных из БД в ассоциативный массив
		$array =array();
		while (($row = $result_set->fetch_assoc()) !=false)
			$array[] = $row;
		return $array;
	}	
	
	
	function closeDB() {  // закрытие соединения с БД
		global $connect;
		mysqli_close($connect);
	}   
	
	
	function addUser($login, $password, $surname, $name, $email, $phone){  // функция добавления пользователя в таблицу users
		global $connect;
		connectDB();		
		$query ="SELECT id FROM users where login = '$login' or email = '$email'";		// проверяем нет ли в таблице пользователя с таким логином или емаилом
		$result = getOne($query);
		if(!empty($result))
		{		
			echo "<font color=red>Пользователь с таким логином или email уже существует!</font>";
		}
		else 
		{
			$query ="INSERT INTO users (login, password, surname, name, email, phone) VALUES ('$login', '$password', '$surname', '$name', '$email','$phone')";			
			executeQuery($query);
			header("Location: index.php?login=".$login); 			
		}		
	}
	
	
		
	function editUser($id,$login, $password_main, $password_confirm, $surname, $name, $email, $phone){  // функция добавления пользователя в таблицу users
		$fl = 1;
		$password = "";
		if (!empty($password_main) || !empty($password_confirm))
		{			
			if ($password_main == $password_confirm)
			{           
				$password = md5(md5($password_main.'salt'));   // хэшируем пароль 				
			}
	        else
			{
				echo '<font color=red>Пароли не совпадают!</font>';
				$fl = 0;
			}
		}				
		if ($fl == 1)
		{
			global $connect;
			connectDB();		
			$query ="SELECT id FROM users where id <> $id and (login = '$login' or email = '$email')";		// проверяем нет ли в таблице пользователя с таким логином или емаилом
			$result = getOne($query);
			if(!empty($result))
			{		
				echo "<font color=red>Пользователь с таким логином или email уже существует!</font>";
			}
			else 
			{
				if ($password != "")						
					$query ="UPDATE users  set login = '$login', password = '$password', surname = '$surname', name = '$name', email = '$email', phone = '$phone' WHERE id = $id";			
				else
					$query ="UPDATE users  set login = '$login', surname = '$surname', name = '$name', email = '$email', phone = '$phone' WHERE id = $id";									
				executeQuery($query);
				echo "<font color=green>Данные сохранены!</font>";
			}				
		}		
	}
	
	
	
	function login($login,$password){
		global $connect;
		connectDB();
		
	}
 
	
	function makePager($kol, $all_count, $page)  // простая пагенация
	{
		// помещаем номер страницы из массива GET в переменую $nom
		$nom = isset($_GET["nom"]) ? (int) $_GET["nom"] : 1;
		// количество записей на страницу
		$on_page = $kol;
		// (номер страницы - 1) * записей на страницу
		$shift = ($nom - 1) * $on_page;
		// получаем количество записей
		$count = $all_count; 
		$pages = ceil($count / $on_page);
		for ($i = 1; $i <= $pages; $i++) {
			// если текущая старница
			if($i == $nom){
				echo " [$i] ";
			} else {
				echo "<a href='index.php?page=".$page."&nom=$i'>$i</a> ";
			}
		}
		return $shift;
	}
	
	
?>