<?php
require_once './tool/user.php';
$userId = $_POST['user'];
$musicId = $_POST['musicId'];

if($userId == null || $musicId == null) 
{
    echo '请求为空';
    die;
}

if(collection($userId, $musicId))
{
    echo '收藏成功';
}
else
{
    echo '收藏失败';
}