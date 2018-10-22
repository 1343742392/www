<?php
include("./tool/db.php");
include('./tool/log.php');
include('./tool/config.php');
//放置文件
if ($_FILES["file"]["error"] > 0) 
{
die("Error: " . $_FILES["file"]["error"] . "<br />"); 
}

$fileName = $_FILES["file"]["name"];
$public = $_POST['public'];
$lyric = $_POST['lyric'];
$time = date("Y.m.d");
$id = time() + $_FILES['file']['size'];
$publicTime = $_POST['publicTimeY'].'.'.$_POST['publicTimeM'].'.'.$_POST['publicTimeD'];
if(strlen($publicTime) < 3)
{
    $publicTime = date("Y.m.d");
}
if(!$public)
{
    $public = '无名网友';
}
if(!$lyric )
{
    $lyric  = '没有上传歌词';
}

if(strlen($public) > 20)
{
    die('发布人名字太长');
}
if(8 > strlen($publicTime) || strlen($publicTime)  > 10)
{
    die('发布日期填写错误');
}

$public = preg_replace('/:|`/', '', $public);

$nameLength = ($fileName);
global $config;

//file name limit
$fileName = preg_replace('/:/', '', $fileName);

//长度限制
if($nameLength >= $config['MusicNameLengthMax'])
{
    $fileName = mb_substr($fileName, 0, $config['MusicNameLengthMax'] - 4, 'gbk').mb_substr($fileName, $nameLength - 4, $nameLength, 'utf-8');
}

//后缀限制
$suffix = preg_replace('(.*\.)', '', $fileName);

$name = str_replace(strrev($suffix).'.', '', strrev($fileName));
$name = strrev($name);

if($suffix == null)
{
    die('未知文件');
}
if(!preg_match('/mp3|m4a|wma|wav/', $suffix))
{
    die('非音频文件');
}
move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__.'/upload/'.$id.'.'.$suffix
);
//数据库记录
$value = array
(
    array('name',$name), 
    array('time', $time), 
    array('public', $public),
    array('id',$id), 
    array('lyric',$lyric),
    array('subfix', $suffix),
    array('publicTime', $publicTime),
    array('playNum', 0)
);
if(insetValue('music', $value))
{
    echo '上传成功';
}
else
{
    echo '上传失败';

}
//日志
writeLog("upload:".$fileName);

