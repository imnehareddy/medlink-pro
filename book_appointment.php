<?php

session_start();

include 'db.php';

if(!isset($_SESSION['user'])){

header("Location: login.php");

exit();

}

$user =
$_SESSION['user'];

$doctor_id =
$_GET['id'];

if(isset($_POST['book'])){

$date =
$_POST['appointment_date'];

$stmt =
$conn->prepare(

"INSERT INTO appointments
(patient_id,doctor_id,appointment_date)

VALUES(?,?,?)"

);

$stmt->bind_param(

"iis",

$user['id'],
$doctor_id,
$date

);

$stmt->execute();

header(
"Location: appointments.php"
);

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Book Appointment</title>

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

<a href="logout.php">
Logout
</a>

</div>

</div>

<div class="container-box">

<h1
style="
text-align:center;
margin-bottom:30px;
">

Book Appointment 📅

</h1>

<form method="POST">

<input
type="date"
name="appointment_date"
required>

<button
name="book">

Confirm Booking

</button>

</form>

</div>

<footer class="footer">

© 2026 MedLink Pro

</footer>

</body>

</html>