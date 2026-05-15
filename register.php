<?php

include 'db.php';

if(isset($_POST['register'])){

$name = $_POST['name'];

$email = $_POST['email'];

$password =
password_hash(
$_POST['password'],
PASSWORD_DEFAULT
);

$role = $_POST['role'];

$specialization = "";

if($role=="doctor"){

$specialization =
$_POST['specialization'];

}

$otp = rand(100000,999999);

$image = $_FILES['image']['name'];

$tmp = $_FILES['image']['tmp_name'];

move_uploaded_file(
$tmp,
"uploads/".$image
);

$stmt =
$conn->prepare(

"INSERT INTO users
(name,email,password,role,specialization,profile_pic,otp)

VALUES(?,?,?,?,?,?,?)"

);

$stmt->bind_param(

"sssssss",

$name,
$email,
$password,
$role,
$specialization,
$image,
$otp

);

if($stmt->execute()){

header(
"Location: verify_otp.php?email=$email"
);

}

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Register</title>

<link rel="stylesheet"
href="style.css">

</head>

<body>

<div class="navbar">

<h2>MedLink Pro</h2>

<div>

<a href="index.php">Home</a>
<a href="login.php">Login</a>

</div>

</div>

<div class="container-box">

<h1
style="
text-align:center;
margin-bottom:30px;
">

Register

</h1>

<form
method="POST"
enctype="multipart/form-data">

<input
type="text"
name="name"
placeholder="Enter Full Name"
required>

<input
type="email"
name="email"
placeholder="Enter Email"
required>

<input
type="password"
name="password"
placeholder="Enter Password"
required>

<select
name="role"
id="role"
required
onchange="showSpecialization()">

<option value="">
Select Role
</option>

<option value="patient">
Patient
</option>

<option value="doctor">
Doctor
</option>

<option value="admin">
Admin
</option>

</select>

<div id="specialization-box"
style="display:none;">

<input
type="text"
name="specialization"
placeholder="Doctor Specialization">

</div>

<input
type="file"
name="image"
required>

<button
name="register">

Register

</button>

</form>

<br>

<p
style="text-align:center;">

Already have an account?

<a
href="login.php"
style="color:#fff;">

Login

</a>

</p>

</div>

<script>

function showSpecialization(){

let role =
document.getElementById('role').value;

let box =
document.getElementById('specialization-box');

if(role=="doctor"){

box.style.display="block";

}else{

box.style.display="none";

}

}

</script>

</body>

</html>