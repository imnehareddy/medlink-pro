<?php

session_start();

include '../db.php';

if(!isset($_SESSION['admin'])){

header("Location: admin_login.php");

exit();

}

/* DELETE PATIENT */

if(isset($_GET['delete'])){

$id = $_GET['delete'];

$conn->query(

"DELETE FROM users
WHERE id=$id"

);

}

/* FETCH PATIENTS */

$result =
$conn->query(

"SELECT * FROM users
WHERE role='patient'"

);

?>

<!DOCTYPE html>
<html>

<head>

<title>Manage Patients</title>

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

Manage Patients 👥

</h1>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
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
<?php echo $row['name']; ?>
</td>

<td>
<?php echo $row['email']; ?>
</td>

<td>
<?php echo $row['role']; ?>
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