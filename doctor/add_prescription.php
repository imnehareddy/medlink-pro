<?php

session_start();

include '../db.php';

$id = $_GET['id'];

if(isset($_POST['save'])){

$prescription =
$_POST['prescription'];

$stmt =
$conn->prepare(

"UPDATE appointments
SET prescription=?
WHERE id=?"

);

$stmt->bind_param(

"si",

$prescription,
$id

);

$stmt->execute();

header(
"Location: manage_appointments.php"
);

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Add Prescription</title>

<link rel="stylesheet"
href="../style.css">

</head>

<body>

<div class="container-box">

<h1
style="
text-align:center;
margin-bottom:30px;
">

Add Prescription 📝

</h1>

<form method="POST">

<textarea
name="prescription"
placeholder="Write prescription..."
required>
</textarea>

<button
name="save">

Save Prescription

</button>

</form>

</div>

</body>

</html>