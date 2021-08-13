@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="d-flex flex-row flex-row-reverse mt-5 pt-3">
                <a href="{{route('employees.create')}}" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                    </svg>
                    Novo
                </a>
            </div>
            <div class="card">
                <div class="card-header">Editar funcionário</div>
                    <form action="{{route('employees.update', ['employee' => $employee])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text"  name="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" value="{{$employee->name}}">
                            @if($errors->has('name'))
                                <span class="invalid-feedback">
                                    {{$errors->first('name')}}
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" class="form-control @if($errors->has('address')) is-invalid @endif" id="address" value="{{$employee->address}}">
                            @if($errors->has('address'))
                                <span class="invalid-feedback">
                                    {{$errors->first('address')}}
                                </span>
                            @endif
                        </div>                        
                        <input class="btn btn-primary" type="submit" value="Atualizar">
                        <a class="btn btn-outline-secondary" href="{{route('employees.index')}}" role="button">Voltar</a>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection