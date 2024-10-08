<?php
include "../includes/init.php";
$Id=$_GET['Id'];

$query="SELECT * FROM Applications WHERE `Job_Id` = (?)";
$params = [$Id];
$statement = $connection->prepare($query);
$row = $statement->execute($params);
$Applications = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
    <link rel="stylesheet" href="./style/application.css">
</head>
<body>
<h1>Applications</h1>
<div class="Applications">
    <?php foreach ($Applications as $Application) { ?>
      <div class="Application">
        <p>Name: <?php echo $Application['Applicant_Name'] ?></p>
        <p>Email: <?php echo $Application['Email'] ?></p>
        <p>Phone: <?php echo $Application['Phone_Number'] ?></p>
        <p>Resume:<?php echo $Application['Resume_Link'] ?></p>
      </div>
    <?php } ?>
  </div>
</body>
</html>