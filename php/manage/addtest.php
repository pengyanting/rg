<?php
  header('Access-Control-Allow-Origin:*'); 
  $mysqli=new mysqli('rm-uf67944189w34o6pnqo.mysql.rds.aliyuncs.com','root','pyt931028!','rg');
  $mysqli->query("set names utf8");
  $title=$_POST['title'];
  $answer=$_POST["answer"];
  $sel1=$_POST['sel1'];
  $sel2=$_POST['sel2'];
  $sel3=$_POST['sel3'];
  $sel4=$_POST['sel4'];
  $taskid=$_POST['taskid'];
  $time=$_POST['time'];
  $tasktitle=$_POST['tasktitle'];
  $type=$_POST['type'];
  $num=$_POST['num'];
  $sql="insert into `test`(`title`, `answer`, `sel1`, `sel2`, `sel3`, `sel4`, `time`,`taskid`,`tasktitle`,`type`) values ('{$title}','{$answer}','{$sel1}','{$sel2}','{$sel3}','{$sel4}','{$time}','{$taskid}','{$tasktitle}','{$type}')";
  $sql1="update `task` set num='{$num}' where taskid='{$taskid}'";
  $sql2="update `tasklist` set num='{$num}' where id='{$taskid}'";
  $result=$mysqli->query($sql);
  $mysqli->query($sql1);
  $mysqli->query($sql2);
  echo $mysqli->error;
  echo $result;
?>