@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($task)) Editar @else Cadastrar @endif</h1> 
    <div class="text-center mt-3 mb-4">
        <a href="{{url('task')}}">
            <button class="btn btn-success">Voltar</button>
        </a>
    </div>
    <hr>
    <div class="col-8 m-auto">
        @if(isset($task))
            <form name="formEdit" id="formEdit" method="post" action="{{url("task/$task->id")}}">
            @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{url('task')}}" >
        @endif
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome:" required value="{{$task->nome ?? ''}}" ><br>
            <input class="btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection