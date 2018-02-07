@extends('layouts.tables')

@section('breadcrumb')
    <li class="active">Empresas</li>
@endsection

@section('nome_pagina')
    Empresas 
@endsection

@section('titulo_box')
    Empresas cadastradas
@endsection

@section('botao_box')
<a class="btn btn-default" href="{{ route('empresas.create') }}">
<span class="fa fa-plus-circle"></span> Empresa
</a>
@endsection

@section('cabecalho_table')
<th>#</th>
<th>Nome</th>
<th>Ação</th>
@endsection
@section('corpo_table')
@foreach($empresas as $empresa)
<tr>
    <td>{{ $empresa->id }}</td>
    <td>{{ $empresa->nome }}</td>
    <td>
        <a href="{{ route('empresas.edit', ['id' => $empresa->id]) }}" class="btn-sm btn-primary">
            <span class="fa fa-edit"></span> Editar
        </a>
        <span style="margin-right: 5px"></span>
        <a href="{{ route('empresas.destroy', ['id' => $empresa->id]) }}" class="btn-sm btn-danger">
            <span class="fa fa-recycle"></span> Excluir
        </a>
    </td>
</tr>
@endforeach
@endsection
