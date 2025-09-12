// Configuração do DataTables em Português Brasileiro
$(document).ready(function() {
    // Configuração global do DataTables para português brasileiro
    if ($.fn.dataTable) {
        $.extend($.fn.dataTable.defaults, {
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Mostrar _MENU_ registros por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar:",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    }

    // Forçar tradução dos botões de paginação existentes
    setTimeout(function() {
        $('.paginate_button.previous').each(function() {
            if ($(this).text().trim() === 'Previous') {
                $(this).text('Anterior');
            }
        });
        $('.paginate_button.next').each(function() {
            if ($(this).text().trim() === 'Next') {
                $(this).text('Próximo');
            }
        });
    }, 1000);
});
