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
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/general_styles.css">
    <script src="./js/general.js"></script>
</head>

<body>
    <header>
        <div>
            <a href="splash_page.php">
                <img src="./images/bucket_logo.png" width="150" height="150" alt="Bucket List Website Logo">
            </a>
        </div>
        <div>
            <h1><?php echo $_SESSION['user'] ?></h1>
        </div>
        <div id="navsearch">
            <form id="searchprofiles" action="#" method="post">
                <button id="random">Go to a Random Task</button>
            </form>
            <nav>
                <a href="profile.php" class="active">Profile</a>
                <a href="settings.php">Settings</a>
                <form method="post">
                    <button type='submit' name='logout' id='logout'>Log Out</button>
                <form>
            </nav>
        </div>
    </header>

    <?php
    $user = $_SESSION['user'];
    $query = "SELECT * FROM proj_users WHERE user = '$user'";
    $result = $conn->query($query);
    $result = $result->fetch_assoc();
    ?>

    <div id="maincontent">
        <div id="profileinfo">
            <h2>POSSIBLY REMOVE PICTURE</h2>
            <img src="./images/default_profile_picture.jpg" width="400" height="250" alt="Bucket List Website Logo">
            <div>
                <p><?php echo $result['description'] ?></p>
            </div>
        </div>

        <h2>Bucket List Tasks</h2>
        <a href="create_list_item.php">Create Task</a>
        <div id="bucketlist">
            <?php
            $sql = "SELECT * FROM proj_users WHERE user='$user'";
            $result = $conn->query($sql) or die($conn->error);
            $result = $result->fetch_assoc();
            $id = $result['id'];

            $sql = "SELECT * FROM proj_tasks WHERE id='$id'";
            $result = $conn->query($sql) or die($conn->error);

            while ($row = $result->fetch_assoc())
            {
            ?>
                <button class="bucketlistedit" href="edit_list_item.php?task_id=<?php echo $row['task_id'] ?>">Edit</button>
                <a href="list_item.php?task_id=<?php echo $row['task_id'] ?>" class="list-group-item active">
                    <img class="bucketlistpicture" src="<?php echo $row['image'] ?>" width="80" height="80" alt="Task Image">
                    <h3 class="bucketlisttitle"><?php echo $row['title'] ?></h3>
                </a>
            <?php
            }
            ?>
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
