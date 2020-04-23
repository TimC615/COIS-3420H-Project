<?php
session_start();

$servername = "localhost";
$username = "timothychaundy";
$password = "MickeyMouse";
$dbname = "timothychaundy";
$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/general_styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
    <script src="./js/pass_strength.js"></script>
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

    <form id="signup" action="#" method="post">
        <div id="username">
            <div>
                <img src="./images/default_profile_picture.jpg" width="50" height="50" alt="Default Profile Picture">
            </div>
            <div id="userinput">
                <h2>Username</h2>
                <input id="user" name='user' type="text" placeholder="Username">
            </div>
        </div>
        <div id="passconfirm">
            <div>
                <img src="./images/magnifying_glass.png" width="50" height="50" alt="Password Picture">
            </div>
            <div id="passwords">
                <h2>Password</h2>
                <input id="pass1" name='pass1' type="password" placeholder="Password">
                <div>
                    <meter max='4' id='pass-strength'></meter>
                    <p id='pass-strength-text'> </p>
                </div>
                <h2>Confirm Password</h2>
                <input id="pass2" name='pass2' type="password" placeholder="Password">
            </div>
        </div>
        <div>
            <button type="submit" id="submit" name="submit" class="centered">Submit</button>
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['user'])) {
        if (isset($_POST['pass1']) && isset($_POST['pass2'])) {
            if ($_POST['pass1'] !== $_POST['pass2']) {
                echo "Passwords do not match";
            } else {
                $user = $_POST['user'];
                $query = "SELECT id FROM proj_users WHERE user = '$user";
                $result = $conn->query($query);
                if ($result != 0) {
                    echo "Someone already has that username";
                } else {
                    $_SESSION['user'] = $_POST['user'];

                    $hash = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
                    $query = "INSERT INTO proj_users (user, pass, public) VALUES ('$user', '$hash', 0)";
                    $conn->query($query);

                    header("Location: ./splash_page.php");
                }
            }
        } else {
            echo "You must enter a value for both password fields";
        }
    } else {
        echo "No username entered";
    }
}
?>
