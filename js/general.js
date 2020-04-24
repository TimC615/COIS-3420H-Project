window.addEventListener('DOMContentLoaded', (event) => {
    /*
    document.getElementById('logout').addEventListener("click", function() {
        for (i = 0; i < localStorage.length; i++) {
            x = localStorage.key(i);
            //document.getElementById("demo").innerHTML += x + "<br>";
            console.log(x);
            console.log(" space ");
        }
        console.log("End of local variables");

        location.replace("./login.php");
    });
    */

    /*
        var modal = document.getElementById("modal1");
        var open = document.getElementsByClassName("open");
        var close = document.getElementsByClassName("open");

        open.onclick = function(){
            modal.style.display = "block";
        }

        close.onclick = function(){
            modal.style.display = "none";
        }

        window.onclick = function(event){
            if(event.target == modal){
                modal.style.display = "none";
            }
        }
        */

    document.getElementById('random').addEventListener("click", function() {
        /*
        var mysql = require('mysql');

        var conn = mysql.createConnection({
            host: "localhost",
            user: "timothychaundy",
            password: "bartAms4",
            database: "timothychaundy"
        });

        conn.connect(function(err) {
            if (err) throw err;
            conn.query("SELECT id FROM proj_users WHERE online=1 ORDER BY rand() LIMIT 1", function(err, result, fields) {
                if (err) throw err;
                console.log(result);
            });
        });
        */
        window.location.replace("../list_item.php");
        return false;
    });

    function random(){
        window.location.replace("../list_item.php");
        return false;
    }
});
