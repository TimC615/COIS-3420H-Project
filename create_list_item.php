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

<html lang="en">

<head>
    <title>Create Bucket List Item</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/create_list_item.css">
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
    <form id="createlistitem" action="#" method="post" enctype="multipart/form-data">
        <div>
			<!--Try to have the placeholder be whatever the user's current username is-->
			<label for="updatename">Task name:</label>
			<input id="updatename" name='name' type="text" placeholder="Task name">
		</div>

        <div>
			<label for="updatepic">Task picture:</label><br />
			<input type="file" name="file" id="file" onchange="SavePhoto(this)">
		</div>
        <div>
			<label for="updatedesc">Descripton:</label><br />
			<textarea name="desc" rows="8" cols="100" maxlength="600"></textarea>
		</div>
        <fieldset>
			<legend>Task Visibility</legend>
			<div>
				<div>
					<input id="publicacc" type="radio" name="access" value="public">
					<label for="publicacc">Public Task</label>
				</div>
				<div>
					<input id="privateacc" type="radio" name="access" value="private" checked="checked">
					<label for="privateacc">Private Task</label>
				</div>
			</div>
		</fieldset>
        <div id="commitchanges">
			<button type="submit" id="submit" name="submit" class="centered">Create Task</button>
		</div>
    </form>
</body>
</html>

<?php
if(isset($_POST['logout'])){
    unset($_SESSION['user']);
    $index = array_search($user, $_SESSION['online']);
    array_splice($_SESSION['online'], $index, 1);

    $hour = time() - 3600 *24 * 30;
    setcookie(‘username’, “”, $hour);

    $query = "UPDATE pass SET online = 0 WHERE user = '$user'";
    header("Location: ./splash_page.php");
    exit();
}

if(isset($_POST['submit'])){
    if(isset($_POST['name'])){
        $title = $_POST['name'];

        if(isset($_POST['desc'])){
            $desc = $_POST['desc'];
        }
        else{
            $desc = "";
        }

        if(isset($_FILES['file']['name'])){
            $user = $_SESSION['user'];
            $file = $user . "_" . $_FILES['file']['name'];

            $check = $_FILES['file']['size'];
            if($check <= 0){
                echo "File uploaded is not an image";
                $file = $user . "_default_task.png";
                $path = "./images/" . $user .  "_default_task.png";
            }

            // Allow certain file formats
            $file_type = strtolower(pathinfo($file,PATHINFO_EXTENSION));

            if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
                    echo "File inputted is not a JPG, PNG, or JPEG file";
                    $file = $user . "_default_task.png";
            }
        }
        else{
            $file = $user . "_default_task.png";
        }

        if($_POST['access'] == 'public'){
    		$access = 1;
    	}
    	else{
    		$access = 0;
    	}
        $user = $_SESSION['user'];
        $query1 = "SELECT * FROM proj_users WHERE user = '$user'";
        $result = $conn->query($query1);
        var_dump($result);
        $result = $result->fetch_assoc();
        var_dump($result);
        $id = $result['id'];
        echo $id;

        $query2 = "INSERT INTO proj_tasks (id, title, image, description, public, complete) VALUES ('$id', '$title', '$file', '$desc', '$access', 0)";
        //$conn->query($query2);
        if ($conn->query($query2) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error: " . $query2 . "<br>" . $conn->error;
        }

        // Check if file already exists
        if (file_exists('/~timothychaundy/www_data/' . $file)) {
            echo "An image with that name already exists";
        }
        else{
            if(is_uploaded_file($_FILES['file']['tmp_name'])){
                $newname = createFilename('file', '$file');
                checkAndMoveFile('file', 10240, $newname);
            }
            move_uploaded_file($_FILES['file']['tmp_name'], '/~timothychaundy/www_data/' . $_FILES['file']['name']);
        }
        //header("Location: ./profile.php");
        //exit();
    }
    else{
        echo "No task name provided";
    }
}
?>
