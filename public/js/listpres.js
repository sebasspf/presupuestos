$(document).ready(function(){

    $("a[type='button']").click(function(event){
        event.preventDefault();
        id = $(this).attr('id').slice(11);
        dir = '/admin/presupuestos/' +id;
        token = $("input[name='_token']").attr('value');
        if (confirm('¿Realmente desea borrar el presupuesto?')){
            $.ajax({
                method: 'POST',
                url: '/admin/presupuestos/' +id,
                data: {
                    'id': id,
                    '_method': 'DELETE',
                    '_token': token
                },
                success: function() {
                    location.reload();
                }
            });
        }
    });

});