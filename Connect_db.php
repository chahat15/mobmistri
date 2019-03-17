<?php

$conn = mysqli_connect("localhost", "root","","Phone_repair");

if(!$conn)
{
    die("Connection failed: ".mysqli_connect_error());
    echo "Not established";
}
?>