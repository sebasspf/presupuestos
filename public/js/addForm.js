$(document).ready(function(){

    $("input[name='email']").focusout(function(){

        var url = "/api/getcliente/" + $(this).val();

        $.getJSON(url, function(data) {
            if(data.resultado == 'exito')
            { 
                $("div[name='ntfExito']").removeClass('hidden');
                $("div[name='ntfNuevo']").addClass('hidden');
                $("input[name='nombre']").val(data.cliente.nombre);
                $("input[name='nombre']").attr('disabled','true');
                $("input[name='cliente_id']").val(data.cliente.id);
            }else {
                $("div[name='ntfNuevo']").removeClass('hidden');
                $("div[name='ntfExito']").addClass('hidden');
                $("input[name='nombre']").val('');
                $("input[name='nombre']").removeAttr('disabled');
                $("input[name='cliente_id']").val(0);
            }

            $("textarea[name='comentario']").removeAttr('disabled');
            $("button[name='enviar']").removeAttr('disabled');
        });
    });

})