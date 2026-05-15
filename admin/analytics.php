<?php

session_start();

include '../db.php';

if(!isset($_SESSION['admin'])){

header("Location: admin_login.php");

exit();

}

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

<style>

.chart-box{

background:white;

padding:30px;

border-radius:25px;

box-shadow:
0 8px 25px rgba(0,0,0,0.15);

margin-top:30px;

}

</style>

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
margin-bottom:20px;
">

Analytics Dashboard 📊

</h1>

<p
style="
text-align:center;
margin-bottom:30px;
font-size:16px;
">

System overview of patients,
doctors, and appointments.

</p>

<!-- CARDS -->

<div class="dashboard-grid">

<div class="dashboard-card">

<h2>
👥 Patients
</h2>

<h1>

<?php echo $patients; ?>

</h1>

</div>

<div class="dashboard-card">

<h2>
👨‍⚕️ Doctors
</h2>

<h1>

<?php echo $doctors; ?>

</h1>

</div>

<div class="dashboard-card">

<h2>
📅 Appointments
</h2>

<h1>

<?php echo $appointments; ?>

</h1>

</div>

</div>

<!-- CHART -->

<div class="chart-box">

<canvas id="myChart"></canvas>

</div>

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

label: 'System Statistics',

data: [

<?php echo $patients; ?>,
<?php echo $doctors; ?>,
<?php echo $appointments; ?>

],

backgroundColor: [

'#4facfe',
'#43e97b',
'#fa709a'

],

borderRadius: 12,

borderWidth: 1

}]

},

options: {

responsive:true,

plugins: {

legend: {

labels: {

color:'#333',
font:{
size:14
}

}

}

},

scales: {

y: {

beginAtZero:true,

ticks:{
color:'#333'
},

grid:{
color:'#ddd'
}

},

x: {

ticks:{
color:'#333'
},

grid:{
display:false
}

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