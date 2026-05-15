<?php

include 'db.php';

$email = $_GET['email'];

if(isset($_POST['verify'])){

$entered_otp = $_POST['otp'];

$stmt =
$conn->prepare(

"SELECT * FROM users
WHERE email=?"

);

$stmt->bind_param(
"s",
$email
);

$stmt->execute();

$result =
$stmt->get_result();

$user =
$result->fetch_assoc();

if($entered_otp == $user['otp']){

$update =
$conn->prepare(

"UPDATE users
SET is_verified=1
WHERE email=?"

);

$update->bind_param(
"s",
$email
);

$update->execute();

header("Location: login.php");

}else{

$error = "Invalid OTP";

}

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Verify OTP</title>

<link rel="stylesheet"
href="style.css">

</head>

<body>

<div class="navbar">

<h2>MedLink Pro</h2>

<div>

<a href="index.php">Home</a>

</div>

</div>

<div class="container-box">

<h1
style="
text-align:center;
margin-bottom:30px;
">

OTP Verification

</h1>

<?php
if(isset($error)){
?>

<p
style="
color:#ffb3b3;
text-align:center;
margin-bottom:15px;
">

<?php echo $error; ?>

</p>

<?php
}
?>

<form method="POST">

<input
type="text"
name="otp"
placeholder="Enter OTP"
required>

<button
name="verify">

Verify OTP

</button>

</form>

<br>

<p
style="
text-align:center;
font-size:14px;
">

Check OTP in database
(users table).

</p>

</div>

</body>

</html>