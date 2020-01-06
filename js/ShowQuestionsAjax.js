XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function(){
    if(XMLHttpRequestObject.readyState==4){
        var obj = document.getElementById('preguntas');
        obj.innerHTML = XMLHttpRequestObject.responseText;
        }
}
function mostrarPreguntasXML(){
        XMLHttpRequestObject.open("GET",'../php/TablaPreguntas.php');
        XMLHttpRequestObject.send(null);
}