<?php
header("Content-type:application/json");
include "../../includes/init.php";

$Applicant_Name=$_POST['Applicant_Name'];
$Email=$_POST['Email'];
$Phone_Number=$_POST['Phone_Number'];
$Resume_Link=$_POST['Resume_Link'];
$Job_Id = $_POST['Job_Id'];

$query="INSERT INTO Applications (`Applicant_Name`,`Email`,`Phone_Number`,`Resume_Link`,`Job_Id`) VALUES(?,?,?,?,?)";
$params=[$Applicant_Name,$Email,$Phone_Number,$Resume_Link,$Job_Id];
$row = execute($query,$params);

if($row>0){
    echo json_encode(['success'=>true, 'Applicant_Name' => $Applicant_Name]);
  }else{
    echo json_encode(['success'=> false]);
  }

?>