<?php
require_once './tool/user.php';
$userId = $_POST['user'];
$musicName = $_POST['musicName'];
if($userId == null || $musicName == null) 
{
    echo '请求为空';
    die;
}

collection($userId, $musicName);