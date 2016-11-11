<?php

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

header("Content-type: text/html; charset=windows1251;");
$file = 'log.txt';
if (isset($_FILES['file'])) {
    //Проверка файла
    $file = $_FILES['file'];
//    if ($_FILES['file']['size'] < 5*MB)
    if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/png' || $file['type'] == 'image/gif')
        if ($file['size'] > 10*MB) { echo '<p>Максимально разрешенный размер файла - 10 МБ</p>'; }
        else {copy($file['tmp_name'], $file['name']);}
}
?>

<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Send">
</form>


//php_value upload_max_filesize 10M