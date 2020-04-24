<?php
session_start();

$servername = "localhost";
$username = "timothychaundy";
$password = "MickeyMouse";
$dbname = "timothychaundy";
$conn = new mysqli($servername, $username, $password, $dbname);

$user = $_SESSION['user'];

$query = "SELECT id FROM proj_users WHERE user = '$user'";
$result = $conn->query($query);
$result = $result->fetch_assoc();
$id = $result['id'];

$query = "DELETE FROM proj_tasks WHERE id='$id'";
$conn->query($query);

$query = "DELETE FROM proj_users WHERE user='$user'";
$conn->query($query);

unset($_SESSION['user']);
$index = array_search($user, $_SESSION['online']);
array_splice($_SESSION['online'], $index, 1);

header("Location: ./splash_page.php");
exit();
?>
