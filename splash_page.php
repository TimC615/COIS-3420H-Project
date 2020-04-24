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
    <title>Splash Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/splash_page.css">
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
            <?php
            if(isset($_SESSION['user'])) {
            ?>
            <h1><?php echo $_SESSION['user']?></h1>
            <?php
            }
            else{
                ?>
                <h1>Welcome!</h1>
                <?php
            }
            ?>
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
                <form method="post">
                    <button type submit name = logout id='logout'>Log Out</button>
                <form>
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
        </div>
    </header>

    <div id="mainbody">
        <p>Welcome to your one stop shop for bucket lists.
            Here you can make your own bucket list and look at everyone else's bucket list for more ideas for yourself!
            Remember, no idea is too crazy to put on your bucket list.
        </p>

        <div id="profileslideshow">
            <button class="profilesleft" onclick="plusDivs(-1)">&#10094;</button>
            <?php
            $sql1 = "SELECT * FROM proj_users WHERE public != 0, online != 0 ORDER BY rand() LIMIT 3";
            $result1 = $conn->query($sql1);

            while ($row1 = $result1->fetch_assoc())
            {
                $query2 = "SELECT * FROM proj_tasks WHERE id = row1['id'] ORDER BY rand() LIMIT 1";
                $result2 = $conn->query($sql2);
                $count = 1;
                while ($row2 = $result2->fetch_assoc())
                {
                ?>
                <figure class="profilepreview">
                    <div id='profile'+count>
                        <?php
                        if($row2['image'] == null){
                        ?>
                            <img src="./images/profile1.jpg" style="width:100">
                        <?php
                        }
                        else{
                            //use the user provided image here!!!!!!!
                        ?>
                            <img src="./images/profile1.jpg" style="width:100">
                        <?php
                        }
                        ?>
                        <figcaption><?php echo $row['user'] ?></figcaption>

                        <div id='modal'+count class='modal'>
                            <div class='modal_data'>
                                <span class="close">&times;</span>
                                <h3><?php echo row2['title'] ?></h3>
                                <?php
                                if($row2['image'] == null){
                                ?>
                                    <img src="./images/profile1.jpg" style="width:100">
                                <?php
                                }
                                else{
                                    //use the user provided image here!!!!!!!
                                ?>
                                    <img src="./images/profile1.jpg" style="width:100">
                                <?php
                                }
                                ?>
                                <p><?php echo row2['description'] ?></p>
                            </div>
                        </div>
                    </div>
                </figure>
            <?php
            $count = $count + 1;
                }
            }
            ?>

            <button class="profilesright" onclick="plusDivs(1)">&#10095;</button>
        </div>

        <script src="./js/splash_page.js">
        </script>
    </div>

    <?php
    var_dump($_SESSION['online']);
    ?>
</body>
</html>

<?php
if(isset($_POST['logout'])){
    unset($_SESSION['user']);
    $index = array_search($user, $_SESSION['online']);
    array_splice($_SESSION['online'], $index, 1);

    $query = "UPDATE pass SET online = 0 WHERE user = '$user'";
    header("Location: ./splash_page.php");
    exit();
}
?>
