<?php
include("./tool/db.php");
$search = $_GET['name'];
$search = preg_replace('/\n|\r|\s|\t*/', '', $search);
global $search;
if(!$search)die('err null name');
$reslut = array();
global $reslut;
$callback = function($value)
{
    global $search;
    global $reslut;
    $name = $value['name'];
    $subfix = $value['subfix'];
    if(preg_match('/.*'.$search.'.*/', $name))
    {
        $time = $value['time'];
        $id = $value['id'];
        $public = $value['public'];
        $arr = array('name'=> $name, 'subfix' => $subfix, 'public' => $public, 'time' => $time, 'id' => $id);
        array_push($reslut, $arr);
    }
};

getTable("music", $callback);
echo json_encode($reslut);

