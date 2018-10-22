<?php
$arr = array('a' => 1, 'v'=> 2, 3 => 3, 4 => 4);
array_splice($arr, 0, 4);
var_dump($arr);