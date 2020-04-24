/*
var usercheck;
var userid;

function deleteConfirm() {
    confirm("Are you sure you want to delete your account?")

    var check = confirm("Are you sure you want to delete your account?");
    if(check){
        usercheck = input;
        userid = id;
        //alert("deletion confirmed");
        //window.location.href="settings.php?check=true";
    }
}

var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "timothychaundy",
  password: "bartAms4",
  database: "timothychaundy"
});
*/

/*
con.connect(function(err) {
  if (err) throw err;

  sql = "DELETE FROM proj_tasks WHERE id = userid";
  con.query(sql, function (err, result) {
   if (err) throw err;
   console.log("Number of records deleted: " + result.affectedRows);
  });

  sql = "DELETE FROM proj_users WHERE user = usercheck";
  con.query(sql, function (err, result) {
   if (err) throw err;
   console.log("Number of records deleted: " + result.affectedRows);
  });
});
*/

function doConfirm(id) {
    console.log(id);
    var ok = confirm("Are you sure to Delete?");
    if (ok) {
        console.log("Confirmation success");
        //window.location.href="./settings.php?check=true";
        xhttp.open("GET", "./settings.php?check=true", true);
        xhttp.send();
        /*
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                window.location = "remove.php";
            }
        }

        xmlhttp.open("GET", "remove.php?id=" + id);
        // file name where delete code is written
        xmlhttp.send();
        */
    }
}
