@extends('layouts.admin')

@section('title', 'Gestion de ventas')

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
<li class="nav-item d-done d-lg-flex">
    <a class="nav-link" type="button" href="{{route('sales.create')}}">
        <span class="btn btn-primary">+ Registrar venta</span>
    </a>
</li>
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Ventas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ventas</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Ventas</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('sales.create') }}" class="dropdown-item">Registrar</a>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="table-responsive">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Fecha</th>
                                                <th>Total</th>
                                                <th>Estado</th>
                                                <th style="width: 50px;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($sales as $sale)
                                                <tr>
                                                    <th scope="row">
                                                        <a href="{{ route('sales.show', $sale) }}">{{ $sale->id }}</a>
                                                    </th>
                                                    <td>{{ $sale->sale_date }}</td>
                                                    <td>{{ $sale->total }}</td>
                                                    @if ($sale->status === 'VALID')
                                                        <td>
                                                            <a class="jsgrid-button btn btn-success"
                                                                href="{{ route('sales.change.status', $sale) }}"
                                                                title="Editar">
                                                               Activo <i class="fas fa-check"></i>
                                                            </a>
                                                        </td>
                                                    @else
                                                    <td>
                                                        <a class="jsgrid-button btn btn-danger"
                                                            href="{{ route('sales.change.status', $sale) }}"
                                                            title="Editar">
                                                            Cancelado<i class="fas fa-times"></i>
                                                        </a>
                                                    </td>
                                                    @endif
                                                    <td style="width: 50px;">
                                                        {{-- {!! Form::open(['route' => ['sales.destroy', $sale], 'method' => 'DELETE']) !!} --}}
                                                        {{-- <a class="jsgrid-button jsgrid-edit-button"
                                                            href="{{ route('sales.edit', $sale) }}"
                                                            title="Editar">
                                                            <i class="far fa-edit"></i>
                                                        </a> --}}

                                                        {{-- <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                                            type="submit" title="Eliminar">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button> --}}

                                                        <a href="{{route('sales.pdf', $sale)}}" class="jsgrid-button jsgrid-edit-button">
                                                            <i class="far fa-file-pdf"></i>
                                                        </a>
                                                        <a href="{{route('sales.print',$sale)}}" class="jsgrid-button jsgrid-edit-button">
                                                            <i class="fas fa-print"></i>
                                                        </a>
                                                        <a href="{{ route('sales.show', $sale) }}" class="jsgrid-button jsgrid-edit-button">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        {{-- {!! Form::close() !!} --}}
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
        </div>
    </div>
@endsection

@section('scripts')

    {!! Html::script('melody/js/data-table.js') !!}

@endsection
