@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3 mb-3">
        <div class="col-md-12">
            <div class="d-flex flex-row flex-row-reverse mt-5 mb-3">
                <a href="{{route('Dashboard.Employees.create')}}" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                    </svg>
                    Novo
                </a>
            </div>
            <div class="card">
                @if ($method === 'PUT')
                    <div class="card-header">Atualizar dados do funcionário</div>
                @else
                    <div class="card-header">Criar novo funcionário</div>
                @endif
                <div class="container">

                    <form action="{{ $action }}" method="{{ $method }}">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text"  name="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" value="{{old('name', $employee->name)}}">
                                    @if($errors->has('name'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('name')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="address">Rua</label>
                                    <input type="text" name="address" class="form-control @if($errors->has('address')) is-invalid @endif" id="address" value="{{old('address', $employee->address)}}">
                                    @if($errors->has('address'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('address')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="number">Número</label>
                                    <input type="text" id="number" name="number" class="form-control @if($errors->has('number')) is-invalid @endif"  value="{{old('number', $employee->number)}}">
                                    @if($errors->has('number'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('number')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="postal_code">CEP</label>
                                    <input type="text" id="postal_code" name="postal_code" class="form-control @if($errors->has('postal_code')) is-invalid @endif"  value="{{old('postal_code', $employee->postal_code)}}">
                                    @if($errors->has('postal_code'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('postal_code')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="state_id">Estado</label>
                                    <select id="state_id" name="state_id" class="form-control form-select-lg mb-3" aria-label=".form-select-lg">
                                        @foreach($states as $s)
                                            <option></option>
                                            @if ($method === 'PUT')
                                                <option value="{{$s->id}}" {{ optional($employee)->city->state->id === $s->id ? 'selected' : ''}}>{{ $s->uf }}</option>
                                            @else
                                            <option value="{{$s->id}}">{{ $s->uf }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('state_id'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('state_id')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city_id">Cidade</label>
                                    <select id="city_id" name="city_id" class="form-control form-select-lg mb-3" aria-label=".form-select-lg">
                                        @if ($method === 'PUT')
                                            @foreach($cities as $c)
                                                <option></option>
                                                <option value="{{$c->id}}" {{ optional($employee)->city->id === $c->id ? 'selected' : ''}}>{{$c->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('city_id'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('city_id')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="neighborhood">Bairro</label>
                                    <input type="text" id="neighborhood" name="neighborhood" class="form-control @if($errors->has('neighborhood')) is-invalid @endif"  value="{{old('neighborhood', $employee->neighborhood)}}">
                                    @if($errors->has('neighborhood'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('neighborhood')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address_details">Complemento</label>
                                    <input type="text" id="address_details" name="address_details" class="form-control @if($errors->has('address_details')) is-invalid @endif"  value="{{old('address_details', $employee->address_details)}}">
                                    @if($errors->has('address_details'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('address_details')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" id="cpf" name="cpf" class="form-control @if($errors->has('cpf')) is-invalid @endif"  value="{{old('cpf', $employee->cpf)}}">
                                    @if($errors->has('cpf'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('cpf')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rg">RG</label>
                                    <input type="text" id="rg" name="rg" class="form-control @if($errors->has('rg')) is-invalid @endif"  value="{{old('rg', $employee->rg )}}">
                                    @if($errors->has('rg'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('rg')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" id="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif"  value="{{old('email', $employee->email)}}">
                                    @if($errors->has('email'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('email')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Telefone</label>
                                    <input type="text" id="phone" name="phone" class="form-control @if($errors->has('phone')) is-invalid @endif"  value="{{old('phone', $employee->phone)}}">
                                    @if($errors->has('phone'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('phone')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cell_phone">Celular</label>
                                    <input type="text" id="cell_phone" name="cell_phone" class="form-control @if($errors->has('cell_phone')) is-invalid @endif"  value="{{old('cell_phone', $employee->cell_phone)}}">
                                    @if($errors->has('cell_phone'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('cell_phone')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob">Data de Nascimento</label>
                                    <input type="date" id="dob" name="dob" class="form-control @if($errors->has('dob')) is-invalid @endif"  value="{{old('dob', $employee->dob)}}">
                                    @if($errors->has('dob'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('dob')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wage">Salário</label>
                                    <input type="text" id="wage" name="wage" class="form-control @if($errors->has('wage')) is-invalid @endif"  value="{{old('wage', $employee->wage)}}">
                                    @if($errors->has('wage'))
                                        <span class="invalid-feedback">
                                            {{$errors->first('wage')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <input class="btn btn-primary" type="submit" value="Cadastrar">
                        <a class="btn btn-outline-secondary" href="{{route('Dashboard.Employees.index')}}" role="button">Voltar</a>
                    </form>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
