<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com','root','pyt931028!','rg');
  $mysqli->query("set names utf8");
  $id=$_POST['id'];
  $status=$_POST['status'];
  $title=$_POST['title'];
  $content=$_POST['content'];
  $type=$_POST["type"];
  $userid=$_POST['userid'];
  $username=$_POST['username'];
  $time=$_POST['time'];
  $sql="update `task` set status='{$status}' where id='{$id}'";
  $sel="insert into `message`(`title`, `content`, `userid`, `username`, `time`, `type`) values ('{$title}','{$content}','{$userid}','{$username}','{$time}','{$type}')";
  $result=$mysqli->query($sql);
  $mysqli->query($sel);
  echo $mysqli->error;
  echo $result;
?>