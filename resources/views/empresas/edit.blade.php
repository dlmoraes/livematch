@extends('layouts.app')

@section('breadcrumb')
    <li><a href="{{ route('empresas') }}">Empresas</a></li>
    <li class="active">Editar Empresa</li>
@endsection

@section('nome_pagina')
    Cadastro empresa
@endsection

@section('container')
    <section class="content">
    <div class="row">
        <div class="col-md-10">
            @include('common.error_form')

            {!! Form::open(['route' => ['empresas.update', $empresa->id], 'class' => 'form-horizontal', 'method'=>'put']) !!}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Editar Empresa</strong></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('nome', 'Nome', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
                            <div class="col-md-6 col-xs-12">
                                {!! Form::text('nome', $empresa->nome, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('sigla', 'Sigla', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
                            <div class="col-md-6 col-xs-12">
                                {!! Form::text('sigla', $empresa->sigla, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('empresas') }}" class="btn btn-default">Empresas</a>
                        {!! Form::submit('Salvar Empresa', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    </section>
@endsection