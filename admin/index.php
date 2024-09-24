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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listing</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <div class="container">
        <h1>Add Job</h1>
        <div class="add">
            <form action="">
                <label for="Title">Tittle:</label>
                <input type="text" name="Title" id="Title" required>

                <label for="Description">Description:</label>
                <input type="text"name="Description" id="Description" required>

                <label for="Salary">Salary:</label>
                <input type="number" name="Salary" id="Salary" required>

                <label for="Location">Location:</label>
                <input type="text" name="Location" id="Location" required>

                <input type="submit" value="Add" id="Submit" onclick="insertdata()">
            </form>
        </div>
    </div>
    <div class="table">
        <h3>List Of Jobs</h3>
            <table>
                <thead>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Salary</th>
                    <th>Location</th>
                    <th>Delete</th>
                    <th>Applications</th>
                </thead>
                <tbody>
                    <?php foreach ($Jobs as $Job) {?>
                        <tr>
                            <td><?php echo $Job["Title"]?></td>
                            <td><?php echo $Job["Description"]?></td>
                            <td><?php echo $Job["Salary"]?></td>
                            <td><?php echo $Job["Location"]?></td>
                            <td><a href="./Api/delete.php?Id=<?=$Job['Id']?>">Delete</a></td>
                            <td><a href="./application.php?Id=<?=$Job['Id']?>">View</a></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        function insertdata(){
                  let data ={
                     Title: $('#Title').val(),
                     Description: $('#Description').val(),
                     Salary: $('#Salary').val(),
                     Location: $('#Location').val(),
                  }
                  $.ajax({
                     url:"./Api/insert.php",
                     type: "POST",
                     data: data,
                     success: function(response) {
                      $('#Title').val('');
                      $('#Title').focus();
                    //   alert("added!");
                     },
                     error: function(e){
                        alert("error!");
                        console.log(e);

                     }
                  });
               }
    </script>
    
</body>
</html>