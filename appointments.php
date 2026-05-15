<?php

session_start();

include 'db.php';

$user =
$_SESSION['user'];

$stmt =
$conn->prepare(

"SELECT appointments.*,
doctors.doctor_name,
doctors.specialization

FROM appointments

JOIN doctors
ON appointments.doctor_id=doctors.id

WHERE appointments.patient_id=?"

);

$stmt->bind_param(
"i",
$user['id']
);

$stmt->execute();

$result =
$stmt->get_result();

?>

<!DOCTYPE html>
<html>

<head>

<title>Appointments</title>

<link rel="stylesheet"
href="style.css">

</head>

<body>

<div class="navbar">

<h2>MedLink Pro</h2>

<div>

<a href="dashboard.php">
Dashboard
</a>

<a href="doctors.php">
Doctors
</a>

<a href="appointments.php">
Appointments
</a>

<a href="reports.php">
Reports
</a>

<a href="logout.php">
Logout
</a>

</div>

</div>

<div class="container-box"
style="max-width:1200px;">

<h1
style="
text-align:center;
margin-bottom:30px;
">

My Appointments 📅

</h1>

<table>

<tr>

<th>Doctor</th>
<th>Specialization</th>
<th>Date</th>
<th>Status</th>

</tr>

<?php
while($row=$result->fetch_assoc()){
?>

<tr>

<td>
<?php echo $row['doctor_name']; ?>
</td>

<td>
<?php echo $row['specialization']; ?>
</td>

<td>
<?php echo $row['appointment_date']; ?>
</td>

<td>
<?php echo $row['status']; ?>
</td>

</tr>

<?php
}
?>

</table>

</div>

<footer class="footer">

© 2026 MedLink Pro

</footer>

</body>

</html>