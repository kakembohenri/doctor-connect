<?php
$conn = new mysqli("localhost", "admin", "admin", "hospital");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT patient_id, appointment_date, appointment_time FROM appointments WHERE appointment_id = 21";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    $patient1 = $row['patient_id'];
$sql1 = "SELECT patient_email FROM patients WHERE patient_id = '$patient1'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$patient2 = $row1['patient_email'];
echo $patient2;
        
    
} else {
    echo "0 results";
}
$conn->close();


 $to = $patient2;
        $subject = "Doctor-connect";
        $txt = "Your appointment has been approved scheduled on ".$row['appointment_date']." at ".$row['appointment_time'];
        $headers = "From: doctorconnectsys05@gmail.com" . "\r\n";

        mail($to,$subject,$txt,$headers);   
        
        echo $txt;

?>