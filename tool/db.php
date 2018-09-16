<?php
include("config.php");

function query($conn, $sql)
{
    if(!mysqli_query($conn, $sql))
    {
        echo "no " . mysql_error();
        die;
    }
}

function hasValue($table, $column, $value)
{
    global $config;
    $conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    query($conn, 'set names utf8');
    $result = mysqli_query($conn, "SELECT ".$column." FROM ".$table);
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            if($value == $row["id"])
            {
                return true;
            }
        }
        return false;
    }
    $result = mysqli_query($conn, "SELECT ".$column." FROM ".$table);
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            if($value == $row["id"])
            {
                return true;
            }
        }
        return false;
    }
    else
    {
        return false;
    }
}
/*获取table表obj_colum列value行的 column列的值
1列 2列
1  2
3 4

getValue($table, mame, id, 4) 得到id=4的name
return 3
*/
function getValue($table, $column, $obj_column, $value)
{
    global $config;
    $conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    query($conn, 'set names utf8');
    $result = mysqli_query($conn, "SELECT * FROM ".$table);
    if(!$result)
    {
        echo "err " . mysql_error();
        die;
    }
    while($row = mysqli_fetch_assoc($result)) 
    {
        var_dump($row);
        if($row[$obj_column] == $value)
        {
            return $row[ $column];
        }
    }
    return false;
}

/*
getColumn($table, $column, $callback)
表名    列名     回调函数
example:
    getColumn(“表名", "列名", function($value){echo $value;});
*/

function getColumn($table, $column, $callback)
{
    global $config;
    $conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    query($conn, 'set names utf8');
    $result = mysqli_query($conn, "SELECT ".$column." FROM ".$table);
	if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			array_map($callback, array($row['name']));
		}
	} 
	else 
	{
		echo "0 结果";
	}
	mysqli_close($conn);
}


//指定表 列 插入一行数据
function insetValue($table, $values)
{
  global $config;
  $conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  query($conn, 'set names utf8');
  $id = '`'.$values[0][0].'`';
  $value = "'".$values[0][1]."'";
  for($f = 1; $f < count($values); $f ++)
  {
    $id = $id.',`'.$values[$f][0].'`';
    $value = $value.",'".$values[$f][1]."'";
  }
  return query($conn, 'INSERT INTO `'.$table.'` ('.$id.') VALUES ('.$value.');');
}

//删除一行 指定值的那一行
function deleteLine($table, $value)
{
  global $config;
  $conn = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  query($conn, 'set names utf8');
  return query($conn, 'DELETE FROM `'.$table.'` WHERE '.$value[0].' = '.$value[1]);
}