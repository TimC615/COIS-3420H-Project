<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
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
            <nav>
                <a href="profile.php" class="active">Profile</a>
                <a href="settings.php">Settings</a>
                <button onclick="logOut()">Log Out</button>
            </nav>
            <script src="./js/general.js">
            </script>
        </div>
    </header>

    <div id="maincontent">
        <div id="profileinfo">
            <img src="./images/default_profile_picture.jpg" width="400" height="250" alt="Bucket List Website Logo">
            <div>
                <p> lectus sit amet est placerat in egestas erat imperdiet sed euismod nisi porta lorem mollis aliquam ut porttitor
                    leo a diam sollicitudin tempor id eu nisl nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit amet risus
                    nullam eget felis eget nunc lobortis mattis aliquam faucibus purus in massa tempor nec feugiat nisl pretium
                    fusce id velit ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare
                    suspendisse sed nisi lacus sed viverra tellus in hac habitasse platea dictumst vestibulum rhoncus est pellentesque
                    elit ullamcorper dignissim cras tincidunt loborti
                </p>
            </div>
        </div>

        <h2>Bucket List Tasks</h2>
        <button onclick="#">Random Task</button>
        <div id="bucketlist">
            <!--show the tasks in a grid pattern instead.
            possibly 2 or 3 wide.
            uses horizontal space more efficiently-->

            <button class="bucketlistedit" href="edit_list_item.php">Edit</button>
            <a href="list_item.php" class="list-group-item active">
                <img class="bucketlistpicture" src="./images/default_task.png" width="80" height="80" alt="Bucket List Task Image">
                <h3 class="bucketlisttitle">Task Name</h3>
            </a>

            <a href="list_item.php" class="list-group-item active">
                <img class="bucketlistpicture" src="./images/default_task.png" width="80" height="80" alt="Bucket List Task Image">
                <h3 class="bucketlisttitle">Task Name</h3>
            </a>

            <a href="list_item.php" class="list-group-item active">
                <img class="bucketlistpicture" src="./images/default_task.png" width="80" height="80" alt="Bucket List Task Image">
                <h3 class="bucketlisttitle">Task Name</h3>
            </a>

            <a href="list_item.php" class="list-group-item active">
                <img class="bucketlistpicture" src="./images/default_task.png" width="80" height="80" alt="Bucket List Task Image">
                <h3 class="bucketlisttitle">Task Name</h3>
            </a>
        </div>
    </div>
</body>

</html>
