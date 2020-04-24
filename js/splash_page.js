window.addEventListener('DOMContentLoaded', (event) => {
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("profilepreview");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }

    var btn = document.getElementById("myBtn");

    btn.addEventListener("click", function(event) {
        event.preventDefault();

        window.location.replace("./list_item.php?task_id=".concat(btn.value));
        return false;
    });

    function open_task(id){

    }
});
