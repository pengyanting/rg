<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com","root","pyt931028!","rg");
  $mysqli->query("set names utf8");
  $answer=$_POST['answer'];
  $userid=$_POST['userid'];
  $id=$_POST["id"];
  $sql="insert into `testresult`(`answer`, `userid`, `taskid`) values ('{$answer}','{$userid}','{$id}')";
  $upsql="update `task` set status='未批阅' where id='{$id}'";
  $result=$mysqli->query($sql);
  $upresult=$mysqli->query($upsql);
  echo $mysqli->error;
  echo $result;
  echo $upresult;
?>