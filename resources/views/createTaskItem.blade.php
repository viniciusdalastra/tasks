@extends('templates.template')

@section('content')
<h1 class="text-center">@if(isset($itemTask)) Editar @else Cadastrar @endif</h1>
    <div class="text-center mt-3 mb-4">
        <a href="{{url('itemTask')}}">
            <button class="btn btn-success">Voltar</button>
        </a>
    </div>
    <hr>
    <div class="col-8 m-auto">
        @if(isset($itemTask))
            <form name="formEdit" id="formEdit" method="post" action="{{url("itemTask/$itemTask->id")}}">
            @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{url('itemTask')}}">
        @endif
            @csrf
            <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição:" required value="{{$itemTask->descricao ?? ''}}"><br>
            <select class="form-control" name="task_id" id="task_id" required >
                <option value="">Tarefa Relacionada</option>
                @foreach($task as $tasks)
                    <option value="{{$tasks->id}}" {{isset($itemTask) && $itemTask->task_id == $tasks->id ?'selected': ''}}>{{$tasks->nome}}</option>
                @endforeach
            </select><br>
            @if(isset($itemTask))
            <p>
                Realizada: 
                <input class="form-check-input" type="checkbox" name="realizada" id="realizada" placeholder="Realizada:" required {{$itemTask->realizada ? 'checked' : ''}}><br>
            <p>
            @endif
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection