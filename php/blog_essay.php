<?php
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "webuser";
$password = "za123123";
$dbname = "webuser";

$essay_id = $_POST['id']; 
// 创建连接
$conn = mysql_connect($servername,$username,$password);
// Check connection
if(!$conn){
    die("连接失败：".mysql_error());
}
 
$sql = "SELECT * FROM blog_essay WHERE id=".$essay_id;

mysql_select_db($dbname);

$result = mysql_query($sql,$conn);
 
//输出数据
while($row = mysql_fetch_array($result)) {
    echo json_encode(array("title"=>$row["title"],"author"=>$row["author"],"description"=>$row["description"],"content"=>$row["content"],"imgurl"=>$row["imgurl"],"tags"=>$row["tags"],"update_time"=>$row["update_time"],"id"=>$row["id"]));
}

mysql_close($conn);