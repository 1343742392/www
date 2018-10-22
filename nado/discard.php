<?php
require_once './tool/user.php';
$userId = $_POST['user'];
$musicId = $_POST['musicId'];

if($userId == null || $musicId == null) 
{
    echo '请求为空';
    die;
}

if(discard($userId, $musicId))
{
    echo'删除成功';
}
else
{
    echo'删除失败';
}