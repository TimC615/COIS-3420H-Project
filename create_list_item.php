<!DOCTYPE html>
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
            <a href="splash_page.html">
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
                <a href="profile.html">Profile</a>
                <a href="settings.html">Settings</a>
                <button onclick="logOut()">Log Out</button>
            </nav>
            <script src="./js/general.js">
            </script>
        </div>
    </header>
    <form id="createlistitem" action="#" method="post" enctype="multipart/form-data">
        <div>
			<!--Try to have the placeholder be whatever the user's current username is-->
			<label for="updatename">Update task name:</label>
			<input id="updatename" type="text" placeholder="Task name">
		</div>

        <div>
			<label for="updatepic">Update task picture:</label><br />
			<input type="file" name="updatepic" id="updatepic">
		</div>
        <div>
			<label for="updatedesc">Descripton:</label><br />
			<textarea name="updatedesc" rows="8" cols="100" maxlength="600"></textarea>
		</div>
        <fieldset>
			<legend>Task Visibility</legend>
			<div>
				<div>
					<input id="publicacc" type="radio" name="access" value="public" checked="checked">
					<label for="publicacc">Public account</label>
				</div>
				<div>
					<input id="privateacc" type="radio" name="access" value="private">
					<label for="privateacc">Private account</label>
				</div>
			</div>
		</fieldset>
    </form>
</body>

</html>