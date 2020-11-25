

$(document).ready(function () {
    XMLHttpRequestObjectCuantas = new XMLHttpRequest();
    var data = new FormData();
    mail=$("#mail").val();
    data.append('correo', mail);
    XMLHttpRequestObjectCuantas.open("POST", 'cuantasPreguntas.php', true);
    XMLHttpRequestObjectCuantas.send(data);
    XMLHttpRequestObjectCuantas.onreadystatechange = function () {
        if (XMLHttpRequestObjectCuantas.readyState == 4) {
            var obj = document.getElementById('cuantas');
            obj.innerHTML = XMLHttpRequestObjectCuantas.responseText;
        }
    }



    setInterval(function(){ 
        var data = new FormData();
        mail=$("#mail").val();
        data.append('correo', mail);
        XMLHttpRequestObjectCuantas.open("POST", 'cuantasPreguntas.php', true);
        XMLHttpRequestObjectCuantas.send(data);
        XMLHttpRequestObjectCuantas.onreadystatechange = function () {
            if (XMLHttpRequestObjectCuantas.readyState == 4) {
                var obj = document.getElementById('cuantas');
                obj.innerHTML = XMLHttpRequestObjectCuantas.responseText;
            }
        } }, 10000);
});

