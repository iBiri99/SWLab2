function EnviarPreguntas(mail) {
    var correo = document.getElementById("correo").value;
    var enunciado = document.getElementById("enunciado").value;
    var rCorrec = document.getElementById("correcta").value;
    var rInco1 = document.getElementById("inc1").value;
    var rInco2 = document.getElementById("inc2").value;
    var rInco3 = document.getElementById("inc3").value;
    var complejidad = document.getElementById("complej");
    var tema = document.getElementById("tema").value;
    var pos = 0;
    var complejidad = 0;
    for (var i = 0, length = complejidad.length; i < length; i++) {
        if (complejidad[i].checked) {
            pos = i;
            break;
        }
    }
    complejidad = pos + 1;

    var data = new FormData();
    data.append('correo', mail);
    data.append('mail', mail);
    data.append('enunciado', enunciado);
    data.append('correcta', rCorrec);
    data.append('inc1', rInco1);
    data.append('inc2', rInco2);
    data.append('inc3', rInco3);
    data.append('complej', complejidad);
    data.append('tema', tema);
    data.append('tipo', 'AJAX');

    XMLHttpRequestObject.open("POST", 'AddQuestionAJAX.php', true);
    XMLHttpRequestObject.send(data);
    XMLHttpRequestObject.onreadystatechange = function () {
        if (XMLHttpRequestObject.readyState == 4) {
            var obj = document.getElementById('resultado');
            obj.innerHTML = XMLHttpRequestObject.responseText;
        }
    }
}