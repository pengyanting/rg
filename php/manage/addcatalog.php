<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com','root','pyt931028!','rg');//地址，用户名，密码，数据库名称
  $mysqli->query("set names utf8");
  $title=$_POST['title'];
  $content=$_POST['content'];
  $time=$_POST["time"];
  $courseid=$_POST['courseid'];
  $coursetitle=$_POST['coursetitle'];
  $videourl=$_POST['videourl'];
  $sql="insert into `catalog`(`title`, `content`, `courseid`, `coursetitle`, `time`, `videourl`) values ('{$title}','{$content}','{$courseid}','{$coursetitle}','{$time}','{$videourl}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>