<!DOCTYPE html>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Settings</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/settings.css">
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
                <a href="profile.php">Profile</a>
                <a href="settings.php" class="active">Settings</a>
                <button onclick="logOut()">Log Out</button>
            </nav>
            <script src="./js/general.js">
            </script>
        </div>
    </header>

	<form id="editaccount" action="#" method="post" enctype="multipart/form-data">
		<div>
			<!--Try to have the placeholder be whatever the user's current username is-->
			<label for="updateuser">Update Username:</label>
			<input id="updateuser" type="text" placeholder="Username">
		</div>
		<div>
			<label for="updatepass">Update Password:</label>
			<input id="updatepass" type="password" placeholder="Password">
		</div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js">
		var pass_strength={
			0: "Very Bad",
			1: "Bad",
			2: "Weak",
			3: "Average",
			4: "Strong"
		}
		var pass = document.getElementById('pass1');
		var pass_meter = document.getElementById('pass-strength');
		var pass_text = document.getElementById('pass-strength-text');

		pass.addEventListener('input', function()) {
			var input = pass.value;
			var result = zxcvbn(input);
			pass_meter.value = result.score;

			if(input !== ""){
				pass_text.innerHTML = "Password Strength: " + strength[result.score];
			}
			else{
				pass_text.innerHTML = "";
			}
		});

		</script>
		<div>
			<label for="confirmpass">Confirm New Password:</label>
			<input id="confirmpass" type="password" placeholder="Password">
		</div>

		<!--Possibly display current profile image before a change occurs (like Discord)-->
		<!--Possible image preview prior to submission-->
		<!--No limits set on dimensions or byte size yet-->
		<div>
			<label for="updatepic">Update profile picture:</label><br />
			<input type="file" name="updatepic" id="updatepic">
		</div>
		<!--Possibly display current descripton before a change occur-->
		<div>
			<label for="updatedesc">Descripton:</label><br />
			<textarea name="updatedesc" rows="8" cols="100" maxlength="600"></textarea>
		</div>
		<fieldset>
			<legend>Profile Visibility</legend>
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
		<!--implement javascript compatibility for confirmation popup-->
		<div id="commitchanges">
			<button type="submit" id="submit" name="submit" class="centered">Save Changes</button>
			<button id="delete" name="delete" onclick="deleteConfirm()" class="centered">Delete Account</button>
		</div>
		<script src="./js/settings.js">
		</script>
	</form>
</body>

</html>
