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
    $user = array(array('id', $id), array('name', ''),  array('collect', ''),array('open_id', $openid));
    if(!insetValue('user', $user))
    {
       writeLog('创建id:'.$id.'openid:'.$openid.'失败');
       die('创建失败');
    }
    writeLog('创建id:'.$id.'openid:'.$openid.'成功');
}

function getIdByOpenId($openId)
{
    $id =  getValue('user', 'open_id', $openId, 'id');
    if($id)
    {
        writeLog('找回id:通过openid:'.$openId.'成功');
        return $id;
    }
    return false;
}

function collection($userId, $musicId)
{

    $collect = getValue('user', 'id', $userId, 'collect');
    $name = getValue('music', 'id', $musicId, 'name');
    $public = getValue('music', 'id', $musicId, 'public');
    $subfix = getValue('music', 'id', $musicId, 'subfix');
    $seveStr = $collect.':'.$musicId.':'.$name.':'.$subfix.':'.$public;
    if(!setValue('user', 'id', $userId, 'collect', $seveStr))
    {
        return false;
    }
    return true;
}

function discard($userId, $musicId)
{

    $collectStr = getValue('user', 'id', $userId, 'collect');
    $collect = explode(':', $collectStr);
    $collect = array_filter($collect);
    $collect = array_values($collect);
    $reslut = '';
    for($f = 0; $f < count($collect); $f++ )
    {
        if($collect[$f] == $musicId)
        {
            echo $f;
            array_splice($collect, $f, 4);
            array_values($collect);
        }
        if(count($collect) != 0)
            $reslut = $reslut.':'.$collect[$f];
    }
    if(!setValue('user', 'id', $userId, 'collect', $reslut))
    {
        return false;
    }
    return true;
}




function getCollects($id)
{
	if(!$id)
        return false;

    $collects = getValue('user', 'id', $id, 'collect');
    $collects = array_values(array_filter(explode(':', $collects)));
    $index = 0;
    $music = array();
    $reslut = array();
    for($f = 0; $f < count($collects); $f ++)
    {
        array_push($music, $collects[$f]);
        $index++;
        if($index == 4)
        {
            array_push($reslut, $music);
            $music = array();
            $index = 0;
        }
    }
    return $reslut;
}
