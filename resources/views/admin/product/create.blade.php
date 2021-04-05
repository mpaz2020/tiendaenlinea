@extends('layouts.admin')

@section('title', 'Registrar producto')

@section('styles')

    {{-- {!! Html::style('select2/dist/css/select2.min.css') !!} --}}

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
                Registro de productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
                </ol>
            </nav>
        </div>

        {!! Form::open(['route' => 'products.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" class="form-control" type="text" name="name" aria-describedby="helpId"
                                required>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="code">Código de barras</label>
                                <input id="code" class="form-control" type="text" name="code" minlength="8" maxlength="8"
                                    aria-describedby="helpId">
                                <small class="text-muted">Campo opcional</small>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sell_price">Precio de venta</label>
                                <input id="sell_price" class="form-control" type="number" name="sell_price"
                                    aria-describedby="helpId" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="short_description">Extracto</label>
                            <textarea id="short_description" class="form-control" name="short_description"
                                rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="long_description">Descripcion</label>
                            <textarea id="long_description" class="form-control" name="long_description"
                                rows="6"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select id="category_id" class="form-control select2" name="category_id" style="width: 100%">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="sub_category_id">SubCategoria</label>
                            <select id="sub_category_id" class="form-control select2" name="sub_category_id"
                                style="width: 100%">
                                @foreach ($sub_categories as $sub_category)
                                    <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select id="provider_id" class="form-control select2" name="provider_id" style="width: 100%">
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tags">Etiquetas</label>
                            <select id="tags" class="form-control select2" name="tags[]" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
            </div>



        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title d-flex">Imágenes del producto</h4>
                        <input type="file" id="images" name="images[]" class="dropify" multiple />

                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Registrar</button>
        <a href="{{ URL::previous() }}" class="btn btn-light">Cancelar</a>

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')

    {!! Html::script('melody/js/dropify.js') !!}
    {!! Html::script('melody/js/dropzone.js') !!}
    {!! Html::script('ckeditor/ckeditor.js') !!}
    {{-- {!! Html::script('select2/dist/js/select2.min.js') !!} --}}

    <script>
        ClassicEditor.create(document.querySelector('#long_description'))
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {
            $('#category_id').select2();
            $('#sub_category_id').select2();
            $('#provider_id').select2();
            $('#tags').select2();
        });

    </script>
@endsection
