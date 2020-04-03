$(document).ready( function () {
    $('#myTable').DataTable({
        //cambiamos el menu de cantidad de elementos a mostrar
        aLengthMenu: [
            [10, 25, -1],
            [10, 25, 'Todos']
        ],
        language: {
            lengthMenu: "_MENU_ registros por pagina",
            zeroRecords: "No se encontraron registros",
            info: "Mostrando _START_ - _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando _TOTAL_ registros",
            infoFiltered: "(filtrados de un total de _MAX_ registros)",
            search: "<span class='fa fa-fw fa-search'></span> ",
            searchPlaceholder: "Search records",
            loadingRecords: "Cargando...",
            processing:     "Procesando...",
            pagingType: 'full_numbers',
            paginate: {
                first:    '<<',
                previous: '< Anterior',
                next:     'Siguiente >',
                last:     '>>'
            }
        }
    });
} );