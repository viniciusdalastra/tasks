@extends('templates.template')

@section('content')
    <h1 class="text-center">Tarefas</h1> <hr>

    <div class="text-center mt-3 mb-4">
        <a href="{{url("itemTask")}}">>
            <button class="btn btn-success"> Item das Tarefas</button>
        </a>
        <a href="{{url('task/create')}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        @csrf
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>

            @foreach($task as $tasks)
                @php
                    $user=$tasks->find($tasks->id)->relUsers;
                @endphp
                <tr>
                    <th scope="row">{{$tasks->id}}</th>
                    <td>{{$tasks->nome}}</td>
                    <td style="display: flex;flex-direction: row;flex-wrap: nowrap;justify-content: space-evenly;">
                        <a href="{{url("task/$tasks->id/edit")}}">>
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        <a href="{{url("task/$tasks->id")}}" class="js-del">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection