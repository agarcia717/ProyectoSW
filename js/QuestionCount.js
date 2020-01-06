$(document).ready(function bucle(event) {

    myQ = 0;
    totalQ = 0;
    var mail = $("#dirCorreo").val();

    $.ajax({
        type: 'GET',
        url: '../xml/Questions.xml',
        cache: false,
        dataType: 'xml',
        success: function (xml) {
            setTimeout(function () { bucle(event); }, 10000);
            var node = 'assessmentItem',
                myQuestions = $(xml).find(node).each(function () {
                    var email = $(this).attr('author');
                    if (email == mail) {
                        myQ++;
                    }
                }),
                totalQ = $(xml).find(node).length;
                $("#questionCount").html("Tus preguntas: "+myQ + " / " +"Preguntas totales: "+ totalQ)
        },
        error: function (r) {
            console.error(r);
        }
    });

});