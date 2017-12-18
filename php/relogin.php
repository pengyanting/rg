<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli("rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com","root","pyt931028!","rg");
  $mysqli->query("set names utf8");
  $username=$_POST['username'];
  $gender=$_POST['gender'];
  $age=$_POST["age"];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
  $school=$_POST['school'];
  $project=$_POST['project'];
  $password=$_POST['password'];
  $sql="insert into `users`(`username`, `password`, `gender`, `address`, `age`, `phone`, `project`, `school`) values ('{$username}','{$password}','{$gender}','{$address}','{$age}','{$phone}','{$project}','{$school}')";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>