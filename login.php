<?php

session_start();

include 'db.php';

if(isset($_POST['login'])){

$email = $_POST['email'];

$password = $_POST['password'];

$role = $_POST['role'];

$stmt =
$conn->prepare(

"SELECT * FROM users
WHERE email=? AND role=?"

);

$stmt->bind_param(
"ss",
$email,
$role
);

$stmt->execute();

$result =
$stmt->get_result();

$user =
$result->fetch_assoc();

if($user){

if($user['is_verified']==0){

$error =
"Please verify OTP first";

}else{

if(password_verify(
$password,
$user['password']
)){

if($role=="admin"){

$_SESSION['admin']=$user;

header(
"Location: admin/admin_dashboard.php"
);

}elseif($role=="doctor"){

$_SESSION['doctor']=$user;

header(
"Location: doctor/doctor_dashboard.php"
);

}else{

$_SESSION['user']=$user;

header(
"Location: dashboard.php"
);

}

}else{

$error =
"Wrong Password";

}

}

}else{

$error =
"User not found";

}

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<link rel="stylesheet"
href="style.css">

</head>

<body>

<div class="navbar">

<h2>MedLink Pro</h2>

<div>

<a href="index.php">Home</a>
<a href="register.php">Register</a>

</div>

</div>

<div class="container-box">

<h1
style="
text-align:center;
margin-bottom:30px;
">

Login

</h1>

<?php
if(isset($error)){
?>

<p
style="
text-align:center;
color:#ffb3b3;
margin-bottom:15px;
">

<?php echo $error; ?>

</p>

<?php
}
?>

<form method="POST">

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
required>

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

<button
name="login">

Login

</button>

</form>

<br>

<p
style="
text-align:center;
">

Don't have an account?

<a
href="register.php"
style="color:white;">

Register

</a>

</p>

</div>

</body>

</html>