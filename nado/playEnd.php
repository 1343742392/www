<?php
include("./tool/db.php");
$id = $_POST['id'];
if(!$id)
    die('id is null');

$oldPlayNum = getValue('music', 'id', $id, 'playNum');
$oldPlayNum = $oldPlayNum + 1;
if(setValue('music', 'id', $id, 'playNum', $oldPlayNum))
{
    echo '增加成功';
}
else
{
    echo '增加失败';
}