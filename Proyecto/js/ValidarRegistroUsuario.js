function verificarReg(name, secondName, tipDocu, numDocument, email, firstPassword, secondPassword){ 
    
    var errorMessage = document.getElementById("mensajeError");
    var divMessage = document.getElementById("messageEmailDiv");
    var divMessageLabel = document.getElementById("messageEmailLabel");

    if(name == "" || secondName == "" || tipDocu == "" || numDocument == "" || email == "" || firstPassword == "" || secondPassword == "") {
        errorMessage.innerHTML = "Error. Uno de los campos está vacio. <br> <br>";
    } else if(firstPassword != secondPassword) {
        errorMessage.innerHTML = "Error. Las contraseñas no coinciden. <br> <br>";
    }else{
        var XML_start = new XMLHttpRequest();
        XML_start.onreadystatechange = function() {
            if (this.status == 200 && this.readyState == 4) {
                if (this.responseText == "Usuario registrado correctamente!") {
                    divMessage.style.display = "block";
                    divMessageLabel.innerHTML = this.responseText;
                } else {
                    errorMessage.innerHTML = this.responseText;
                }
            }
        };
        XML_start.open('GET', '../usuarios/Registro.php?name=' + name + '&secondName=' + secondName + '&tipDocu=' + tipDocu + '&numDocument=' + numDocument + '&email=' + email + '&pass=' + firstPassword, 'true');
        XML_start.send();
    }
}