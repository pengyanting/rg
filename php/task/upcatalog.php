<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com","root","pyt931028!","rg");
  $mysqli->query("set names utf8");
  $username=$_POST['username'];
  $userid=$_POST['userid'];
  $id=$_POST['id'];
  $sql="update `catalog` set username='{$username}',userid='{$userid}' where id='{$id}'";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>