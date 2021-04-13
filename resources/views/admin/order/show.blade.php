@extends('layouts.admin')

@section('title', 'Detalles de pedido')

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
                Detalles de pedido
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Panel Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Pedidos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalles de pedido</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-4 text-center">
                                <label for="nombre" class="form-control-label">Cliente</label>
                                <p><a href="{{route('clients.show',$sale->client)}}">{{$sale->client->name}}</a></p>
                            </div>
                            <div class="col-md-4 text-center">
                                <label for="nombre" class="form-control-label">Vendedor</label>
                                <p>{{ $sale->user->name }}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <label for="nombre" class="form-control-label">Número de pedido</label>
                                <p>{{ $sale->id }}</p>
                            </div>
                        </div>
                        <br /><br />
                        <div class="form-group row">
                            <h4 class="card-title ml-3">Detalle de pedido</h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalles" class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio (PEN)</th>
                                            <th>Descuento</th>
                                            <th>Cantidad</th>
                                            <th>SubTotal (PEN)</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">SUBTOTAL: </p>
                                            </th>
                                            <th>
                                                <p align="right">{{number_format($order->subtotal(),2)}}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL IMPUESTO ({{$order->tax}}%):</p>
                                            </th>
                                            <th>
                                                <p align="right">{{number_format($order->total_tax(),2)}}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right">{{number_format($order->total(),2)}}</p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($order->order_details as $order_detail)
                                            <tr>
                                                <td>{{$order_detail->product->name}}</td>
                                                <td>{{$order_detail->price}}</td>
                                                <td>{{$order_detail->discount}}</td>
                                                <td>{{$order_detail->quantity}}</td>
                                                <td>{{number_format($order_detail->total())}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer text-muted">
                        <a href="{{ route('orders.index') }}" type="button"
                            class="btn btn-primary float-right">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {!! Html::script('melody/js/profile-demo.js') !!}
    {!! Html::script('melody/js/data-table.js') !!}

@endsection
