@extends('layouts.tables')

@section('breadcrumb')
<li class="active">Regionais</li>
@endsection

@section('nome_pagina')
Regionais
@endsection

@section('titulo_box')
Pesquisa - Regionais
@endsection

@section('botao_box')
                <a class="btn btn-default" href="{{ route('regionais.create') }}">
                    <span class="fa fa-plus-circle"></span> Regional
                </a>
@endsection

@section('cabecalho_table')
<th>#</th>
<th>Nome</th>
<th>Ação</th>
@endsection
@section('corpo_table')
                        @foreach($regionais as $regional)
                            <tr>
                                <td>{{ $regional->id }}</td>
                                <td>{{ $regional->nome }}</td>
                                <td>
                                    <a href="{{ route('regionais.edit', ['id' => $regional->id]) }}" class="btn-sm btn-primary">
                                        <span class="fa fa-edit"></span> Editar
                                    </a>
                                    <span style="margin-right: 5px"></span>
                                    <a href="{{ route('regionais.destroy', ['id' => $regional->id]) }}" class="btn-sm btn-danger">
                                        <span class="fa fa-recycle"></span> Excluir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
@endsection
