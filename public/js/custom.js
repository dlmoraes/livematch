var dtpadrao = function () {
    $.extend($.fn.dataTable.defaults, {
        autoWidth: true,
        dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filtro:</span> _INPUT_',
            lengthMenu: '<span>Mostrar:</span> _MENU_',
            paginate: {'first': 'Primeiro', 'last': 'Último', 'next': '&rarr;', 'previous': '&larr;'},
            sInfo: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            sInfoEmpty: "Mostrando 0 to 0 of 0 registros"
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });
    $('.dtpadrao').DataTable({
        allowClear: true,
        fixedHeader: true,
        buttons: [
            {
                extend: 'copyHtml5',
                className: 'btn bg-grey-600 btn-icon',
                text: '<i class="icon-copy3" data-popup="tooltip" title="Copiar linhas da tabela" data-placement="top"></i>'
            },
            {
                extend: 'excelHtml5',
                className: 'btn bg-grey-600 btn-icon',
                text: '<i class="icon-file-excel"></i>'
            },
            {
                extend: 'colvis',
                text: '<i class="icon-grid7" data-popup="tooltip" title="Mostrar/Ocultar colunas" data-placement="top"></i> <span class="caret"></span>',
                className: 'btn bg-grey-800 btn-icon'
            }
        ],
        language: {
            buttons: {
                copyTitle: '<b>Copiando tabela</b>',
                copySuccess: {
                    _: 'Foram copiadas <b>%d linhas</b>',
                    1: '1 linha foi copiada'
                }
            },
            emptyTable: "Não há dados para mostrar..."
        },
        keys: true
    });

    $(".dataTables_paginate").removeClass("paging_simple_numbers").addClass('pagination pagination-flat pagination-rounded');
    $('.dataTables_filter input[type=search]').attr('placeholder', 'Pesquisar...');
    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        width: 'auto'
    });
};

$(function () {

    $("body").tooltip({container: 'body'});

    $('#empresa_id').select2({
        placeholder: 'Selecione uma empresa...'
    });

    $('#categoria_id').select2({
        placeholder: 'Selecione uma categoria...'
    });

    $('#tipo_ind_id').select2({
        placeholder: 'Selecione o tipo de indicador...'
    });
    dtpadrao();

});

function msgNotificacao(tipo, titulo, msg) {
    swal({
        title: titulo,
        text: msg,
        html: true,
        confirmButtonColor: "#66BB6A",
        type: tipo,
        timer: 2000
    });
};

$(function() {

    // Hide navbar with Headroom.js library
    $(".navbar-fixed-top").headroom({
        classes: {
            pinned: "headroom-top-pinned",
            unpinned: "headroom-top-unpinned"
        },
        offset: $('.navbar').outerHeight(),

        // callback when unpinned, `this` is headroom object
        onUnpin: function() {
            $('.navbar .dropdown-menu').parent().removeClass('open');
        }
    });

});
