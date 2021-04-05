@extends('layouts.admin')

@section('title', 'Editar etiqueta')

@section('styles')
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Editar etiqueta
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('tags.index') }}">Etiquetas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar {{$tag->name}}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar etiqueta</h4>
                        </div>
                        {!! Form::model($tag,['route' => ['tags.update',$tag], 'method' => 'PUT']) !!}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{$tag->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" >{{$tag->description}}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary mr-2 float-right">Actualizar</button>
                        <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
