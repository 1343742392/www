<?php
require_once 'tool/user.php';

$id = $_GET['id'];
if(!$id)
	die('id is null');
$collects = getCollects($id);
echo json_encode(array_filter($collects));

  