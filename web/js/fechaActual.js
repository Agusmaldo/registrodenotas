$(document).ready(function() {
        
$("#movimiento_remitente_id").change(function(){
	if($("#movimiento_remitente_id").val()){
		mueveReloj("#movimiento_fecha_recepcion");
	}
	else{
	 $("#movimiento_fecha_recepcion").attr('value', "")
	}		
	});
$("#movimiento_destinatario_id").change(function(){
	if($("#movimiento_destinatario_id").val()){
		mueveReloj("#movimiento_fecha_elevacion");
	}
	else{
	 $("#movimiento_fecha_elevacion").attr('value', "")
	}		
	});
});

function mueveReloj(campo){
    momentoActual = new Date();
    año = momentoActual.getFullYear();
    mes = (1+momentoActual.getMonth());
    dia = momentoActual.getDate();
    hora = momentoActual.getHours();
    minuto = momentoActual.getMinutes();
    segundo = momentoActual.getSeconds();
    

    fechaCompleta = año + "-" + mes + "-" + dia + " " + hora + ":" + minuto + ":" + segundo;
    $(campo).attr('value', fechaCompleta)
}

