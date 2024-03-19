var timer;

(function($) {
    $(document).ready(function() {
        $("#eqcn_sendmail").on("submit", function(event) {
            // Previene el comportamiento predeterminado del formulario
            event.preventDefault();

            $.ajax({
                type: 'post',
                url: eqcn_object.url,
                data: {
                    action:eqcn_object.hook,
                    nonce:eqcn_object.nonce,
                    name:$('#subscriber_name').val(),
                    email:$('#subscriber_email').val(),
                    msg:$('#subscriber_message').val(),
                },
                success: function(res) {
                    console.log(res)
                    if (res.status == "1") {
                        $("#alerta").removeClass("hide").removeClass("meh").addClass("show ok").html(res.msg);
                        $("#eqcn_sendmail")[0].reset();
                        timer = setTimeout(iready, 10000);
                    } else {
                        $("#alerta").removeClass("hide").removeClass("ok").addClass("show meh").html(res.msg);
                        $("#eqcn_sendmail")[0].reset();
                        timer = setTimeout(iready, 10000);
                        
                    }
                },
                error: function() {
                    $("#alerta").removeClass("hide").removeClass("ok").addClass("show meh").html("Ops, ha ocurrido un error al enviar su mensaje. Por favor intente más tarde.");
                    timer = setTimeout(iready, 10000);
                },
            });

         });
    });

    function iready() {
        $("#alerta").removeClass("show").addClass("hide");
    }
})(jQuery);
