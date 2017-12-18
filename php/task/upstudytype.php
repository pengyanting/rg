<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com","root","pyt931028!","rg");
  $mysqli->query("set names utf8");
  $title=$_POST['title'];
  $num=$_POST['num'];
  $descript=$_POST['descript'];
  $status=$_POST['status'];
  $type=$_POST['type'];
  $time=$_POST['time'];
  $courseid=$_POST['courseid'];
  $coursetitle=$_POST['coursetitle'];
  $username=$_POST['username'];
  $userid=$_POST['userid'];
  $taskid=$_POST['taskid'];
  $sql="insert into `task`(`title`, `num`, `descript`, `status`, `type`, `time`, `courseid`, `coursetitle`,`username`,`userid`,`taskid`) values ('{$title}','{$num}','{$descript}','{$status}','{$type}','{$time}','{$courseid}','{$coursetitle}','{$username}','{$userid}','{$taskid}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>