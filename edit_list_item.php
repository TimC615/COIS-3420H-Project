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
    <title>Edit Bucket List Item</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit_list_item.css">
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
            <h1><?php echo $_SESSION['user'] ?></h1>
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

    <form id="editlistitem" action="#" method="post" enctype="multipart/form-data">
        <?php
        $user = $_SESSION['user'];
        $task_id=$_GET['task_id'];
        $sql = "SELECT * FROM proj_tasks WHERE task_id=$task_id";
        $result = $conn->query($sql) or die($conn->error);
        $result = $result->fetch_assoc();
        ?>
        <div>
			<!--Try to have the placeholder be whatever the user's current username is-->
			<label for="updatename">Update task name:</label>
			<input id="updatename" type="text" name='name' placeholder="<?php $result['title'] ?>">
		</div>

        <div>
			<label for="updatepic">Update task picture:</label><br />
			<input type="file" name="updatepic" id="updatepic">
		</div>
        <div>
			<label for="updatedesc">Descripton:</label><br />
			<textarea name="updatedesc" rows="8" cols="100" maxlength="600" placeholder="<?php $result['description'] ?>"></textarea>
		</div>
        <fieldset>
			<legend>Task Visibility</legend>
			<div>
				<div>
					<input id="publicacc" type="radio" name="access" value="public" checked="checked">
					<label for="publicacc">Public Task</label>
				</div>
				<div>
					<input id="privateacc" type="radio" name="access" value="private">
					<label for="privateacc">Private Task</label>
				</div>
			</div>
		</fieldset>
        <div>
            <input type="checkbox" id="taskcompletion" name="taskfinish" value="finished">
            <label for="taskcompletion"> Task Completed</label>
        </div>
        <div>
            <!--include a calendar dropdown (with js library)-->
            <?php
            if($result['complete'] == 1){
            ?>
                <input type="date" id="completiondate" name='completiondate' value='<?php $result['completion_date'] ?>'>
            <?php
            }
            else{
            ?>
            <input type="date" id="completiondate" name='completiondate'>
            <?php
            }
            ?>
        </div>

        <div id="commitchanges">
            <button type="submit" id="submit" name="submit" class="centered">Save Changes</button>
            <button id="delete" name="delete" onclick="deleteConfirm()" class="centered">Delete Task</button>
        </div>
    </form>
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

if(isset($_POST['name'])){
    if($_POST['name'] != $result['title']){
        $newname = $_POST['name'];
        $sql = "UPDATE proj_tasks SET title='$newname' WHERE task_id='$task_id'" ;
        $conn->query($sql) or die($conn->error);
    }
}

if(isset($_POST['updatepic'])){
    if("./images/" . $_POST['updatepic'] != $result['updatepic']){
        $newpic = $_POST['updatepic'];
        $sql = "UPDATE proj_tasks SET image='$newpic' WHERE task_id='$task_id'" ;
        $conn->query($sql) or die($conn->error);
    }
}

if(isset($_POST['updatedesc'])){
    if($_POST['updatedesc'] != $result['description']){
        $newdesc = $_POST['updatedesc'];
        $sql = "UPDATE proj_tasks SET description='$newdesc' WHERE task_id='$task_id'" ;
        $conn->query($sql) or die($conn->error);
    }
}

if(isset($_POST['access'])){
    if($_POST['access'] == 'public'){
        $access = 1;
    }
    else{
        $access = 0;
    }

    if($access != $result['public']){
        $sql = "UPDATE proj_tasks SET public='$access' WHERE task_id='$task_id'" ;
        $conn->query($sql) or die($conn->error);
    }
}

if(isset($_POST['taskfinish'])){
    $sql = "UPDATE proj_tasks SET complete='1' WHERE task_id='$task_id'" ;
    $conn->query($sql) or die($conn->error);

    if($_POST['completiondate'] != $result['completion_date']){
        $newdate = $_POST['completion_date'];
        $sql = "UPDATE proj_tasks SET completion_date='$newdate' WHERE task_id='$task_id'" ;
        $conn->query($sql) or die($conn->error);
    }
}
?>
