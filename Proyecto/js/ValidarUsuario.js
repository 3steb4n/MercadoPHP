function verificarLog(userName, userPassword) {
    var mensaje = document.getElementById("mensaje");

    if (userName == "" || userPassword == "") {
        mensaje.innerHTML = "Error. Uno de los campos está vacio. <br> <br>";
    } else {
        var XML_start = new XMLHttpRequest();
        XML_start.onreadystatechange = function () {
            if(this.status == 200 && this.readyState == 4) {
                mensaje.innerHTML = this.responseText;
                if (mensaje.innerHTML == "Error. El usuario no existe o está incorrecto.") {
                } else {
                    location.href = '../index.php';
                }
            }
        };
        XML_start.open('GET', '../Vista/usuarios/ValidarUsuarios.php?usuario='+userName+'&pass='+userPassword, 'true');
        XML_start.send();
    }
}
