<?php

session_start();

include '../db.php';

/* COUNTS */

$patients =
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

<title>Analytics Dashboard</title>

<link rel="stylesheet"
href="../style.css">

<script
src="https://cdn.jsdelivr.net/npm/chart.js">
</script>

</head>

<body>

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

<div class="container-box"
style="max-width:1200px;">

<h1
style="
text-align:center;
margin-bottom:30px;
">

Analytics Dashboard 📊

</h1>

<canvas id="myChart"></canvas>

</div>

<script>

const ctx =
document.getElementById('myChart');

new Chart(ctx, {

type: 'bar',

data: {

labels: [
'Patients',
'Doctors',
'Appointments'
],

datasets: [{

label: 'System Analytics',

data: [

<?php echo $patients; ?>,
<?php echo $doctors; ?>,
<?php echo $appointments; ?>

],

borderWidth: 1

}]

},

options: {

scales: {

y: {

beginAtZero: true

}

}

}

});

</script>

<footer class="footer">

© 2026 MedLink Pro

</footer>

</body>

</html>