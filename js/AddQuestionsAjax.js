$(document).ready(function(){
    $('#enviar').click(function(){
     var dir = '../php/AddQuestionWithImage.php';
     var frm = $("#fquestion")[0];
     var fd = new FormData(frm);
     var files = $('#file')[0].files[0];
     fd.append('file',files);
        $.ajax({
            type: 'POST',
            enctype: 'multipart/form-data',
            url: dir,
            contentType: false,
            processData: false,
            data: fd,
            dataType: "html",
            success: function(data){
            $('#mensaje').html('<strong>Pregunta insertada correctamente.</strong>');
            $('#preguntas').load('../php/TablaPreguntas.php');
            console.log(data);
        },
        error: function(){
            $('#mensaje').html('<strong>Error al añadir la pregunta.</strong>');
            console.log(data);
        }
        });
    });
});