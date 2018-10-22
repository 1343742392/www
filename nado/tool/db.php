<?php
include("config.php");

function hasValue($table, $column, $value)
{
    if(!$table || !$column || !$value)
    {
        die('has value arg null');
    }
    global $config;
    $conn = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_query($conn, 'set names utf8');
    $result = mysqli_query($conn, "SELECT ".$column." FROM ".$table);

    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            if($value == $row[$column])
            {
                return true;
            }
        }
        return false;
    }
}

function getTable($table, $callback)
{
    if(!$table)
        return 'arg is null'; 
    global $config;
    $conn = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_query($conn, 'set names utf8');
    $result = mysqli_query($conn, "SELECT * FROM ".$table);
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            array_map($callback, array($row));
        }
    } 
    mysqli_close($conn);
    
}

/*获取table表obj_colum列value行的 column列的值
1列 2列
1  2
3 4

getValue($table, id, 4 , mame) 得到id=4的name
return 3
*/
function getValue($table,  $obj_column, $value, $column)
{
    if(!$table || !$obj_column || !$value || !$column)
	    return 'arg is null'; 
    global $config;
    $conn = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_query($conn, 'set names utf8');
    $result = mysqli_query($conn, "SELECT * FROM ".$table);
    if(!$result)
    {
        echo "err " . mysqli_error();
        die;
    }
    while($row = mysqli_fetch_assoc($result)) 
    {

        if($row[$obj_column] == $value)
        {
            return $row[ $column];
        }
    }
    return false;
}
/*setValue($table, $obj_column, $value, $column, $setValue)
设置table表obj_colum列等于value行 的column列的值

setValue(table, 1, a, 2, b)
1    2        1     2
c    c   ->   c     c
a    a        a     b
*/
function setValue($table, $obj_column, $value, $column, $setValue)
{
    global $config;
    $conn = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_query($conn, 'set names utf8');
    

    $sql = "UPDATE `".$table."` SET `".$column."`='".$setValue."' WHERE ".$obj_column." = ".$value;
    //echo $sql;
    return mysqli_query($conn, $sql);
}


function getRow($table, $obj_column, $value)
{
    if(!$table || !$obj_column || !$value)
	    return 'arg is null'; 
    global $config;
    $conn = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_query($conn, 'set names utf8');

    $result = mysqli_query($conn, 'SELECT * FROM `'.$table.'` WHERE '.$obj_column.'='.$value );
	if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			return $row;
		}
	} 
}

function getRowNum($table)
{
    if(!$table)
	    return 'arg is null'; 
    global $config;
    $conn = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_query($conn, 'set names utf8');
    $sql = "select count(*) as value from ".$table;
    $result =  mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
            return $row['value'];
		}
	} 
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
    $conn = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db']);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_query($conn, 'set names utf8');
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
  $conn = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db']);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  mysqli_query($conn, 'set names utf8');
  $id = '`'.$values[0][0].'`';
  $value = "'".$values[0][1]."'";
  for($f = 1; $f < count($values); $f ++)
  {
    $id = $id.',`'.$values[$f][0].'`';
    $value = $value.",'".$values[$f][1]."'";
  }
  $sql = 'INSERT INTO `'.$table.'` ('.$id.') VALUES ('.$value.');';

  return mysqli_query($conn, $sql);
}

//删除一行 指定值的那一行
function deleteLine($table, $value)
{
  global $config;
  $conn = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['db']);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  mysqli_query($conn, 'set names utf8');
  return mysqli_query($conn, 'DELETE FROM `'.$table.'` WHERE '.$value[0].' = '.$value[1]);
}
