<?php

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

header("Content-type: text/html; charset=windows1251;");
$file = 'log.txt';
if (isset($_FILES['file'])) {
    //Проверка файла
    $file = $_FILES['file']['size'];
    if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/png' || $file['type'] == 'image/gif')
        if ($file['size'] > 10*MB) { echo '<p>Максимально разрешенный размер файла - 10 МБ</p>'; }
        else {copy($file['tmp_name'], $file['name']);}
}
?>

<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Send">
</form>
?>

//php_value upload_max_filesize 10M

<?php
echo 'Уже загруженные изображения';
 $dir = 'images/';
  $cols = 5;
  $files = scandir($dir);
  echo "<table>";
  $k = 0; // тестовая херня
  for ($i = 0; $i < count($files); $i++) {
    if (($files[$i] != ".") && ($files[$i] != "..")) { // чтобы пропустить текущий и родительский каталоги
      if ($k % $cols == 0) echo "<tr>";
      echo "<td>";
      $path = $dir.$files[$i];
      echo "<a href='$path'>";
      echo "<img src='$path' alt='' width='100' />";
      echo "</a>";
      echo "</td>";
      if ((($k + 1) % $cols == 0) || (($i + 1) == count($files))) echo "</tr>";
      $k++;
    }
  }
  echo "</table>";

?>
