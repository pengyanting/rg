<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com","root","pyt931028!","rg");
  $mysqli->query("set names utf8");
  $username=$_POST['username'];
  $content=$_POST['content'];
  $courseid=$_POST["courseid"];
  $time=$_POST['time'];
  $sql="insert into `discus`(`username`, `content`, `courseid`, `time`) values ('{$username}','{$content}','{$courseid}','{$time}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>