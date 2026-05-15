<?php

session_start();

include '../db.php';

if(isset($_GET['delete'])){

$id = $_GET['delete'];

$conn->query(

"DELETE FROM doctors
WHERE id=$id"

);

}

$result =
$conn->query(
"SELECT * FROM doctors"
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Doctors</title>

<link rel="stylesheet"
href="../style.css">

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

Manage Doctors 👨‍⚕️

</h1>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Specialization</th>
<th>Experience</th>
<th>Action</th>

</tr>

<?php
while($row=$result->fetch_assoc()){
?>

<tr>

<td>
<?php echo $row['id']; ?>
</td>

<td>
<?php echo $row['doctor_name']; ?>
</td>

<td>
<?php echo $row['specialization']; ?>
</td>

<td>
<?php echo $row['experience']; ?>
</td>

<td>

<a
href="?delete=<?php
echo $row['id'];
?>">

<button
style="
width:auto;
padding:10px 15px;
background:red;
">

Delete

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