<?php

session_start();

include '../db.php';

if(isset($_POST['login'])){

$email = $_POST['email'];

$password = $_POST['password'];

$stmt =
$conn->prepare(

"SELECT * FROM users
WHERE email=? AND role='admin'"

);

$stmt->bind_param(
"s",
$email
);

$stmt->execute();

$result =
$stmt->get_result();

$admin =
$result->fetch_assoc();

if($admin){

if(password_verify(
$password,
$admin['password']
)){

$_SESSION['admin']=$admin;

header(
"Location: admin_dashboard.php"
);

}else{

$error =
"Wrong Password";

}

}else{

$error =
"Admin not found";

}

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet"
href="../style.css">

</head>

<body>

<div class="navbar">

<h2>MedLink Pro</h2>

</div>

<div class="container-box">

<h1
style="
text-align:center;
margin-bottom:30px;
">

Admin Login 🔐

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
placeholder="Admin Email"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button
name="login">

Login

</button>

</form>

</div>

</body>

</html>