<html>
<head>
<title>Add Doctor</title>
</head>
<body>

<?php

if(isset($_POST['submit'])){

   $data_missing = array();

   if(empty($_POST['drID'])){

       // Adds name to array
       $data_missing[] = 'Doctor Id';

   } else {

       // Trim white space from the name and store the name
       $drID = trim($_POST['drID']);

   }

   if(empty($_POST['drFirstName'])){

       // Adds name to array
       $data_missing[] = 'First Name';

   } else{

       // Trim white space from the name and store the name
       $drFirstName = trim($_POST['drFirstName']);

   }

   if(empty($_POST['drLastName'])){

       // Adds name to array
       $data_missing[] = 'Last Name';

   } else{

       // Trim white space from the name and store the name
       $drLastName = trim($_POST['drLastName']);

   }

   if(empty($_POST['gender'])){

       // Adds name to array
       $data_missing[] = 'Gender';

   } else {

       // Trim white space from the name and store the name
       $gender = trim($_POST['gender']);

   }

   if(empty($_POST['patientID'])){

       // Adds name to array
       $data_missing[] = 'Patient ID';

   } else {

       // Trim white space from the name and store the name
       $patientID = trim($_POST['patientID']);

   }

   if(empty($data_missing)){

       require_once('../mysqli_connect.php');

       $query = "INSERT INTO Doctor (drID, drFirstName, drLastName, gender, patientID) VALUES (?, ?, ?, ?, ?)";

       $stmt = mysqli_prepare($dbc, $query);



       mysqli_stmt_bind_param($stmt, "sssss", $drID, $drFirstName, $drLastName, $gender, $patientID);

       mysqli_stmt_execute($stmt);

       $affected_rows = mysqli_stmt_affected_rows($stmt);

       if($affected_rows == 1){

           echo 'Doctor Entered';

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

<form action="http://localhost/DrAppt/doctorAdded.php" method="post">

<b>Add a New Doctor</b>

<p>Doctor Id:
<input type="text" name="drID" size="30" value="" />
</p>

<p>First Name:
<input type="text" name="drFirstName" size="30" value="" />
</p>

<p>Last Name:
<input type="text" name="drLastName" size="30" value="" />
</p>

<p>Gender (Male or Female):
<input type="text" name="gender" size="30" value="" />
</p>

<p>Patient ID:
<input type="text" name="patientID" size="30" value="" />
</p>

<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</html>
