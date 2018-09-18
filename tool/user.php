<?php
require_once 'db.php';
require_once 'log.php';

function hasUserById($id)
{
    return hasValue('user', 'id', $id);
}

function hasUserByOpenId($openId)
{
    return hasValue('user', 'open_id', $openId);
}

function addUser($id, $openid)
{
    $user = array(array('id', $id), array('open_id', $openid));
    if(!insetValue('user', $user))
    {
       writeLog('创建id:'.$id.'openid:'.$openid.'失败');
       die;
    }
    writeLog('创建id:'.$id.'openid:'.$openid.'成功');
}

function getIdByOpenId($openId)
{
    $id =  getValue('user', 'id', 'open_id', $openId);
    if($id)
    {
        writeLog('找回id:通过openid:'.$openId.'成功');
        return $id;
    }
    return false;
}

function collection($userId, $musicName)
{

    $musicNames = getValue('user', 'id', $userId, 'collect');
    if(!setValue('user', 'id', $userId, 'collect', $musicNames.','.$musicName))
    {
        return false;
    }
    return true;
}