<!DOCTYPE html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
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
            <h1>USERNAME</h1>
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
                <input id="user" type="text" placeholder="Username">
            </div>
        </div>
        <div id="passconfirm">
            <div>
                <img src="./images/magnifying_glass.png" width="50" height="50" alt="Password Picture">
            </div>
            <div id="passwords">
                <h2>Password</h2>
                <input id="pass1" type="password" placeholder="Password">
                <h2>Confirm Password</h2>
                <input id="pass2" type="password" placeholder="Password">
            </div>
        </div>
        <div>
            <button type="submit" id="submit" name="submit" class="centered">Submit</button>
        </div>
    </form>

</body>

</html>
