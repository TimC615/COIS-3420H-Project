var usercheck;
var userid;

function deleteConfirm(var input, var id) {
    if(confirm("Are you sure you want to delete your account?")){
        usercheck = input;
        userid = id;
        alert("deletion confirmed");
        window.location.href="settings.php?check=true";
    }
}

var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "timothychaundy",
  password: "bartAms4",
  database: "timothychaundy"
});

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
