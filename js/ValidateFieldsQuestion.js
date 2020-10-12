function validar(){
    var correo = document.getElementById("correo").value;
    var enunciado = document.getElementById("enunciado").value;
    var rCorrec = document.getElementById("correcta").value;
    var rInco1 = document.getElementById("inc1").value;
    var rInco2 = document.getElementById("inc2").value;
    var rInco3 = document.getElementById("inc3").value;
    var complejidad = document.getElementById("complej");
    var tema = document.getElementById("tema").value;
    var pos=0;
    var complejidad="";
    for (var i = 0, length = complejidad.length; i < length; i++) {
        if (complejidad[i].checked) {
            pos=i;
            break;
        }
    }
    switch(pos){
        case 0:
            complejidad="baja";
            break;
        case 1:
            complejidad="media";
            break;
        case 2:
            complejidad="alta";
            break;
    }

    if(!correoValido(correo)){
        return false;

    } else if(enunciado.length < 10){
        alert("La pregunta debe tener al menos 10 carácteres");
        return false;

    } else if(rCorrec.length === 0 || rInco1.length === 0 || rInco2.length === 0 || rInco3.length === 0){
        alert("Es obligatorio introducir las cuatro respuestas posibles");
        return false;

    } else if(complejidad != 1 && complejidad != 2 && complejidad != 3) {
        return false;

    } else if(tema.length > 0){
        alert("Introduce un tema");
        return false;
    } 
    return true;
    
}

function correoValido(correo){
    if(correo.length === 0) {
        alert("Es obligatorio introducir una dirección de correo");
        return false;
    }
    var alum = /^[a-z]+[0-9]{3}(@ikasle.ehu.)(eus|es)$/.test(correo);
    var prof = /^[a-z]+([\.-]{1}[a-z]+)?(@ehu.)(eus|es)$/.test(correo);
    if(!alum && !prof) {
        alert("La dirección de correo introducida no es válida");
        return false;
    }
    return true;

}