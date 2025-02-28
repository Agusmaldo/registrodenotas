$(document).ready(function() {


var oTable = $('#tablaRecientes2').dataTable( {
                "bJQueryUI": true,
                "oLanguage": {                    
                             "oPaginate": {
                                        "sPrevious": "Anterior",
                                        "sNext": "Siguiente",
                                        "sLast": "Ultima",
                                        "sFirst": "Primera"
                                        }, 
                                        
                            "sLengthMenu": 'Mostrar <select>'+
                            '<option value="10">10</option>'+
                            '<option value="20">20</option>'+
                            '<option value="30">30</option>'+
                            '<option value="40">40</option>'+
                            '<option value="50">50</option>'+
                            '<option value="-1">Todos</option>'+
                            '</select> registros',
                            "sInfo": "Mostrando del _START_ a _END_ (Total: _TOTAL_ resultados)",
                            "sInfoFiltered": " - filtrados de _MAX_ registros",
                            "sInfoEmpty": "No hay resultados de búsqueda",
                            "sZeroRecords": "No hay registros a mostrar",
                            "sProcessing": "Espere, por favor...",
                            "sSearch": "Buscar:"
                            },
		'sPaginationType': 'full_numbers',
		"sScrollX": "100%",
        	"bScrollCollapse": true	,
		"aoColumns": [
			/* Id */ { "asSorting": [ "desc" ],
				   "bSearchable": false,
			           "bVisible":    false },
			/* Remitente */ null,
			/* Destinatario */ null,
			/* Fecha recepcion */ null,
			/* Fecha elevacion */ null,
			/* Referencia */ null,	
			/* Fecha documento */ null,
			/* Cnrt pendiente */ null,
			/* Cudap */ null,
			/* Folio ACT/EXP */ null,
                        /* Vinculo EXP */ null,
                        /* Titulo */ null,
                        /* Asunto */ null,
			/* Acciones */ null		
		]	  
                } );
});
