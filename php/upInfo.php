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
  $id=$_POST['id'];
  $sql="update `users` set username='{$username}',gender='{$gender}',age='{$age}',address='{$address}',phone='{$phone}',school='{$school}',project='{$project}' where id='{$id}'";
  $result=$mysqli->query($sql);
  echo $mysqli->error;
  echo $result;
?>