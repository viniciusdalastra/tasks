@extends('templates.template')

@section('content')
    <h1 class="text-center">Item da Tarefaa</h1> <hr>

    <div class="text-center mt-3 mb-4">
        <a href="{{url('task')}}">
            <button class="btn btn-success">Tarefas</button>
        </a>
        <a href="{{url('itemTask/create')}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        @csrf
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Descrição</th>
                <th scope="col">Realizada</th>
                <th scope="col">Tarefa Relacionada</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>

            @foreach($itemTask as $itemTasks)
            @php
                $task= $itemTask->find($itemTasks->id)->relTask
            @endphp
                <tr>
                    <th scope="row">{{$itemTasks->id}}</th>
                    <td>{{$itemTasks->descricao}}</td>
                    <td>
                        @if ($itemTasks->realizada)
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-x-fill" viewBox="0 0 16 16">
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM6.854 8.146 8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z"/>
                            </svg>
                        @endif
                    </td>
                    <td>{{$task->id}} - {{$task->nome}}</td>
                    <td style="display: flex;flex-direction: row;flex-wrap: nowrap;justify-content: space-evenly;">
                        <a href="{{url("itemTask/$itemTasks->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        <a  href="{{url("itemTask/$itemTasks->id")}}" class="js-del">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection