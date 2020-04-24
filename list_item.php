<!DOCTYPE html>
<?php
session_start();

$servername = "localhost";
$username = "timothychaundy";
$password = "MickeyMouse";
$dbname = "timothychaundy";
$conn = new mysqli($servername, $username, $password, $dbname);

if($_SESSION['online'] == null){
    $_SESSION['online'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bucket List Item</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list_item.css">
    <link rel="stylesheet" href="css/general_styles.css">
</head>

<body>
    <header>
        <div>
            <a href="splash_page.php">
                <img src="./images/bucket_logo.png" width="150" height="150" alt="Bucket List Website Logo">
            </a>
        </div>
        <div>
            <?php
            if(isset($_SESSION['user'])){
            ?>
            <h1><?php echo $_SESSION['user'] ?></h1>
            <?php
            }
            else{
            ?>
            <h1>Welcome!</h1>
            <?php
            }?>
        </div>
        <div id="navsearch">
            <form id="searchprofiles" action="#" method="post">
                <button id="random">Go to a Random Task</button>
            </form>
            <nav>
                <a href="profile.php">Profile</a>
                <a href="settings.php">Settings</a>
                <form method="post">
                    <button type='submit' name='logout' id='logout'>Log Out</button>
                <form>
            </nav>
            <script src="./js/general.js">
            </script>
        </div>
    </header>

    <div id="maincontent">
        <?php
        if(isset($_GET['task_id'])){
            $task_id = $_GET['task_id'];
        }
        else {
            $sql = "SELECT id FROM proj_users WHERE online=1";
            $result = $conn->query($sql) or die($conn->error);
            $result = $result->fetch_assoc();
            $id = $result['id'];

            $sql = "SELECT task_id FROM proj_tasks WHERE id=$id AND public='1'";
            $result = $conn->query($sql) or die($conn->error);
            $result = $result->fetch_assoc();
            $task_id = $result['task_id'];
        }

        $sql = "SELECT * FROM proj_tasks WHERE task_id='$task_id'";
        $result = $conn->query($sql) or die($conn->error);
        $result = $result->fetch_assoc();

        if($result['complete'] == 1){
        ?>
            <h2>This task was completed on <?php $result['completion_date'] ?></h2>
        <?php
        }
        ?>
        <div id="tasknameandpic">
            <img src="<?php echo $result['image'] ?>" width="200" height="200" alt="Task Image">
            <h2><?php echo $result['title'] ?></h2>
        </div>

        <div id="taskdescription">
            <p><?php echo $result['description'] ?></p>
        </div>
    </div>
</body>

</html>
<?php
if(isset($_POST['logout'])){
    $user=$_SESSION['user'];
    $index = array_search($user, $_SESSION['online']);
    array_splice($_SESSION['online'], $index, 1);

    unset($_SESSION['user']);
    $hour = time() - 3600 *24 * 30;
    setcookie("username", “”, $hour);

    $query = "UPDATE pass SET online = 0 WHERE user = '$user'";
    header("Location: ./splash_page.php");
    exit();
}
?>
