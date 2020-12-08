@extends('layouts.main')
@section('title', 'HDC events')

@section('content')

<div class="container d-flex justify-content-center align-items-center flex-column">
    <h1 class="font-weight-bold text-white display-3">Seja bem vindo! Conheça o SAPC</h1>
    <p class="text-white">Armazene seus contatos em apenas um local, com o máximo de segurança</p>

    <div>
        <a href="/login"><button type="button" class="btn btn-success">Entrar</button></a>
        <a href="/login/create"><button type="button" class="btn btn-light">Criar conta</button></a>
    </div>
</div>


@endsection

