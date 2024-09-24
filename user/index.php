<?php

include "../includes/init.php";

$query="SELECT * FROM `Jobs`";
$Statement=$connection->prepare($query);
$row = $Statement->execute();

$Jobs= $Statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user </title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
<div class="table">
    <h1>Available Jobs</h1>
            <table>
                <thead>
                    <th>Title</th>
                    <th>Salary</th>
                    <th>Location</th>
                    <th>View</th>
                </thead>
                <tbody>
                    <?php foreach ($Jobs as $Job) {?>
                        <tr>
                            <td><?php echo $Job["Title"]?></td>
                            <td><?php echo $Job["Salary"]?></td>
                            <td><?php echo $Job["Location"]?></td>
                            <td><a href="./details.php?Id=<?=$Job['Id']?>">View Details</a></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
    </div>
</body>
</html>