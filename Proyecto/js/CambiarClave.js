function CambiarClave(email, firstPassword, secondPassword) {
    var mensaje = document.getElementById("validacionError");
    var divMessage = document.getElementById("messageEmailDivDos");
    var divMessageLabel = document.getElementById("messageEmailLabelDos");

    if (email == "" || firstPassword == "" || secondPassword == "") {
        mensaje.innerHTML = "Error. Por favor, diligencia todos los campos.";
    }else if(firstPassword != secondPassword){
        mensaje.innerHTML = "Error. Las contraseñas con coinciden.";
    }else{
        var XML_start = new XMLHttpRequest();
        XML_start.onreadystatechange = function() {
            if (this.status == 200 && this.readyState == 4) {
                divMessage.style.display = "block";
                divMessageLabel.innerHTML = this.responseText;
            }
        };
        XML_start.open('GET', '../Vista/usuarios/VerificarEmail.php?email=' + email + '&clave=' + firstPassword, 'true');
        XML_start.send();
    }    
}