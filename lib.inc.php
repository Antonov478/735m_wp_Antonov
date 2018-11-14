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

    function imageCheck($img)
    {
        if ($img['type'] == "image/jpeg")
        {
            if ($img['size']<=1024000)
                return 1;
            else
                return "Размер файла не должен превышать 1000Кб!";
        }
        else
            return "Файл должен иметь jpeg-расширение!";
    }

function resize($file)
{
    global $tmp_path;
    // Ограничение по ширине в пикселях
    $max_size = 250;
    // Cоздаём исходное изображение на основе исходного файла
    $src = imagecreatefromjpeg($file['tmp_name']);
    // Определяем ширину и высоту изображения
    $w_src = imagesx($src);
    $h_src = imagesy($src);
    // Если ширина больше заданной
    if ($w_src > $max_size)
    {
        // Вычисление пропорций
        $ratio = $w_src/$max_size;
        $w_dest = round($w_src/$ratio);
        $h_dest = round($h_src/$ratio);
        // Создаём пустую картинку
        $dest = imagecreatetruecolor($w_dest, $h_dest);
        // Копируем старое изображение в новое с изменением параметров
        imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
        // Вывод картинки и очистка памяти
        imagejpeg($dest, $tmp_path . $file['name']);
        imagedestroy($dest);
        imagedestroy($src);
        return $file['name'];
    }
    else
    {
        // Вывод картинки и очистка памяти
        imagejpeg($src, $tmp_path . $file['name']);
        imagedestroy($src);
        return $file['name'];
    }
}

function getId(){
    if (!isset($_SESSION['last_index'])){
        $_SESSION['last_index'] = 0;
    } 
    return ++$_SESSION['last_index'];
}

function getItemById($id){
    if (isset($_SESSION['Items'])){
        foreach($_SESSION['Items']  as $item){
            if ($item['id'] == $id){
                return $item;
                break;
            }
        }
    }
}

function createNewItem(){
    return createItem(getId());  
}

function editItem($id){
    deleteItem($id);
    return createItem($id); 
}

function save_file($file){
    $tmp_path = getcwd().'\tmp';
    $result = imageCheck($file);
    if ($result == 1)
    {
        $name = resize($file);
        if (@copy($file['name'], $tmp_path.'\\'.$name)){
            $uploadlink = '/tmp'.'/'.$name;
        } else {
            $errors= error_get_last();
            echo "COPY ERROR: ".$errors['type'];
            echo "<br />\n".$errors['message'];
        }   
        unlink($file['name']);
    }
    else
    {
        $uploadlink = '';
        exit;
    }
    return $uploadlink;
}

function createItem($id){
    $item_array = array();
    
        $item_array['id'] = $id;
        $item_array['name'] = clearData($_POST['name']);
        $item_array['year'] = clearData($_POST['year']);
        $item_array['authors'] = clearData($_POST['authors']);
        $item_array['amount'] = clearData($_POST['amount']);
        $item_array['publishing'] = clearData($_POST['publishing']);
        //$item_array['uploadfile'] = save_file($_FILES['uploadfile']);
    return $item_array;
}

function addItem($item){
    if (!isset($_SESSION['Items'])){
        $_SESSION['Items'] = array();
    }
    array_push($_SESSION['Items'], $item);
}

function deleteItem($id){
    if (isset($_SESSION['Items'])){
        for($i = 0; $i < count($_SESSION['Items']); ++$i) {
            if ($_SESSION['Items'][$i]['id'] == $id){
                array_splice($_SESSION['Items'], $i, 1);
            }
        }
    }
}?>