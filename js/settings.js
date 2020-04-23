function deleteConfirm() {
    var check = confirm("Are you sure you want to delete your account?");
    if(check == true){
        window.location.href="settings.php?check=true";
    }
}
