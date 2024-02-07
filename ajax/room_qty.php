<?php

require("../common/db_connect.php");

$output = '';
$query = "SELECT * FROM room WHERE id = '" . $_POST['id'] . "'";
$query_run = mysqli_query($con, $query);

$output .= '<option value="" disabled selected>Select Room</option>';

while ($row = mysqli_fetch_assoc($query_run)) {

 

    $no_of_room = $row["no_of_room"];
    $rate = $row["rate"];
    for ($i = 1; $i <= $no_of_room; $i++) {
        
        $output .= '<option value="' . $i . '" data-rate="'.$row['rate'].'">' . $i . '</option>';
        
    }
    
}

echo $output;


?>