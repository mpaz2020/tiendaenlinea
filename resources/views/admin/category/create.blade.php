@extends('layouts.admin')

@section('title', 'Registrar categoria')

@section('styles')
@endsection

@section('create')
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Registro de categorias
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de categorias</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de categorias</h4>
                        </div>

                        {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" class="form-control" type="text" name="name" placeholder="Nombre" required>

                        </div>

                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea id="description" class="form-control" name="description" rows="3"></textarea>

                        </div>

                        <div class="form-group">
                            <label for="icon">icono</label>
                            <select id="icon" class="form-control" name="icon">
                                <option value="1">icono 1</option>
                                <option value="2">icono 2</option>
                                <option value="3">icono 3</option>
                            </select>

                        </div>


                        <button type="submit" class="btn btn-primary mr-2 float-right">Registrar</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
