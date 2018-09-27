<?php
include("./tool/db.php");
$search = $_GET['name'];
global $search;
if(!$search)die;
$reslut = '';
global $reslut;
$callback = function($value)
{
    global $search;
    global $reslut;
    if(preg_match('/.*'.$search.'.*/', $value))
    {
        $time = getValue('music',  'name', $value,'time');
        $reslut = $reslut.$value.','.$time.',';
    }
};
getColumn("music", 'name', $callback);
echo $reslut;