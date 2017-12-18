<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com","root","pyt931028!","rg");
  $mysqli->query("set names utf8");
  $id=$_POST['id'];
  $deltype=$_POST['deltype'];
  $sql="delete from `{$deltype}` where id='{$id}'";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>