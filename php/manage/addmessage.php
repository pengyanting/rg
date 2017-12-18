<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com','root','pyt931028!','rg');
  $mysqli->query("set names utf8");
  $title=$_POST['title'];
  $content=$_POST['content'];
  $type=$_POST["type"];
  $userid=$_POST['userid'];
  $username=$_POST['username'];
  $time=$_POST['time'];
  $sql="insert into `message`(`title`, `content`, `userid`, `username`, `time`, `type`) values ('{$title}','{$content}','{$userid}','{$username}','{$time}','{$type}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>