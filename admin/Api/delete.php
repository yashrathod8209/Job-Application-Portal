<?php
include "../../includes/init.php";
$Id=$_GET['Id'];

$query="DELETE FROM Jobs WHERE `Id`=(?)";
$params=[$Id];
$statement=$connection->prepare($query);
$row=$statement->execute($params);

if($row>0)
    return header('location:../index.php');
else
    echo "Failed To Delete ";

?>