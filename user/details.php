<?php

require "../includes/init.php";

$Id=$_GET['Id'];

$query="SELECT * FROM `Jobs` WHERE `Id`= (?)";
$params=[$Id];
$Statement=$connection->prepare($query);
$row = $Statement->execute($params);
$Jobs= $Statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="./style/details.css">
</head>
<body>
<div class="container">
    <?php   foreach ($Jobs as $Job){ ?>
     <h1><?php echo $Job['Title'] ?></h1>
     <p> Description: <?php echo $Job['Description'] ?></p>
     <p>Salary: <?php echo $Job['Salary'] ?></p>
     <p>Location: <?php echo $Job['Location'] ?></p>
     <?php } ?>
        <div class="add">
            <form>
                <h3>Apply Now</h3>
                <input type="hidden" name="Job_Id" id="Job_Id" value="<?php echo $Id ?>" required>

                <label for="Name">Name</label>
                <input type="text" name="Applicant_Name" id="Applicant_Name" required>

                <label for="Email">Email</label>
                <input type="text" name="Email" id="Email" required>

                <label for="Phone_Number">Phone</label>
                <input type="number" name="Phone_Number" id="Phone_Number" required >
                
                <label for="Resume_Link">Resume Link</label>
                <input type="text" name="Resume_Link" id="Resume_Link" required >

                <input type="button" value="Add" id="Submit" onclick="insertdata()">
            </form>
        </div>
        <h4 id="success"></h4>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    function insertdata(){
              let data ={
                Applicant_Name: $('#Applicant_Name').val(),
                Email: $('#Email').val(),
                Phone_Number: $('#Phone_Number').val(),
                Resume_Link: $('#Resume_Link').val(),
                Job_Id: $('#Job_Id').val(),
              }
              $.ajax({
                 url:"./Api/insert.php",
                 type: "POST",
                 data: data,
                 success: function(response) {
                  $('#Applicant_Name').val('');
                  $('#Email').val('');
                  $('#Phone_Number').val('');
                  $('#Resume_Link').val('');
                  $('#Applicant_Name').focus();
                  $('#success').text('Successfully applied for job')
                 },
                 error: function(e){
                    console.log(e);
                 }
              });
           }
</script>
</body>
</html>
