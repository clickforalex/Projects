function isConfirm(){
    var isValid = true;

    if (!confirm("Confirm checkout?"))
        isValid = false;

    return isValid;
}