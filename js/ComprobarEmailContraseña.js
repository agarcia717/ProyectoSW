$(document).ready(function (event) {
    $("form input").change(function comprobar() {
        $("#submit").attr("disabled", true);
        $email = $('#dirCorreo');
        $.ajax({
            url: "ClientVerifyEnrollment.php?dirCorreo=" + $email.val(), cache: false,
            success: function (result) {
                if (result == "SI") {
                    $("#mailSW").html("VIP");
                    $("#mailSW").css('color','green');
                    $cont = $("#pass");
                    if ($cont.val().trim().length >= 6) {
                        var $ticket = 1010;
                        $.ajax({
                            url: "VerifyPassWS.php?pass=" + $cont.val() + "&ticket=" + $ticket,
                            cache: false,
                            datatype: "html",
                            success: function (res) {
                                if (res.trim() == "VALIDA") {
                                    $("#passSW").html("Contraseña VÁLIDA");
                                    $("#passSW").css('color','green');
                                    $("#submit").attr("disabled", false);
                                } else {
                                    $("#passSW").html("Contraseña no VÁLIDA");
                                    $("#passSW").css('color','red');
                                }
                            }
                        });
                    }
                } else {
                    $("#mailSW").html("No VIP");
                    $("#mailSW").css('color','red');
                }
            }
        });
    });
});