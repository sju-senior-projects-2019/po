<html>
<head>
<title>Add Appointment</title>
</head>
<body>

<?php

if(isset($_POST['submit'])){

   $data_missing = array();

   if(empty($_POST['apptDateTime'])){

       // Adds name to array
       $data_missing[] = 'Appointment Date and Time';

   } else {

       // Trim white space from the name and store the name
       $apptDateTime = trim($_POST['apptDateTime']);

   }

   if(empty($_POST['drID'])){

       // Adds name to array
       $data_missing[] = 'Doctor ID';

   } else{

       // Trim white space from the name and store the name
       $drID = trim($_POST['drID']);

   }

   if(empty($_POST['patientID'])){

       // Adds name to array
       $data_missing[] = 'Patient ID';

   } else{

       // Trim white space from the name and store the name
       $patientID = trim($_POST['patientID']);

   }

   if(empty($data_missing)){

       require_once('../mysqli_connect.php');

       $result = $dbc->query("SELECT apptDateTime FROM Appointment WHERE apptDateTime = '".$_POST['apptDateTime']."' AND drID = '".$_POST['drID']."' AND patientID = '".$_POST['patientID']."'");
       if($result->num_rows == 0) {

          $query = "INSERT INTO Appointment (apptDateTime, drID, patientID) VALUES (?, ?, ?)";

          $stmt = mysqli_prepare($dbc, $query);

          mysqli_stmt_bind_param($stmt, "sss", $apptDateTime, $drID, $patientID);

          mysqli_stmt_execute($stmt);

          $affected_rows = mysqli_stmt_affected_rows($stmt);

          if($affected_rows == 1){

              echo 'Appointment Entered';

              mysqli_stmt_close($stmt);

              mysqli_close($dbc);

          } else {

           echo 'Error Occurred<br />';
           echo mysqli_error($dbc);

           mysqli_stmt_close($stmt);

           mysqli_close($dbc);

          }
 
        } 
       else {
          die("Appointment not available.  Please select a new time.");
       }



       

   } else {

       echo 'You need to enter the following data<br />';

       foreach($data_missing as $missing){

           echo "$missing<br />";

       }

   }

}

?>

<form action="http://localhost/apptAdded.php" method="post">

<b>Add a New Appointment</b>

<p>Appointment Date and Time:
<input type="datetime-local" name="apptDateTime" size="30" value="" />
</p>

<p>Doctor ID:
<input type="text" name="drID" size="30" value="" />
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
