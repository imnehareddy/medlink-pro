<?php

$conn = new mysqli(

"localhost",
"root",
"",
"medlink_pro_db"

);

if($conn->connect_error){

die("Connection Failed");

}

?>