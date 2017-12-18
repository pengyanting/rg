<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com','root','pyt931028!','rg');
  $mysqli->query("set names utf8");
  $title=$_POST['title'];
  $type=$_POST["type"];
  $descript=$_POST['descript'];
  $courseid=$_POST['courseid'];
  $time=$_POST['time'];
  $coursetitle=$_POST['coursetitle'];
  $sql="insert into `tasklist`(`title`, `type`,`descript`, `courseid`, `time`, `coursetitle`) values ('{$title}','{$type}','{$descript}','{$courseid}','{$time}','{$coursetitle}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>