function popupFalseCode() {
    let code = "1234";

    let nombre1 = document.getElementById("nombre1").value;
    let nombre2 = document.getElementById("nombre2").value;
    let nombre3 = document.getElementById("nombre3").value;
    let nombre4 = document.getElementById("nombre4").value;

    let nombreFinal = nombre1 + nombre2 + nombre3 + nombre4;

    if (nombreFinal !== code) {
        alert("Le code rentré est erroné, essayez encore ! :)");
    } else {
        window.location.href = "https://www.npmjs.com/package/jquery-pincode-autotab";
    }
}