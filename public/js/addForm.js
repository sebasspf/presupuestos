$(document).ready(function(){

    $("a[name='veriflink']").click(function(event){
        event.preventDefault();
        var url = "/api/getcliente/" + $("input[name='email']").val();

        $.getJSON(url, function(data) {
            if(data.resultado == 'exito')
            { 
                $("div[name='ntfExito']").removeClass('hidden');
                $("div[name='ntfNuevo']").addClass('hidden');
                $("input[name='nombre']").val(data.cliente.nombre);
            }else {
                $("div[name='ntfNuevo']").removeClass('hidden');
                $("div[name='ntfExito']").addClass('hidden');
                $("input[name='nombre']").val('');
            }
        });

    });
})