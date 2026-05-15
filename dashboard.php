<?php

session_start();

if(!isset($_SESSION['user'])){

header("Location: login.php");

exit();

}

$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html>

<head>

<title>Patient Dashboard</title>

<link rel="stylesheet"
href="style.css">

</head>

<body>

<!-- NAVBAR -->

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

<a href="profile.php">
Profile
</a>

<a href="logout.php">
Logout
</a>

</div>

</div>

<!-- MAIN DASHBOARD -->

<div class="container-box"
style="max-width:1200px;">

<h1
style="
text-align:center;
margin-bottom:30px;
">

Welcome,
<?php echo $user['name']; ?> 👋

</h1>

<center>

<img
src="uploads/<?php
echo $user['profile_pic'];
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

<!-- CARD 1 -->

<div class="dashboard-card">

<h2>
👨‍⚕️ Doctors
</h2>

<p>

Search and consult
specialist doctors.

</p>

</div>

<!-- CARD 2 -->

<div class="dashboard-card">

<h2>
📅 Appointments
</h2>

<p>

Book and manage
appointments online.

</p>

</div>

<!-- CARD 3 -->

<div class="dashboard-card">

<h2>
📄 Reports
</h2>

<p>

Upload and manage
medical reports securely.

</p>

</div>

<!-- CARD 4 -->

<div class="dashboard-card">

<h2>
👤 Profile
</h2>

<p>

Manage your profile
and account settings.

</p>

</div>

</div>

</div>

<footer class="footer">

© 2026 MedLink Pro

</footer>

</body>

</html>