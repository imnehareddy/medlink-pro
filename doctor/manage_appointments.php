<?php

session_start();

include '../db.php';

if(!isset($_SESSION['doctor'])){

header("Location: ../login.php");

exit();

}

$doctor =
$_SESSION['doctor'];

/* UPDATE STATUS */

if(isset($_GET['approve'])){

$id = $_GET['approve'];

$conn->query(

"UPDATE appointments
SET status='Approved'
WHERE id=$id"

);

}

if(isset($_GET['reject'])){

$id = $_GET['reject'];

$conn->query(

"UPDATE appointments
SET status='Rejected'
WHERE id=$id"

);

}

/* FETCH APPOINTMENTS */

$result =
$conn->query(

"SELECT appointments.*,
users.name

FROM appointments

JOIN users
ON appointments.patient_id=users.id"

);

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Appointments</title>

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

Manage Appointments 📅

</h1>

<table>

<tr>

<th>Patient</th>
<th>Date</th>
<th>Status</th>
<th>Action</th>

</tr>

<?php
while($row=$result->fetch_assoc()){
?>

<tr>

<td>
<?php echo $row['name']; ?>
</td>

<td>
<?php echo $row['appointment_date']; ?>
</td>

<td>
<?php echo $row['status']; ?>
</td>

<td>

<a
href="?approve=<?php
echo $row['id'];
?>">

<button
style="
width:auto;
padding:10px 15px;
background:green;
">

Approve

</button>

</a>

<a
href="?reject=<?php
echo $row['id'];
?>">

<button
style="
width:auto;
padding:10px 15px;
background:red;
">

Reject

</button>

</a>
<a
href="add_prescription.php?id=<?php
echo $row['id'];
?>">

<button
style="
width:auto;
padding:10px 15px;
background:#0072ff;
">

Prescription

</button>

</a>

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