@extends('layouts.admin')

@section('title', 'Categoria ' . $category->name)

@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }

    </style>
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
                Detalles de categoria {{ $category->name }}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="far fa-futbol"></i>
                            {{ $category->name }}
                        </h4>
                        <ul class="solid-bullet-list">
                            <li>
                                <h5>Descripcion</h5>
                                <p class="text-muted">{{ $category->description }}</p>
                            </li>
                        </ul>

                    </div>
                    <div class="card-footer">
                        {!! Form::open(['route' => ['categories.destroy', $category], 'method' => 'DELETE']) !!}

                        <a class="btn btn-info" href="{{ route('categories.edit', $category) }}" title="Editar">
                            {{-- <i class="far fa-edit"></i> --}}
                            Editar
                        </a>

                        <button class="btn btn-danger float-right" type="submit" title="Eliminar">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                            Eliminar
                        </button>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">SubCategorias</h4>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-icon-text mb-3" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="btn-icon-append fas fa-plus"></i>
                                    Agregar
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($category->sub_categories as $sub_category)
                                                <tr>
                                                    <th scope="row">{{ $sub_category->id }}</th>
                                                    <td>
                                                        <a href="#" class="get_products"
                                                            data-artid="{{ $sub_category->id }}">
                                                            {{ $sub_category->name }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $sub_category->description }}</td>
                                                    <td style="width: 50px;">
                                                        {!! Form::open(['route' => ['sub_categories.destroy', $sub_category], 'method' => 'DELETE']) !!}
                                                        <a class="jsgrid-button jsgrid-edit-button"
                                                            href="{{ route('sub_categories.edit', [$category, $sub_category]) }}"
                                                            title="Editar">
                                                            <i class="far fa-edit"></i>
                                                        </a>

                                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                                            type="submit" title="Eliminar">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                        {!! Form::close() !!}
                                                    </td>
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

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Productos</h4>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Existencias</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('categories.index') }}" type="button"
                            class="btn btn-primary float-right">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro de
                        subcategoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['route' => 'sub_categories.store', 'method' => 'POST']) !!}

                <div class="modal-body">

                    <input type="hidden" name="category_id" value="{{ $category->id }}">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            placeholder="Nombre" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                            name="description" rows="3" required></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {!! Html::script('melody/js/profile-demo.js') !!}
    {!! Html::script('melody/js/data-table.js') !!}

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#exampleModal').modal('show');
            });

        </script>
    @endif
    <script>
        $(function() {
            $('.get_products').click(function() {
                var element = $(this);
                $.ajax({
                    type: "GET",
                    url: "/get_products_by_subcategory",
                    data: "sub_category_id=" + element.attr('data-artid'),
                    dataType: "json",
                    success: function(data) {

                        $('#data-table').dataTable().fnDestroy();

                        $('#data-table').DataTable({
                            "data": data.data,
                            "columns": [{
                                    "data": "id"
                                },
                                {
                                    "data": "name"
                                },
                                {
                                    "data": "sell_price"
                                },
                                {
                                    "data": "stock"
                                },
                                {
                                    "data": "btn"
                                }
                            ],
                        });
                    }
                });
                return false;
            });
        });

    </script>
@endsection
