<?php
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "webuser";
$password = "za123123";
$dbname = "webuser";
 
// 创建连接
$conn = mysql_connect($servername,$username,$password);
// Check connection
if(!$conn){
    die("连接失败：".mysql_error());
}
 
$sql = "SELECT * FROM blog_essay";

mysql_select_db($dbname);

$result = mysql_query($sql,$conn);

$arr = array();
 
//输出数据
while($row = mysql_fetch_array($result)) {
    array_push($arr,array("title"=>$row["title"],"author"=>$row["author"],"description"=>$row["description"],"imgurl"=>$row["imgurl"],"tags"=>$row["tags"],"update_time"=>$row["update_time"],"id"=>$row["id"]));
}

$echoArr = json_encode($arr);

echo $echoArr;

mysql_close($conn);