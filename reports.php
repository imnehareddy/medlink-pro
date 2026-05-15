<?php

session_start();

include 'db.php';

if(!isset($_SESSION['user'])){

header("Location: login.php");

exit();

}

$user =
$_SESSION['user'];

/* UPLOAD REPORT */

if(isset($_POST['upload'])){

$file =
$_FILES['report']['name'];

$tmp =
$_FILES['report']['tmp_name'];

move_uploaded_file(
$tmp,
"reports/".$file
);

$stmt =
$conn->prepare(

"INSERT INTO reports
(user_id,report_file)

VALUES(?,?)"

);

$stmt->bind_param(

"is",

$user['id'],
$file

);

$stmt->execute();

}

/* FETCH REPORTS */

$stmt =
$conn->prepare(

"SELECT * FROM reports
WHERE user_id=?"

);

$stmt->bind_param(
"i",
$user['id']
);

$stmt->execute();

$result =
$stmt->get_result();

?>

<!DOCTYPE html>
<html>

<head>

<title>Medical Reports</title>

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

<!-- MAIN -->

<div class="container-box"
style="max-width:1200px;">

<h1
style="
text-align:center;
margin-bottom:30px;
">

Medical Reports 📄

</h1>

<!-- UPLOAD FORM -->

<form
method="POST"
enctype="multipart/form-data">

<input
type="file"
name="report"
required>

<button
name="upload">

Upload Report

</button>

</form>

<br><br>

<!-- REPORT TABLE -->

<table>

<tr>

<th>ID</th>
<th>Report</th>
<th>Uploaded Date</th>

</tr>

<?php
while($row=$result->fetch_assoc()){
?>

<tr>

<td>
<?php echo $row['id']; ?>
</td>

<td>

<a
href="reports/<?php
echo $row['report_file'];
?>"

target="_blank">

View Report

</a>

</td>

<td>
<?php echo $row['uploaded_at']; ?>
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