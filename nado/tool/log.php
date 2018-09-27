



<?php
require_once 'config.php';
function writeLog($str)
{
    header("Content-type: text/html; charset=utf-8");
    global $config;
    $time = date('Y-m-d H:i:s');
    file_put_contents($config['logFile'], '['.$time.']'.$str.PHP_EOL, FILE_APPEND);
}