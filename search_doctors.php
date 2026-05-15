<?php

include 'db.php';

$search =
$_GET['search'];

$result =
$conn->query(

"SELECT * FROM doctors

WHERE specialization
LIKE '%$search%'"

);

while($row=$result->fetch_assoc()){
?>

<div class="dashboard-card">

<h2>

<?php
echo $row['doctor_name'];
?>

</h2>

<p>

<?php
echo $row['specialization'];
?>

</p>

</div>

<?php
}
?>