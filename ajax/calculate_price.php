<?php include("../common/db_connect.php"); ?>

<?php
if (isset($_POST['quantity'])) {
  $quantity = $_POST['quantity'];
  $rate = $_POST['rate'];

  $price = $quantity * $rate;

  echo "$price /-";

  echo"<input type='hidden' name='total_room_price' value='$price' readonly>";
}
?>
