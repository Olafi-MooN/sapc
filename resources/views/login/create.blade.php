@extends('layouts.main')
@section('title', 'Fazer login')

@section('content')
<div class="container login-container container d-flex justify-content-center align-item-center mw-100">
    <div class="col-md-6 login-form-2">
        <h3 class="font-weight-bold">Criar uma conta</h3>
        <form action="/login/createUser" method="POST">
            @csrf
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nome</label>
                <input type="text" class="form-control" placeholder="Digite um nome" name="name"/>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">E-mail</label>
                <input type="text" class="form-control" p placeholder="Digite um e-mail" name="email"/>
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Senha</label>
                <input type="password" class="form-control" placeholder="Digite uma senha" name="password" />
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Confirme a senha</label>
                <input type="password" class="form-control" placeholder="Digite uma senha" value="" />
            </div>
            <div class="form-group">
                <input type="submit" class="btnSubmit btn-block" value="Criar" />
            </div>
        </form>
    </div>
</div>
@endsection