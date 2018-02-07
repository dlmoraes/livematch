@extends('layouts.app')

@section('titulo')
    Indicadores
@endsection

@section('subtitulo')
    - cadastrados
@endsection

@section('breadcrumb')
    <li>Administração</li>
    <li class="active">Indicadores</li>
@endsection

@section('botoes_extras')
    <a id="btnAdd" data-popup="tooltip" title="Adicionar indicador" class="btn btn-primary btn-labeled"><b><i
                    class="icon-plus-circle2"></i></b> Indicador</a>
@endsection

@section('container')

    <!-- Content area -->
    <div class="content">
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Indicadores</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload" onclick="refreshTable();"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <table id="dtindicador" class="table dtpadrao table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody class="table-container">
                @include('admin.indicadores.table')
                </tbody>
            </table>
        </div>
        <!-- /basic responsive configuration -->
    </div>
    <!-- Horizontal form modal -->
    <div id="modaledit" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Alterar indicador</h5>
                </div>

                <form id="frmIndicador" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_indicador"/>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="indicador" class="control-label col-sm-3">Empresa</label>
                            <div class="col-sm-9">
                                <input id="indicador" name="indicador" type="text" placeholder="Nome da Empresa"
                                       class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /horizontal form modal -->
@endsection

@section('scripts')
    <script>
        btnEditClick = function () {
            $('.btnEdit').click(function (e) {
                e.preventDefault();
                $('#modaledit .modal-title').text('Alterar indicador');
                var id = this.id;
                var name = this.name;
                $("#frmIndicador input[name=id_indicador]").val(id);
                $("#indicador").val(name);
                $('#modaledit').modal('show');
            });
        }
        btnDeleteClick = function () {
            $('.btnDelete').click(function (e) {
                e.preventDefault();
                var id = this.name;
                var url = 'indicadores/excluir/' + id;
                var token = $('input[name=_token]').val();
                // Alert combination
                swal({
                        title: "Confirmação de Exclusão",
                        text: "Você tem certeza que deseja prosseguir com a exclusão?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#EF5350",
                        confirmButtonText: "Sim, pode excluir!",
                        cancelButtonText: "Não, cliquei sem querer!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: url,
                                type: 'DELETE',
                                data: {
                                    '_token': token,
                                    'id': id
                                },
                                success: function (data) {
                                    msgNotificacao("success", "Alterações salvas!", "O registro foi excluido!!!");
                                },
                                error: function (error) {
                                    msgNotificacao("error", "Oops...", "Ocorreu um erro ao realizar está operação");
                                },
                                complete: function () {
                                    $('#linha-' + id).addClass("animated fadeOutRight").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
                                        $('#linha-' + id).remove();
                                    });
                                }
                            })
                        }
                        else {
                            msgNotificacao('warning', 'Cancelado', "Calma, nada foi enviado.")
                        }
                    });
            });
        }

        $(function () {
            btnEditClick();
            $('#btnAdd').click(function (e) {
                e.preventDefault();
                $('#modaledit .modal-title').text('Adicionar indicador');
                $("#frmIndicador input[name=id_indicador]").val('');
                $("#indicador").val('');
                $('#modaledit').modal('show');
            });
            btnDeleteClick();
            $('#frmIndicador').on('submit', function (e) {
                e.preventDefault();
                var indicador = $('#indicador').val();
                if (indicador.length <= 0) {
                    msgNotificacao("warning", "Oops...", "Dados inválidos");
                    return;
                }
                var id = $("#frmIndicador input[name=id_indicador]").val();
                var token = $('input[name=_token]').val();
                if (id > 0) {
                    var form = {
                        '_token': token,
                        'indicador': $('#indicador').val(),
                        'id': id
                    };
                    var url = 'indicadores/edit/' + id;
                    $.ajax({
                        url: url,
                        type: 'PUT',
                        data: form,
                        success: function (data) {
                            if ((data.errors)) {
                                msgNotificacao("error", "Oops...", 'Dados inválidos!');
                            } else {
                                msgNotificacao("success", "Alterações salvas!", "Feedback gerado com sucesso!!!");
                                indicador = data['indicador'];
                                tblnome = $('#linha-' + id + ' td:eq(1)');
                                tblnome.text(indicador);
                                $('#linha-' + id + ' .btnEdit').attr('name', indicador);
                                $('#modaledit').modal('hide');
                            }
                        },
                        error: function (error) {
                            msgNotificacao("error", "Oops...", "Ocorreu um erro ao realizar está operação");
                        }
                    })
                } else {
                    $.ajax({
                        url: 'indicadores/adicionar',
                        type: 'POST',
                        data: {
                            '_token': token,
                            'indicador': $('#indicador').val()
                        },
                        success: function (data) {
                            if ((data.errors)) {
                                msgNotificacao("error", "Oops...", 'Dados inválidos!');
                            } else {
                                msgNotificacao("success", "Alterações salvas!", "Feedback gerado com sucesso!!!");
                                $('#modaledit').modal('hide');
                                refreshTable();
                            }
                        },
                        error: function (error) {
                            msgNotificacao("error", "Oops...", "Ocorreu um erro ao realizar está operação");
                        }
                    })
                }

            });
        });

        function refreshTable() {
            $('tbody.table-container').fadeOut();
            $('tbody.table-container').load('indicadores/lists', function () {
                $('tbody.table-container').fadeIn();
                btnEditClick();
                btnDeleteClick();
            });
        }
    </script>
@endsection