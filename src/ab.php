<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>黄涛word处理程序</title>
</head>
<body>
<?php
error_reporting(0);
if($_POST['submit']){
    $arr=file($_FILES['afile']['tmp_name']);
    $brr = file($_FILES['bfile']['tmp_name']);
    echo implode('<br>',array_diff($brr, $arr));die;
}
?>

<form name="word" action="" method="post" enctype="multipart/form-data">
    <label for="file">A文件:</label>
    <input type="file" name="afile" id="file" />
    <br />
    <label for="file">B文件:</label>
    <input type="file" name="bfile" id="file" />
    <input type="submit" name="submit" value="提交查看结果" />

</form>

</body>
</html>