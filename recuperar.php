<?php
sleep(3);
session_start();
$connect = mysqli_connect("localhost","root","","videoaula");

if(isset($_POST["correo_recuperar"])){
  $correo_recuperar = mysqli_real_escape_string($connect, $_POST["correo_recuperar"]);
  $sql = "SELECT email FROM usuarios WHERE (email='$correo_recuperar')";
 $result = mysqli_query($connect, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    echo "1";
  } else {
    echo "error";
  }
}
  ?>