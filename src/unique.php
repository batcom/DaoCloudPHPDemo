<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>黄涛word处理程序</title>
</head>
<body>
<?php
function str_split_utf8($str){
     $split=1;
      $array=array();
      for($i=0;$i<strlen($str);){
            $value=ord($str[$i]);
              if($value>127){
                     if($value>=192&&$value<=223) $split=2;
                        elseif($value>=224 && $value<=239) $split=3;
                        elseif($value>=240 && $value<=247) $split=4;
                       }else{
                              $split=1;
                                }
              $key=NULL;
              for($j=0;$j<$split;$j++,$i++){
                     $key.=$str[$i];
                       }
                array_push($array,$key);
               }
       return $array;
}
error_reporting(0);
if($_POST['submit']){
    $arr=file($_FILES['file']['tmp_name']);
    $bword = $_POST['bword'];
    foreach ($arr as $line){
    	$lineArray = str_split_utf8(trim($line));
    	sort($lineArray);
    	$result[$line] = implode('', $lineArray);
    }
    $result = array_unique($result);

    echo implode('<br>',array_keys($result));die;
}
?>

<form name="word" action="" method="post" enctype="multipart/form-data">
    <label for="file">A文件:</label>
    <input type="file" name="file" id="file" />
    <br />
    <input type="submit" name="submit" value="提交查看结果" />

</form>

</body>
</html>
