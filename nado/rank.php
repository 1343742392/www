<?php
include("./tool/config.php");
include("./tool/db.php");
include("./tool/base.php");

$updateTime = 0;
$musicList = array();
global $updateTime;
global $musicList;
$back = function($value)
{
    global $updateTime;
    $updateTime = $value['updateTime'];
    $musicStr = $value['musicList'];
    global $musicList;
    $musicList = array_values(explode(':', $musicStr));
    array_splice($musicList, 0, 1);
};
getTable('rank', $back);

if(time() - $updateTime > $config['rankUpdateTime'] * 3600)
{
    //更新
    $musicList = array();
    $index = 0;
    global $index;
    $back = function($value)
    {
        $id = $value['id'];
        $playNum = $value['playNum'];
        global $musicList;
        $musicList[$id] =  $playNum;
        global $index;
        $index = $index + 1;
        if($index == getRowNum('music'))
        {
            arsort($musicList);
            global $config;
            $musicList = array_slice($musicList, 0, $config['rankLength'], true);
            $keys = array_keys($musicList);
            $reslut = array();
            $reslutStr = '';

            for($f = 0; $f <  $config['rankLength']; $f ++)
            {
                $id = getValue('music', 'id', $keys[$f], 'id');
                $name  = getValue('music', 'id', $keys[$f], 'name');
                $subfix = getValue('music', 'id', $keys[$f], 'subfix');
                $public = getValue('music', 'id', $keys[$f], 'public');
                $playNum = $musicList[$keys[$f]];
                $reslutStr = $reslutStr.':'.$id.':'.$name.':'.$subfix.':'.$public.':'.$playNum;
                array_push($reslut, array(
                    'id' => $id, 
                    'name' => $name, 
                    'subfix' => $subfix, 
                    'public' => $public,
                    'playNum' => $playNum
                ));
            }
            global $updateTime;
            deleteLine('rank', array('updateTime',$updateTime));

            insetValue('rank', 
                array(
                    array('updateTime', time()), 
                    array('musicList', $reslutStr))
            );
            //var_dump($reslut);
            //echo'<br>';
            //echo $reslutStr;
            echo json_encode($reslut);
        }
    };
    getTable('music', $back);
    
}
else
{
    //直接返回
    $reslut = array();
    //var_dump($musicList);
    
    for($f = 0; $f < count($musicList); $f = $f + 5)
    {
        $id = $musicList[$f];
        $name  = $musicList[$f + 1];
        $subfix = $musicList[$f + 2];
        $public = $musicList[$f + 3];
        $playNum = $musicList[$f + 4];
        array_push($reslut, array(
            'id' => $id,
            'name' => $name,
            'subfix' => $subfix,
            'public' => $public,
            'playNum' => $playNum,
        ));
    }
    
    echo json_encode($reslut);
}