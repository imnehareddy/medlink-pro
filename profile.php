<?php

session_start();

include 'db.php';

if(!isset($_SESSION['user'])){

header("Location: login.php");

exit();

}

$user = $_SESSION['user'];

?>

<!DOCTYPE html>
<html>

<head>

<title>Profile</title>

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

<!-- PROFILE SECTION -->

<div class="container-box"
style="max-width:1000px;">

<h1
style="
text-align:center;
margin-bottom:30px;
">

My Profile 👤

</h1>

<center>

<img
src="uploads/<?php
echo $user['profile_pic'];
?>"

class="profile-image">

</center>

<div class="dashboard-grid">

<!-- NAME -->

<div class="dashboard-card">

<h2>
Full Name
</h2>

<p>

<?php
echo $user['name'];
?>

</p>

</div>

<!-- EMAIL -->

<div class="dashboard-card">

<h2>
Email
</h2>

<p>

<?php
echo $user['email'];
?>

</p>

</div>

<!-- ROLE -->

<div class="dashboard-card">

<h2>
Role
</h2>

<p>

<?php
echo ucfirst($user['role']);
?>

</p>

</div>

<!-- CREATED DATE -->

<div class="dashboard-card">

<h2>
Account Created
</h2>

<p>

<?php
echo $user['created_at'];
?>

</p>

</div>

</div>

</div>

<footer class="footer">

© 2026 MedLink Pro

</footer>

</body>

</html>