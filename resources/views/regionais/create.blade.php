@extends('layouts.app')

@section('breadcrumb')
    <li> <a href="{{ route('regionais') }}">Regionais</a></li>
    <li class="active">Cadastro Regional</li>
@endsection

@section('nome_pagina')
    Cadastro Regional
@endsection

@section('container')
    <section class="content">
    <div class="row">
        <div class="col-md-8">
            @include('common.error_form')

            {!! Form::open(['route' => 'regionais.store', 'class' => 'form-horizontal']) !!}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Nova Regional</strong></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('nome', 'Nome', ['class' => 'col-md-3 col-xs-12 control-label']) !!}
                            <div class="col-md-6 col-xs-12">
                                {!! Form::text('nome', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::reset(null, ['class' => 'btn btn-default']) !!}
                        {!! Form::submit('Criar Regional', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    </section>
@endsection