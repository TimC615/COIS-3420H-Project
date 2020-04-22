<!DOCTYPE html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Splash Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/splash_page.css">
    <link rel="stylesheet" href="css/general_styles.css">
    <link rel="" </head>

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
            <nav>
                <?php
                if(isset($_SESSION['user'])) {
                ?>
                <a href="profile.php">Profile</a>
                <a href="settings.php">Settings</a>
                <button onclick="logOut()">Log Out</button>
                <?php
                }
                else{
                    ?>
                    <a href="login.php">Log In</a>
                    <a href="signup.php">Sign Up</a>
                    <?php
                }
                ?>
            </nav>
            <script src="./js/general.js">
            </script>
        </div>
    </header>

    <div id="mainbody">
        <p>Welcome to your one stop shop for bucket lists.
            Here you can make your own bucket list and look at everyone else's bucket list for more ideas for yourself!
            Remember, no idea is too crazy to put on your bucket list.
        </p>

        <div id="profileslideshow">
            <button class="profilesleft" onclick="plusDivs(-1)">&#10094;</button>

            <figure class="profilepreview">
                <a href="profile.php">
                    <img src="./images/profile1.jpg" style="width:100">
                    <figcaption> USERNAME 1</figcaption>
                </a>
            </figure>
            <figure class="profilepreview">
                <a href="profile.php">
                    <img src="./images/profile2.jpg" style="width:100">
                    <figcaption> USERNAME 2</figcaption>
                </a>
            </figure>
            <figure class="profilepreview">
                <a href="profile.php">
                    <img src="./images/profile3.jpg" style="width:100">
                    <figcaption> USERNAME 3</figcaption>
                </a>
            </figure>

            <button class="profilesright" onclick="plusDivs(1)">&#10095;</button>
        </div>

        <script src="./js/splash_page.js">
        </script>
    </div>
</body>

</html>
