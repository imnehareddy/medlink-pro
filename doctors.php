<?php

session_start();

include 'db.php';

$search = "";

$sql =
"SELECT * FROM doctors WHERE 1";

if(isset($_GET['search'])
&& $_GET['search']!=""){

$search = $_GET['search'];

$sql .=
" AND specialization
LIKE '%$search%'";

}

$result =
$conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Doctors</title>

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

Find Doctors 👨‍⚕️

</h1>

<!-- SEARCH -->

<input
type="text"
id="search"
placeholder="Search Specialization">

<div
id="results"
class="dashboard-grid">

</div>

<br>

<!-- DOCTOR GRID -->

<div class="dashboard-grid">

<?php
while($row=$result->fetch_assoc()){
?>

<div class="dashboard-card">

<img
src="uploads/<?php
echo $row['image'];
?>"

style="
width:120px;
height:120px;
border-radius:50%;
object-fit:cover;
margin-bottom:20px;
">

<h2>

<?php
echo $row['doctor_name'];
?>

</h2>

<p>

<strong>Specialization:</strong>

<?php
echo $row['specialization'];
?>

</p>

<br>

<p>

<strong>Experience:</strong>

<?php
echo $row['experience'];
?>

</p>

<br>

<p>

<strong>Availability:</strong>

<?php
echo $row['availability'];
?>

</p>

<br>

<a
href="book_appointment.php?id=<?php
echo $row['id'];
?>">

<button>

Book Appointment

</button>

</a>

</div>

<?php
}
?>

</div>

</div>

<footer class="footer">

© 2026 MedLink Pro

</footer>

<script>

document
.getElementById('search')

.addEventListener(

'keyup',

function(){

let search =
this.value;

let xhr =
new XMLHttpRequest();

xhr.open(
"GET",
"search_doctors.php?search="+search,
true
);

xhr.onload = function(){

document
.getElementById('results')

.innerHTML =
this.responseText;

}

xhr.send();

}

);

</script>

</body>

</html>

</body>

</html>