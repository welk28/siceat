$(document).ready(function () {


    $('#example').DataTable( {
        dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 Registros', '25 Registros', '50 Registros', 'Todos' ]
            ],
            
            buttons: [
            /*'copy', 'csv', 'excel', 'pdf', 'print'*/
            'pageLength',
            {
                extend: 'excelHtml5',
                title: "Reporte de docentes",
                /*orientation: 'landscape',
                pageSize: 'LEGAL'
*/                exportOptions: {
                    columns: [ 0, 1,2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: "Listado de Docentes",
                exportOptions: {
                    columns: [ 0, 1,2, 3, 4, 5, 6 ]
                }
                
            },
            {
                extend: 'print',
                title: "Listado de Docentes",
                exportOptions: {
                    columns: [ 0, 1,2, 3, 4, 5, 6 ]
                }
                
            }
        ],
    } );
  $('#example1').DataTable({
        
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

  $(document).on("click",".btn-print",function(){
    $(".card-body").print();
  });

  
})
