@extends('layouts.admin')

@section('title', 'Editar producto')

@section('styles')
    {!! Html::style('melody/vendors/lightgallery/css/lightgallery.css') !!} --}}
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
                Edicion de producto
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edicion de producto</li>
                </ol>
            </nav>
        </div>
        {!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" class="form-control @error('name') is-invalid @enderror" type="text"
                                name="name" value="{{ old('name', $product->name) }}" aria-describedby="helpId">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="code">Código de barras</label>
                                <input id="code" class="form-control @error('code') is-invalid @enderror" type="text"
                                    name="code" value="{{ old('code', $product->code) }}" aria-describedby="helpId">
                                <small class="text-muted">Campo opcional</small>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sell_price">Precio de venta</label>
                                <input id="sell_price" class="form-control @error('sell_price') is-invalid @enderror"
                                    type="number" name="sell_price" value="{{ old('sell_price', $product->sell_price) }}"
                                    aria-describedby="helpId" required>

                                @error('sell_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="short_description">Extracto</label>
                            <textarea id="short_description"
                                class="form-control @error('short_description') is-invalid @enderror"
                                name="short_description"
                                rows="3">{{ old('short_description', $product->short_description) }}</textarea>
                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="long_description">Descripcion</label>
                            <textarea id="long_description"
                                class="form-control @error('long_description') is-invalid @enderror" name="long_description"
                                rows="6">{{ old('long_description', $product->long_description) }}</textarea>
                            @error('long_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select id="category_id" class="form-control select2 @error('category_id') is-invalid @enderror"
                                name="category_id" style="width: 100%">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="sub_category_id">SubCategoria</label>
                            <select id="sub_category_id"
                                class="form-control select2 @error('sub_category_id') is-invalid @enderror"
                                name="sub_category_id" style="width: 100%">
                                <option value="" disabled selected>Seleccione una subcategoria</option>

                            </select>
                            @error('sub_category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select id="provider_id" class="form-control select2 @error('provider_id') is-invalid @enderror"
                                name="provider_id" style="width: 100%">
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}"
                                        {{ old('provider_id', $product->provider_id === $provider->id ? 'selected' : '') }}>
                                        {{ $provider->name }}</option>
                                @endforeach
                            </select>
                            @error('provider_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags">Etiquetas</label>
                            <select id="tags" class="form-control select2" name="tags[]" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ collect(old('tags', $product->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}>
                                        {{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <h4 class="card-title">Subir imágenes</h4>
                            <div class="file-upload-wrapper">
                                <div id="fileuploader">Subir</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row grid-margin">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Galería de imágenes</h4>
                        <div id="lightgallery" class="row lightGallery">
                            @foreach ($product->images as $image)
                                <a href="{{ $image->url }}" class="image-tile">
                                    <img src="{{ $image->url }}" alt="">
                                </a>
                            @endforeach
                        </div>
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

    {{-- {!! Html::script('melody/js/jquery-file-upload.js') !!} --}}

    {!! Html::script('melody/vendors/lightgallery/js/lightgallery-all.min.js') !!}
    {!! Html::script('melody/js/light-gallery.js') !!}
    {!! Html::script('melody/js/dropify.js') !!}
    {!! Html::script('melody/js/dropzone.js') !!}
    {!! Html::script('ckeditor/ckeditor.js') !!}

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

    <script>

        let id=<?php echo $product->id ?>;

        (function($) {
            'use strict';
            if ($("#fileuploader").length) {
                $("#fileuploader").uploadFile({
                    url: "{{route('products.upload',"+id+")}}",
                    fileName: "image",
                    method: 'GET',
                });
            }
        })(jQuery);

    </script>

    <script>
        var category = $('#category_id');
        var sub_category_id = $('#sub_category_id');

        category.change(function() {
            $.ajax({
                url: "{{ route('get_subcategories') }}",
                method: 'GET',
                data: {
                    category_id: category.val(),
                },
                success: function(data) {
                    sub_category_id.empty();
                    sub_category_id.append(
                        '<option disabled selected>Seleccione una subcategoria</option>');
                    $.each(data, function(index, element) {
                        sub_category_id.append('<option value="' + element.id + '">' + element
                            .name + '</option>');
                    })
                },
            });
        });

    </script>

@endsection
