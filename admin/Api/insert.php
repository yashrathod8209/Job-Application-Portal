<?php
header("Content-type:application/json");
include "../../includes/init.php";

$Title=$_POST['Title'];
$Description=$_POST['Description'];
$Salary=$_POST['Salary'];
$Location=$_POST['Location'];

$query="INSERT INTO Jobs (`Title`,`Description`,`Salary`,`Location`) VALUES(?,?,?,?)";
$params=[$Title,$Description,$Salary,$Location];
$row = execute($query,$params);

if($row>0){
    echo json_encode(['success'=>true, 'Title' => $Title]);
  }else{
    echo json_encode(['success'=> false]);
  }

?>