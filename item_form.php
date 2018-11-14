<form  method='POST' enctype="multipart/form-data">	
    <input type="text" hidden name="id" value='<?php if(isset($id)) echo $id?>'>	
    <table id='item-form-table'>
        <tr>
            <td>Наименование методических указаний:</td>
            <td><input type="text" maxlength="30" name="name" value='<?php if(isset($name)) echo $name?>' ></td>
        </tr>
        <tr>
            <td>Авторы:</td> 
            <td><input type="text" maxlength="30" name="authors" value='<?php if(isset($authors)) echo $authors?>'></td>
        </tr>
        <tr>
            <td>Год издания:</td> 
            <td><input type="text" maxlength="30" name="year" value='<?php if(isset($year)) echo $year?>'></td>
        </tr>
        <tr>
            <td>Количество страниц:</td>
            <td><input type="text" maxlength="30" name="amount" value='<?php if(isset($amount)) echo $amount?>'></td>
        </tr> 		 		
        <tr>
            <td>Издательство:</td>
            <td><input type='text' name='publishing' size='10' value='<?php if(isset($publishing)) echo $publishing?>'></td>
        </tr>
        <tr>
            <td>Изображение</td> 
            <td><input type='file' accept='image/jpeg' name='uploadfile' value="<?php if(isset($uploadfile)) echo $uploadfile?>"></td>
        </tr>
    </table>
    <input class='btn' type='submit' value='Сохранить'>
</form>