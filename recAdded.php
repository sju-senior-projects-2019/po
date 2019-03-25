<html>
<head>
<title>Add Receptionist</title>
</head>
<body>

<?php

if(isset($_POST['submit'])){

   $data_missing = array();

   if(empty($_POST['recID'])){

       // Adds name to array
       $data_missing[] = 'Receptionist Id';

   } else {

       // Trim white space from the name and store the name
       $recID = trim($_POST['recID']);

   }

   if(empty($_POST['rFirstName'])){

       // Adds name to array
       $data_missing[] = 'First Name';

   } else{

       // Trim white space from the name and store the name
       $rFirstName = trim($_POST['rFirstName']);

   }

   if(empty($_POST['rLastName'])){

       // Adds name to array
       $data_missing[] = 'Last Name';

   } else{

       // Trim white space from the name and store the name
       $rLastName = trim($_POST['rLastName']);

   }

   if(empty($_POST['gender'])){

       // Adds name to array
       $data_missing[] = 'Gender';

   } else {

       // Trim white space from the name and store the name
       $gender = trim($_POST['gender']);

   }

   if(empty($_POST['drID'])){

       // Adds name to array
       $data_missing[] = 'Doctor ID';

   } else {

       // Trim white space from the name and store the name
       $drID = trim($_POST['drID']);

   }

   if(empty($data_missing)){

       require_once('../mysqli_connect.php');

       $query = "INSERT INTO Receptionist (recID, rFirstName, rLastName, gender, drID) VALUES (?, ?, ?, ?, ?)";

       $stmt = mysqli_prepare($dbc, $query);



       mysqli_stmt_bind_param($stmt, "sssss", $recID, $rFirstName, $rLastName, $gender, $recID);

       mysqli_stmt_execute($stmt);

       $affected_rows = mysqli_stmt_affected_rows($stmt);

       if($affected_rows == 1){

           echo 'Receptionist Entered';

           mysqli_stmt_close($stmt);

           mysqli_close($dbc);

       } else {

           echo 'Error Occurred<br />';
           echo mysqli_error($dbc);

           mysqli_stmt_close($stmt);

           mysqli_close($dbc);

       }

   } else {

       echo 'You need to enter the following data<br />';

       foreach($data_missing as $missing){

           echo "$missing<br />";

       }

   }

}

?>

<form action="http://localhost/recAdded.php" method="post">

<b>Add a New Receptionist</b>

<p>Receptionist Id:
<input type="text" name="recID" size="30" value="" />
</p>

<p>First Name:
<input type="text" name="rFirstName" size="30" value="" />
</p>

<p>Last Name:
<input type="text" name="rLastName" size="30" value="" />
</p>

<p>Gender (Male or Female):
<input type="text" name="gender" size="30" value="" />
</p>

<p>Doctor ID:
<input type="text" name="drID" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</html>

