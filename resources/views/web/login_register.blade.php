@extends('layouts.web')

@section('title', 'tienda en linea')

@section('styles')
@endsection

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">login-register</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- login register wrapper start -->
    <div class="login-register-wrapper">
        <div class="container">
            <div class="member-area-from-wrap">
                <div class="row">
                    <!-- Login Content Start -->
                    <div class="col-lg-6">
                        <div class="login-reg-form-wrap  pr-lg-50">
                            <h2>Iniciar Sesion</h2>
                            {{-- <form action="#" method="post"> --}}
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="single-input-item">
                                    <input type="email" id="email" name="email" placeholder="Correo elecronico" required />
                                </div>
                                <div class="single-input-item">
                                    <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required />
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                        <div class="remember-meta">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                                <label class="custom-control-label" for="remember">Recordarme</label>
                                            </div>
                                        </div>
                                        <a href="#" class="forget-pwd">¿Olvidaste tu contraseña?</a>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button type="submit" class="sqr-btn">Iniciar Sesion</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Login Content End -->

                    <!-- Register Content Start -->
                    <div class="col-lg-6">
                        <div class="login-reg-form-wrap mt-md-34 mt-sm-34">
                            <h2>Registro</h2>
                            {{-- <form action="#" method="post" action="{{route('web.login_register')}}"> --}}
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="text" id="name" name="name" placeholder="Nombre" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <input type="text" id="surnames" name="surnames" placeholder="Apellidos" required />
                                    </div>
                                </div>
                            </div>


                                <div class="single-input-item">
                                    <input type="email" id="email" name="email" placeholder="Ingresa tu e-mail" required />
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input type="password" id="password-confirm" name="password_confirmation" placeholder="Repita su contraseña" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <div class="login-reg-form-meta">
                                        <div class="remember-meta">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                                <label class="custom-control-label" for="subnewsletter">Suscribete a nuestro boletin</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-input-item">
                                    <button type="submit" class="sqr-btn">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Register Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- login register wrapper end -->

    <!-- brand area start -->
    <div class="brand-area pt-34 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mb-30">
                        <div class="title-icon">
                            <i class="fa fa-crop"></i>
                        </div>
                        <h3>Popular Brand</h3>
                    </div> <!-- section title end -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="brand-active slick-padding slick-arrow-style">
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br1.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br2.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br3.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br4.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br5.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br6.png" alt=""></a>
                        </div>
                        <div class="brand-item text-center">
                            <a href="#"><img src="assets/img/brand/br4.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

@endsection
