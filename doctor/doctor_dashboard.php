<?php

session_start();

if(!isset($_SESSION['doctor'])){

header("Location: ../login.php");

exit();

}

$doctor =
$_SESSION['doctor'];

?>

<!DOCTYPE html>
<html>

<head>

<title>Doctor Dashboard</title>

<link rel="stylesheet"
href="../style.css">

</head>

<body>

<div class="navbar">

<h2>Doctor Panel</h2>

<div>

<a href="doctor_dashboard.php">
Dashboard
</a>

<a href="manage_appointments.php">
Appointments
</a>

<a href="../logout.php">
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

Welcome Dr.
<?php echo $doctor['name']; ?> 👨‍⚕️

</h1>

<center>

<img
src="../uploads/<?php
echo $doctor['profile_pic'];
?>"

style="
width:150px;
height:150px;
border-radius:50%;
object-fit:cover;
border:5px solid white;
margin-bottom:30px;
">

</center>

<div class="dashboard-grid">

<div class="dashboard-card">

<h2>
📅 Appointments
</h2>

<p>

Manage patient
appointments.

</p>

</div>

<div class="dashboard-card">

<h2>
📝 Prescriptions
</h2>

<p>

Add prescriptions
for patients.

</p>

</div>

<div class="dashboard-card">

<h2>
👤 Profile
</h2>

<p>

Manage doctor profile.

</p>

</div>

</div>

</div>

<footer class="footer">

© 2026 MedLink Pro

</footer>

</body>

</html>