<?php
    header('Access-Control-Allow-Origin:*'); 
    $mysqli=new mysqli('rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com','root','pyt931028!','rg');//地址，用户名，密码，数据库名称
    $mysqli->query("set names utf8");
    $taskid=$_POST["taskid"];
    $userid=$_POST["userid"];
    $sel="select * from testresult where taskid='{$taskid}' and userid='{$userid}'";
    $result=$mysqli->query($sel);
    echo $mysqli->error;
    $result=$result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result);
?>