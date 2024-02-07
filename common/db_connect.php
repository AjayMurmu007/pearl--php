<?php

$server_name ="localhost";
$username = "root";
$password = "";
$databse_name ="white_pearl";
// $databse_name ="instamining";

$con= mysqli_connect($server_name,$username,$password,$databse_name);
if(mysqli_connect_errno())
{
    echo
    "<script>
    alert('Cannot connect database');
    </script>";
    exit();
}
// else
// {

//     echo"<script>
//     alert('Connection Sucessful');
    
//     </script>";
    
   
// }

?>