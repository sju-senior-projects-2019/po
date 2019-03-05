<html>
<head>
<title>Add Patient</title>
</head>
<body>

<?php

if(isset($_POST['submit'])){

   $data_missing = array();

   if(empty($_POST['patientID'])){

       // Adds name to array
       $data_missing[] = 'Patient Id';

   } else {

       // Trim white space from the name and store the name
       $patientID = trim($_POST['patientID']);

   }

   if(empty($_POST['pFirstName'])){

       // Adds name to array
       $data_missing[] = 'First Name';

   } else{

       // Trim white space from the name and store the name
       $pFirstName = trim($_POST['pFirstName']);

   }

   if(empty($_POST['pLastName'])){

       // Adds name to array
       $data_missing[] = 'Last Name';

   } else{

       // Trim white space from the name and store the name
       $pLastName = trim($_POST['pLastName']);

   }

   if(empty($_POST['gender'])){

       // Adds name to array
       $data_missing[] = 'Gender';

   } else {

       // Trim white space from the name and store the name
       $gender = trim($_POST['gender']);

   }

   if(empty($_POST['pType'])){

       // Adds name to array
       $data_missing[] = 'Patient Type';

   } else {

       // Trim white space from the name and store the name
       $pType = trim($_POST['pType']);

   }

   if(empty($data_missing)){

       require_once('../mysqli_connect.php');

       $query = "INSERT INTO Patients (patientID, pFirstName, pLastName, pType, gender, age, drID) VALUES (?, ?, ?, ?, ?, ?, ?)";

       $stmt = mysqli_prepare($dbc, $query);



       mysqli_stmt_bind_param($stmt, "sssssss", $patientID, $pFirstName, $pLastName, $pType, $gender, $age, $drID);

       mysqli_stmt_execute($stmt);

       $affected_rows = mysqli_stmt_affected_rows($stmt);

       if($affected_rows == 1){

           echo 'Patient Entered';

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

<form action="http://localhost/DrAppt/patientAdded.php" method="post">

<b>Add a New Patient</b>

<p>Patient Id:
<input type="text" name="patientID" size="30" value="" />
</p>

<p>First Name:
<input type="text" name="pFirstName" size="30" value="" />
</p>

<p>Last Name:
<input type="text" name="pLastName" size="30" value="" />
</p>

<p>Patient Type (Parent or Child):
<input type="text" name="pType" size="30" value="" />
</p>

<p>Gender (Male or Female):
<input type="text" name="gender" size="30" value="" />
</p>

<p>Age:
<input type="text" name="age" size="30" value="" />
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
