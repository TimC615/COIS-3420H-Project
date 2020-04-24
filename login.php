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
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
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
            <h1>Welcome!</h1>
        </div>
        <div id="navsearch">
            <form id="searchprofiles" action="#" method="post">
                <input id="searchbar" type="text" placeholder="Search Profiles...">
            </form>
            <script src="./js/general.js">
            </script>
        </div>
    </header>

    <form id="login" action="#" method="post">
        <div>
            <img src="./images/default_profile_picture.jpg" width="50" height="50" alt="Default Profile Picture">
            <input id="user" type="text" name='user' placeholder="Username">
        </div>
        <div>
            <img src="./images/magnifying_glass.png" width="50" height="50" alt="Password Picture">
            <input id="pass" type="password" name='pass' placeholder="Password">
        </div>
        <div>
            <input type="checkbox" id="passremember" name="passremember" value="remember">
            <label for="passremember"> Remember password</label>
        </div>
        <div>
            <button type="button" id="passreset" name="passreset" onclick="">Reset password</button>
        </div>
        <div>
            <button type="submit" id="submit" name="submit" class="centered">Log In</button>
        </div>
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    if(isset($_POST['user'])){
        if(isset($_POST['pass'])){
            $user = $_POST['user'];

    		$query = "SELECT pass FROM proj_users WHERE user = '$user'";
    		$result = $conn->query($query);

    		if (mysqli_num_rows($result) != 0) {
                echo "username found ";
    			//username found
                $result = $result->fetch_assoc();

                if(password_verify($_POST['pass'], $result['pass'])){
                    //passwords match
                    $_SESSION['user'] = $user;
                    array_push($_SESSION['online'], $user);
                    $query = "UPDATE pass SET online = 1 WHERE user = '$user'";
            		$conn->query($query);
                    header("Location: ./splash_page.php");
                    exit();
                }
                else{
                    echo "passwords do not match";
                }
    		}
        }
        else{
            echo "No password entered";
            //do stuff if no password is entered
        }
    }
    else{
        echo "No username entered";
    }
}
?>
