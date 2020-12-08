@extends('layouts.main')
@section('title','Pagina de contato')

@section('content')

<div class="top d-flex justify-content-between align-items-center m-4 ">
    <h1 class="text-white">Contatos</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Criar contato</button>
</div>


<div class="container" style="height: 100vh;">
    <div class="table-responsive">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Número</th>
                    <th scope="col">Favorito</th>
                    <th scope="col">Descrição</th>
                    <th scope="rows">Opções</th>
                </tr>
        </thead>

        
        <tbody>
            @foreach ($contacts as $contact)
                <tr >
                    <th class="rows">{{ $contact->id }}</th>
                    <td>{{ $contact->nome }}</td>
                    <td>{{ $contact->number }}</td>
                    <td>@if($contact->favorite === 1)
                        Sim
                        @else
                        Não
                        @endif
                        </td>
                    <td>{{ $contact->description }}</td>
                    <td>
                        <button type="button" id="{{ $contact->id }}" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#modalDeletar">Deletar</button>
                        <button type="button" id="{{ $contact->id }}" class="btn btn-warning btn-update" data-toggle="modal" data-target="#modalAtualizar">Atualizar</button>
                    </td>
                </tr>  
            @endforeach          
        </tbody>
        </table>

        <!-- Modal Criar -->
        <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cria um novo contato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group modalCreateList">
                <form action="/contact/show" method="POST">
                @csrf
                        <label for="recipient-name" class="col-form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="recipient-name">
                        <label for="recipient-name" class="col-form-label">Numero</label>
                        <input type="text" class="form-control" name="number" id="recipient-name">
                        <label for="recipient-name" class="col-form-label">Favorito</label>
                        <select name="favorite" class="form-control">
                            <option value="1">Sim</option>
                            <option value="0" selected>Não</option>
                        </select>
                        <label for="recipient-name" class="col-form-label">Descrição</label>
                        <input type="text" class="form-control" name="description" id="recipient-name">
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Criar Contato</button>
            </div>
            </form>
            </div>
        </div>
        </div>

        <!-- Modal Deletar -->
        <div class="modal fade" id="modalDeletar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Deletar Contato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modalDeleteContact">
            <form action="/contact/delete" method="POST">
                @csrf
                <input type="hidden" class="form-control" name="id" id="recipient-name">
                <label for="recipient-name" class="col-form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="recipient-name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-danger">Deletar</button>
            </div>
            </form>
            </div>
        </div>
        </div>

        <!-- Modal Atualizar -->
        <div class="modal fade" id="modalAtualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Atualizar Contato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group modalUpdateList">
                <form action="/contact/up" method="POST">
                @csrf
                    <!-- <label for="recipient-name" class="col-form-label">id</label> -->
                    <input type="hidden" class="form-control" name="id" id="recipient-name">
                    <label for="recipient-name" class="col-form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" id="recipient-name">
                    <label for="recipient-name" class="col-form-label">Numero</label>
                    <input type="text" class="form-control" name="number" id="recipient-name">
                    <label for="recipient-name" class="col-form-label">Favorito</label>
                    <select name="favorite" class="form-control">
                            <option value="1">Sim</option>
                            <option value="0" selected>Não</option>
                        </select>
                    <label for="recipient-name" class="col-form-label">Descrição</label>
                    <input type="text" class="form-control" name="description" id="recipient-name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    
</div>
@endsection

@section('script')
    <script>
        var btnUpdate = document.querySelectorAll(".btn-update");

        btnUpdate.forEach((item, index) => {
            item.addEventListener('click', (e) => {
            
            var modalInputList = document.querySelectorAll('.modalUpdateList form input');
            var rowUpdate = document.querySelectorAll('tbody tr');
            
            var id = rowUpdate[index].cells[0].textContent;
            var nome = rowUpdate[index].cells[1].textContent;
            var number = rowUpdate[index].cells[2].textContent;
            // var favorite = rowUpdate[index].cells[3].textContent;
            var description = rowUpdate[index].cells[4].textContent;
            
            modalInputList[1].value = id;
            modalInputList[2].value = nome;
            modalInputList[3].value = number;
            modalInputList[4].value = description;
            });

        });

        var btnDelete = document.querySelectorAll('.btn-delete');
        btnDelete.forEach((item, index) => {
            item.addEventListener('click', (e) => {
                var modalDeleteContact = document.querySelectorAll('.modalDeleteContact form input')
                var rowUpdate = document.querySelectorAll('tbody tr');

                var id = rowUpdate[index].cells[0].textContent;
                var nome = rowUpdate[index].cells[1].textContent;

                modalDeleteContact[1].value = id;
                modalDeleteContact[2].value = nome;
            });
        });
    
    </script>
@endsection