<?php
sleep(3);
session_start();
$connect = mysqli_connect("localhost","root","","videoaula");

if(isset($_POST["email"]) && isset($_POST["password"])){
  $email = mysqli_real_escape_string($connect, $_POST["email"]);
  $password = mysqli_real_escape_string($connect,  md5($_POST["password"]));
  $sql = "SELECT email,id FROM usuarios WHERE (email='$email' OR nome='$email') AND password='$password'";
  $result = mysqli_query($connect, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $_SESSION["email"] = $data["email"];
	$_SESSION["id_user"] = $data["id"];
    echo "1";
  } else {
    echo "error";
  }
} else if(isset($_POST["emaill"]) && isset($_POST["passworddd"])){
  $email = mysqli_real_escape_string($connect, $_POST["emaill"]);
  $password = mysqli_real_escape_string($connect,  md5($_POST["passworddd"]));
  $sql = "SELECT email,id FROM usuarios WHERE (email='$email' OR nome='$email') AND password='$password'";
  $result = mysqli_query($connect, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $_SESSION["email"] = $data["email"];
	$_SESSION["id_user"] = $data["id"];
    echo "1";
  } else {
    echo "error";
  }
}

?>
