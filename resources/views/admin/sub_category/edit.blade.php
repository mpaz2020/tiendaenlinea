@extends('layouts.admin')

@section('title', 'Editar subcategoria')

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
                Editar subcategoria
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index',$category) }}">Categorias</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.show',$category) }}">{{$category->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar subcategoria</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar categoria</h4>
                        </div>
                        {!! Form::model($sub_category,['route' => ['sub_categories.update',$category, $sub_category], 'method' => 'PUT']) !!}

                        <input type="hidden" name="category_id" id="category_id" value="{{$category->id}}">

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{$sub_category->name}}" placeholder="Nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea id="description" class="form-control" name="description" >{{$sub_category->description}}</textarea>
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
