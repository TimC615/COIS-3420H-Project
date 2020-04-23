document.addEventListener('DOMContentLoaded', (event) => {
    var pass_strength = {
        0: "Very Bad",
        1: "Bad",
        2: "Weak",
        3: "Average",
        4: "Strong"
    }
    var pass = document.getElementById('pass1');
    var pass_meter = document.getElementById('pass-strength');
    var pass_text = document.getElementById('pass-strength-text');

    pass.addEventListener('input', function() {
        var input = pass.value;
        var result = zxcvbn(input);
        pass_meter.value = result.score;

        if (input !== "") {
            pass_text.innerHTML = "Password Strength: " + strength[result.score];
        } else {
            pass_text.innerHTML = "";
        }
    });
});
