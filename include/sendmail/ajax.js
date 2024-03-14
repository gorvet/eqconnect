var timer;

(function($) {
    $(document).ready(function() {
        $("#qcsendmail").on("submit", function(event) {
            // Previene el comportamiento predeterminado del formulario
            event.preventDefault();

            $.ajax({
                type: 'post',
                url: $(this).attr("action"),
                data: $(this).serialize(),
                success: function(respuesta) {
                    if (respuesta === "ok") {
                        $("#alerta").removeClass("hide").removeClass("meh").addClass("show ok").html("Su mensaje se ha enviado correctamente.");
                        $("#subscriber_name, #subscriber_email, #subscriber_message").val("");
                        timer = setTimeout(iready, 10000);
                    } else {
                        $("#alerta").removeClass("hide").removeClass("ok").addClass("show meh").html("Ops, ha ocurrido un error al enviar su mensaje. Por favor intente más tarde.");
                        timer = setTimeout(iready, 10000);
                        
                    }
                },
                error: function() {
                    $("#alerta").removeClass("hide").removeClass("ok").addClass("show meh").html("Ops, ha ocurrido un error al enviar su mensaje. Por favor intente más tarde.");
                    timer = setTimeout(iready, 10000);
                },
            });

            return false;
        });
    });

    function iready() {
        $("#alerta").removeClass("show").addClass("hide");
    }
})(jQuery);
