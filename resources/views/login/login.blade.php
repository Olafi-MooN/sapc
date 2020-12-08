@extends('layouts.main')
@section('title', 'Fazer login')

@section('content')
@if($create === 1)
<div class="" id="ExemploModalCentralizado" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">O usuário foi criado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
        </button>
      </div>
      <div class="modal-body">
        Insira o seu email e sua senha, logo abaixo abaixo!
      </div>
    </div>
  </div>
@endif

<div class="container login-container">
    <div class="row w-100 d-flex justify-content-center aling-items-center">
        <div class="col-md-6 login-form-1">
            <h3 class="font-weight-bold">Entrar uma conta</h3>
            <form action="/login/verify" method="POST">
              @csrf
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">E-mail</label>
                    <input type="text" class="form-control" placeholder="Digite o seu e-mail" name="email"/>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Senha</label>
                    <input type="password" class="form-control" placeholder="Digite a sua senha" name="password" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit btn-block" value="Login" />
                </div>
                <div class="form-group">
                    <a href="#" class="ForgetPwd">Esqueceu a senha?</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection