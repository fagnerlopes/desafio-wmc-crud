@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="d-flex flex-row flex-row-reverse mt-3 mb-3">
                <a href="{{route('Dashboard.Employees.create')}}" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                    </svg>
                    Novo
                </a>
            </div>
            <div class="card">
                <div class="card-header">Cadastro de funcionários</div>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Celular</th>
                            <th scope="col" colspan="2">Ações</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $e)
                            <tr>
                                {{-- <th scope="row">{{$e->id}}</th> --}}
                                <td>{{$e->id}}</td>
                                <td>{{$e->name}}</td>
                                <td>{{$e->email}}</td>
                                <td>{{$e->city->name}}</td>
                                <td>{{$e->cell_phone}}</td>
                                <td><a href="{{route('Dashboard.Employees.edit', ['id' => $e->id ])}}"><i class="fas fa-pencil-alt"></i></a></td>
                                <td><a style="color: red" href="{{route('Dashboard.Employees.destroy', ['id' => $e->id])}}"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
