<?php
header("Content-Type:text/html; charset=utf-8");
    //使用者資訊
    $host = "192.168.7.2";
    $user = "test123";
    $pass = "test123";

    //資料庫資訊
    $databaseName = "lightdb";
    $tableName = "light";

  
    //連結資料庫
    $con = mysql_connect($host,$user,$pass);
    $dbs = mysql_select_db($databaseName, $con);
    mysql_query("SET NAMES UTF8",$con);

    



    //資料庫Sql query語法
    $sql = "SELECT DISTINCT address FROM light order by ID DESC LIMIT 50";

    //執行query語法
    $result = mysql_query($sql);

    //取出資料
    $data=array();
    while ($row = mysql_fetch_array($result)){
      array_push($data, $row);
    }

    //輸出並且轉成json格式  第二個參數才不會輸出亂碼  json不太相容繁體
    echo json_encode($data,JSON_UNESCAPED_UNICODE);




?>
