<?php session_start();
$name = $_SESSION['sess_user'];
$id = $_SESSION['user_id'];
if(empty($name)){
  echo "<script> location.href='../landing/index.php'</script>";
}
?>