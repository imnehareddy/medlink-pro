<?php

session_start();

include '../db.php';

if(!isset($_SESSION['admin'])){

header("Location: admin_login.php");

exit();

}

/* COUNTS */

$users =
$conn->query(
"SELECT * FROM users
WHERE role='patient'"
)->num_rows;

$doctors =
$conn->query(
"SELECT * FROM doctors"
)->num_rows;

$appointments =
$conn->query(
"SELECT * FROM appointments"
)->num_rows;

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet"
href="../style.css">

</head>

<body>

<!-- NAVBAR -->

<div class="navbar">

<h2>Admin Panel</h2>

<div>

<a href="admin_dashboard.php">
Dashboard
</a>

<a href="manage_doctors.php">
Doctors
</a>

<a href="manage_patients.php">
Patients
</a>

<a href="analytics.php">
Analytics
</a>

<a href="../logout.php">
Logout
</a>

</div>

</div>

<!-- MAIN -->

<div class="container-box"
style="max-width:1200px;">

<h1
style="
text-align:center;
margin-bottom:30px;
">

Admin Dashboard 📊

</h1>

<div class="dashboard-grid">

<!-- USERS -->

<div class="dashboard-card">

<h2>
👥 Patients
</h2>

<h1>

<?php
echo $users;
?>

</h1>

</div>

<!-- DOCTORS -->

<div class="dashboard-card">

<h2>
👨‍⚕️ Doctors
</h2>

<h1>

<?php
echo $doctors;
?>

</h1>

</div>

<!-- APPOINTMENTS -->

<div class="dashboard-card">

<h2>
📅 Appointments
</h2>

<h1>

<?php
echo $appointments;
?>

</h1>

</div>

</div>

</div>

<footer class="footer">

© 2026 MedLink Pro

</footer>

</body>

</html>