<?php
$servername = "localhost";//declare the variable using $ 
$username = "root";
$password = "";
$database = "hostel";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $database);

$q="delete from stu where name ='Amaandeep'";
if(mysqli_query($conn,$q))
{
    echo "data  deleted";
}
else
{
    echo "error";
}
$conn->close();
?>
