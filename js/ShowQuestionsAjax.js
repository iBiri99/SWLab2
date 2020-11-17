$(document).ready(function () {
    XMLHttpRequestObject = new XMLHttpRequest();
    XMLHttpRequestObject.onreadystatechange = function () {
        if (XMLHttpRequestObject.readyState == 4) {
            var obj = document.getElementById('resultado');
            obj.innerHTML = XMLHttpRequestObject.responseText;
        }
    }

    $("#VerPreguntas").click(function () {
        var data = new FormData();
        data.append('correo', mail);
        XMLHttpRequestObject.open("POST", 'ShowXmlQuestionsAJAX.php', true);
        XMLHttpRequestObject.send(data);
    });
});