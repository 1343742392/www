<?php
require_once './tool/user.php';

$code = $_POST['code'];
if(!$code) die;

$ids = file_get_contents('https://api.weixin.qq.com/sns/jscode2session?appid=wx67f30e9baa28a863&secret=8a64541fb9c96f8138d0cc08084d5320&js_code='.$code.'&grant_type=authorization_code');
if(preg_match('/.*err.*/',$ids))
{
    echo'获取openid错误:'.$ids;
    die;
}

$openid = json_decode($ids)->{'openid'};

if($openid == null)
{
    echo'未获取到openid';
    die;
}

if(hasUserByOpenId($openid))
{
    $id = getIdByOpenId($openid);
    if(!$id)
    {
        //出现错误 写入log
        die;
    }
    echo $id;
    //获取到id返回
    die;
}  

$newid = rand(0,10000000000);
while(hasUserById($newid))
{
   $newid = rand(0,10000000000);
}
addUser($newid, $openid);
echo $newid;
?>