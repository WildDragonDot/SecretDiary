function validateForm() {
    var x = document.forms["dataform"]["email"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}