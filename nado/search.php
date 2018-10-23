<?php
include("./tool/db.php");
include('./tool/config.php');
$search = $_GET['name'];
$search = preg_replace('/\n|\r|\s|\t*/', '', $search);
global $search;
if(!$search)die('err null name');
$reslut = array();
global $reslut;
$index = 0;
global $index;
$callback = function($value)
{
    global $search;
    global $reslut;
    $name = $value['name'];
    $subfix = $value['subfix'];
    if(preg_match('/.*'.$search.'.*/', $name))
    {
        global $index;
        global $config;
        $index = $index + 1;
        if($index < $config['searchReslutLenth'])
        {
            $time = $value['time'];
            $id = $value['id'];
            $public = $value['public'];
            $arr = array('name'=> $name, 'subfix' => $subfix, 'public' => $public, 'time' => $time, 'id' => $id);
            array_push($reslut, $arr);
        }
        
    }
};

getTable("music", $callback);
echo json_encode($reslut);

