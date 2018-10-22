<?php
function arrayToString($arr, $str)
{
    $reslut = '';
    for($f = 0; $f < count($arr); $f ++ )
    {
        $reslut = $reslut.$str.$arr[$f];
    }
    return $reslut;
}