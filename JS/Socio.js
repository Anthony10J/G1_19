var UrlSocios = 'http://localhost:90/G1_19/controller/socio_negocio.php?op=GetSocios';
var UrlPostSocio ='http://localhost:90/G1_19/controller/socio_negocio.php?op=InsertSocio';
$(document).ready(function(){
    CargarSocios();
});

function CargarSocios(){
    $.ajax({
        url: UrlSocios,
        type: 'GET',
        datatype: 'JSON',
        success: function(reponse){
            var MiItems = reponse;
            var Valores = '';

            for ( i=0; i < MiItems.length; i++){
                Valores += '<tr>'+
                '<td>'+ MiItems[i].ID+'</td>'+
                '<td>'+ MiItems[i].NOMBRE+'</td>'+
                '<td>'+ MiItems[i].RAZON_SOCIAL+'</td>'+
                '<td>'+ MiItems[i].DIRECCION+'</td>'+
                '<td>'+ MiItems[i].TIPO_SOCIO+'</td>'+
                '<td>'+ MiItems[i].CONTACTO+'</td>'+
                '<td>'+ MiItems[i].EMAIL+'</td>'+
                '<td>'+ MiItems[i].FECHA_CREADO+'</td>'+
                '<td>'+ MiItems[i].ESTADO+'</td>'+
                '<td>'+ MiItems[i].TELEFONO+'</td>'+
            '</tr>';
            $('.Sociosnegocio').html(Valores);
            }
        }
    });
}
function AgregarSocio(){
    var datossocio={
        NOMBRE:$('#NOMBRE').val(),
        RAZON_SOCIAL:$('#RAZON_SOCIAL').val(),
        DIRECCION:$('#DIRECCION').val(),
        TIPO_SOCIO:$('#TIPO_SOCIO').val(),
        CONTACTO:$('#CONTACTO').val(),
        EMAIL:$('#EMAIL').val(),
        FECHA_CREADO:$('#FECHA_CREADO').val(),
        ESTADO:$('#ESTADO').val(),
        TELEFONO:$('#TELEFONO').val()
    };
    var datossociojson = JSON.stringify(datossocio);
    $.ajax({
        url: UrlPostSocio,
        type: 'POST',
        data: datossociojson,
        datatype: 'JSON',
        contenttype: 'application/json',
        success: function(reponse){
            console.log(reponse);
        },
        error: function(){
            alert('Error al Crear Socio');
        }
    });
    alert('Socio Agregado');
}