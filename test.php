<?php
$double = function($a) {
    echo $a;
};
$numbers = array("test");
array_map($double, $numbers);
?>