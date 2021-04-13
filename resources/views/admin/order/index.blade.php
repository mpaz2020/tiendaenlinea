@extends('layouts.admin')

@section('title', 'Gestion de pedidos')
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
    {{-- <li class="nav-item d-done d-lg-flex">
        <a class="nav-link" type="button" href="{{ route('orders.create') }}">
            <span class="btn btn-primary">+ Registrar categoria</span>
        </a>
    </li> --}}
@endsection
@section('options')
@endsection
@section('preference')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Pedidos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Pedidos</h4>

                    {{-- <div class="btn-group">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('orders.create') }}" class="dropdown-item">Agregar</a>
                        </div>
                    </div> --}}
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Pedido</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
                                        <th>Total</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $key=> $order)
                                        <tr>
                                            <th scope="row">{{ $order->id }}</th>
                                            <td>{{ $order->order_date }}</td>
                                            <td>{{ $order->shipping_status }}</td>
                                            <td>{{ $order->total() }}</td>
                                            <td style="width: 50px;">
                                                <a class="jsgrid-button jsgrid-edit-button"
                                                    href="{{ route('orders.show', $order) }}" title="Ver detalles">
                                                    <i class="far fa-eye"></i>
                                                </a>
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
@endsection

@section('scripts')

    {!! Html::script('melody/js/data-table.js') !!}

@endsection
