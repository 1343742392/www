 <?php
 include("./tool/db.php");
 
 $musicId = $_GET['id'];
 if(!$musicId)
    die('id null');
$reslut = getRow('music', 'id', $musicId);
if($reslut)
{
    echo json_encode($reslut);
}
else
{
    echo 'err';
}
