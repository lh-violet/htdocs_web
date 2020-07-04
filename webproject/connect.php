<?php
$mysql_conf = array(
    'host'    => 'localhost',   // IP : 端口
    'db'      => 'test',   // 要连接的数据库
    'db_user' => 'root',   // 数据库用户名
    'db_pwd'  => '',   // 密码
    );

//旧$mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
$mysqli = mysqli_connect($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd'], $mysql_conf['db']);
//旧if ($mysqli->connect_errno) {
if (!$mysqli){
    die("could not connect to the database:\n" . $mysqli->connect_error);//诊断连接错误
}
?>