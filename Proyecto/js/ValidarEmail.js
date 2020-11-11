function verificarEmail(email) {
    var mensaje = document.getElementById("mensajeCorreo");
    var divMessage = document.getElementById("messageEmailDiv");
    var divMessageLabel = document.getElementById("messageEmailLabel");

    if (email == "") {
        mensaje.innerHTML = "Error. Por favor, diligencia su correo electronico.";
    } else {
        var XML_start = new XMLHttpRequest();
        XML_start.onreadystatechange = function() {
            if (this.status == 200 && this.readyState == 4) {
                divMessage.style.display = "block";
                divMessageLabel.innerHTML = this.responseText;
            }
        };
        XML_start.open('GET', '../usuarios/RecuperarClave.php?email=' + email, 'true');
        XML_start.send();
    }
}