@extends('layouts.app')

@section('titulo')
    Dashboard
@endsection

@section('breadcrumb')
    <li class="active">Dashboard</li>
@endsection

@section('container')
    {{ csrf_field() }}
    <!-- Content area -->
    <div class="content">
        <!-- Detached content -->
        <div class="container-detached">
            <div class="content-detached">
              <!-- Tasks options -->
							<div class="navbar navbar-default navbar-xs navbar-component">
								<ul class="nav navbar-nav no-border visible-xs-block">
									<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
								</ul>

								<div class="navbar-collapse collapse" id="navbar-filter">
									<p class="navbar-text">Filtro:</p>
									<ul class="nav navbar-nav">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-sort-time-asc position-left"></i> Por data atualização <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#">Show all</a></li>
												<li class="divider"></li>
												<li><a href="#">Today</a></li>
												<li><a href="#">Yesterday</a></li>
												<li><a href="#">This week</a></li>
												<li><a href="#">This month</a></li>
												<li><a href="#">This year</a></li>
											</ul>
										</li>

										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-sort-amount-desc position-left"></i> By status <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#">Show all</a></li>
												<li class="divider"></li>
												<li><a href="#">Open</a></li>
												<li><a href="#">On hold</a></li>
												<li><a href="#">Resolved</a></li>
												<li><a href="#">Closed</a></li>
												<li><a href="#">Dublicate</a></li>
												<li><a href="#">Invalid</a></li>
												<li><a href="#">Wontfix</a></li>
											</ul>
										</li>

										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-sort-numeric-asc position-left"></i> Por prioridade <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#">Mostrar todos</a></li>
												<li class="divider"></li>
												<li><a href="#" name="0">Highest</a></li>
												<li><a href="#" name="1">High</a></li>
												<li><a href="#" name="2">Normal</a></li>
												<li><a href="#" name="3">Low</a></li>
											</ul>
										</li>
                    <li>
                      <i class="icon-sort-numeric-asc position-left"></i> Por categoria
                      <select id="categoria_id"></select>
                    </li>
									</ul>

									<div class="navbar-right">
										<p class="navbar-text">View mode:</p>
										<form class="navbar-form navbar-left" action="#">
											<div class="form-group">
												<label class="checkbox-inline switchery-double checkbox-switchery switchery-xs">
													List
													<input type="checkbox" class="switch-mode" checked="checked">
													Grid
												</label>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- /tasks options -->


							<!-- Tasks grid -->
							<div class="text-center content-group text-muted content-divider">
								<span class="pt-10 pb-10">2 hours ago</span>
							</div>
                <div class="row">
                    <div id="grade"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    var dtIndicadores;
    var dtCategorias;
    $(function() {
        var token = $('input[name=_token]').val();
        function carregarIndicadores() {
          $.ajax({
            url: 'common/indicadores',
            type: 'GET',
            data: {
              '_token': token
            },
            success: function(data) {
              dtIndicadores = data;
              construirGrid(dtIndicadores);
            },
            error: function(error) {
              console.log('Error', error);
            }
          });
        }
        function carregarCategorias() {
          $.ajax({
            url: 'common/categorias',
            type: 'GET',
            data: {
              '_token': token
            },
            success: function(data) {
              dtCategorias = data;
              popularFiltroCategoria(dtCategorias);
            },
            error: function(error) {
              console.log('Error', error);
            }
          });
        }
        carregarCategorias();
        carregarIndicadores();
        $('.dropdown-menu li a').on('click', function(e) {
          e.preventDefault();
          console.log(this.name)
        })

    })
    function construirGrid(dtIndicadores) {
      var template = gridIndicadorTemplate;
      $.each(dtIndicadores, function(index, value) {
         template = template.replace('#urlIndicador', 'indicadores/edit/' + value['id']);
         template = template.replace('#tituloIndicador', value['indicador']);
         template = template.replace('#idcategoria', value['categoria_id']);
         template = template.replace('#idtipo', value['tipo_ind_id']);
         template = template.replace('#objetivoIndicador', value['objetivo']);
         template = template.replace('#dtmodificado', value['updated_at']);
         template = template.replace('#corPrioridade', colorOrdem(value['ordem']));
         template = template.replace('#txtPrioridade', converterOrdemEmPrioridade(value['ordem']));
         template = template.replace('#txtCategoria', getCategoria(value['categoria_id']));
         template = template.replace('#iconTipo', converterTipoIndicadorEmIcone(value['tipo_ind_id']));
         $('#grade').append(template);
         template = gridIndicadorTemplate;
      });
    }
    function colorOrdem(ordem) {
      var retorno = ''
      switch(ordem) {
        case '0':
          retorno = 'label-danger';
          break;
        case '1':
          retorno = 'label-info';
          break;
        case '2':
          retorno = 'label-primary';
          break;
        case '3':
          retorno = 'label-success';
          break;
      }
      return retorno;
    }
    function converterOrdemEmPrioridade(ordem) {
      var retorno = ''
      switch(ordem) {
        case '0':
          retorno = 'Máxima';
          break;
        case '1':
          retorno = 'Alta';
          break;
        case '2':
          retorno = 'Normal';
          break;
        case '3':
          retorno = 'Baixa';
          break;
      }
      return retorno;
    }
    function converterTipoIndicadorEmIcone(tipo) {
    //console.log(tipo)
      var retorno = ''
      switch(tipo) {
        case '1':
          retorno = 'icon-chess-king';
          break;
        case '2':
          retorno = 'icon-chess';
          break;
      }
      return retorno;
    }
    function getCategoria(categoria_id) {
      return dtCategorias[categoria_id];
    }
    function popularFiltroCategoria(dtCategorias) {
      $('#categoria_id').append('<option value="todos">Todos</option>')
      $.each(dtCategorias, function(index, value) {
        $('#categoria_id').append(
          '<option value="'+ index + '">'+ value + '</option>'
        )
      })
    }
  </script>
@endsection
