<?php
include("tool\\db.php");
include('tool\\log.php');
//放置文件
if ($_FILES["file"]["error"] > 0)
{
echo "Error: " . $_FILES["file"]["error"] . "<br />";
}
$gbkFileName = iconv( "UTF-8","GBK//IGNORE",$_FILES["file"]["name"]);
$time = time();
$utfFileName = iconv('GBK//IGNORE', 'UTF-8', $gbkFileName);
move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__ . '\\upload\\'.$gbkFileName);
//数据库记录
$value = array(array('name',$utfFileName), array('time', $time));
insetValue('music', $value);
//日志
writeLog("upload:".$utfFileName);

