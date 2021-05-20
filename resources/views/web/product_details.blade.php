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
                                <li class="breadcrumb-item"><a href="shop-grid-left-sidebar.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">product details</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- product details wrapper start -->
    <div class="product-details-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-large-slider mb-20 slick-arrow-style_2">
                                    @foreach ($product->images as $key => $image)
                                    <div class="pro-large-img img-zoom" id="img{{$key}}">
                                        <img src="{{ $image->url }}" alt="{{ $product->name }}"/>
                                    </div>
                                    @endforeach


                                    {{-- <div class="pro-large-img img-zoom" id="img2">
                                        <img src="{!!asset('galio/assets/img/product/product-details-img2.jpg')!!}" alt="" />
                                    </div>
                                    <div class="pro-large-img img-zoom" id="img3">
                                        <img src="{!!asset('galio/assets/img/product/product-details-img3.jpg')!!}" alt="" />
                                    </div>
                                    <div class="pro-large-img img-zoom" id="img4">
                                        <img src="{!!asset('galio/assets/img/product/product-details-img4.jpg')!!}" alt="" />
                                    </div> --}}
                                </div>
                                <div class="pro-nav slick-padding2 slick-arrow-style_2">
                                    @foreach ($product->images as $image)
                                    <div class="pro-nav-thumb">
                                        <img src="{{ $image->url }}"
                                        alt="{{ $product->name }}" />
                                    </div>
                                    @endforeach
                                    {{-- <div class="pro-nav-thumb"><img src="{!!asset('galio/assets/img/product/product-details-img2.jpg')!!}"
                                            alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="{!!asset('galio/assets/img/product/product-details-img3.jpg')!!}"
                                            alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="{!!asset('galio/assets/img/product/product-details-img4.jpg')!!}"
                                            alt="" /></div>
                                    <div class="pro-nav-thumb"><img src="{!!asset('galio/assets/img/product/product-details-img2.jpg')!!}"
                                            alt="" /></div> --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details-des mt-md-34 mt-sm-34">
                                    <h3><a href="{{route('web.product_details',$product)}}">{{ $product->name }}</a></h3>
                                    <div class="ratings">
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <div class="pro-review">
                                            <span>1 review(s)</span>
                                        </div>
                                    </div>
                                    <div class="customer-rev">
                                        <a href="#">(1 customer review)</a>
                                    </div>
                                    <div class="availability mt-10">
                                        <h5>Availability:</h5>
                                        <span>{{ $product->stock }} in stock</span>
                                    </div>
                                    <div class="pricebox">
                                        <span class="regular-price">S/. {{ $product->sell_price }}</span>
                                    </div>
                                    <p>{{ $product->short_description }}</p>
                                    {{-- <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.<br>
                                        Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea
                                        dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris
                                        consequat nisi ut mauris efficitur lacinia.</p> --}}
                                    {{-- <div class="quantity-cart-box d-flex align-items-center">

                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="buy-btn" href="#">add to cart<i class="fa fa-shopping-cart"></i></a>
                                        </div>

                                    </div> --}}
                                    @include('web._add_shopping_cart_form',['class'=>''])




                                    <div class="useful-links mt-20">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i
                                                class="fa fa-refresh"></i>compare</a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Wishlist"><i
                                                class="fa fa-heart-o"></i>wishlist</a>
                                    </div>
                                    <div class="share-icon mt-20">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews mt-34">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#tab_one">description</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_two">information</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab_three">reviews</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_one">
                                            <div class="tab-one">

                                                {{$product->long_description}}
                                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla
                                                    augue nec est tristique auctor. Ipsum metus feugiat sem, quis fermentum
                                                    turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa
                                                    massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero
                                                    hendrerit est, sed commodo augue nisi non neque.</p>
                                                <div class="review-description">
                                                    <div class="tab-thumb">
                                                        <img src="{!!asset('galio/assets/img/about/services.jpg')!!}" alt="">
                                                    </div>
                                                    <div class="tab-des mt-sm-24">
                                                        <h3>Product Information :</h3>
                                                        <ul>
                                                            <li>Donec non est at libero vulputate rutrum.</li>
                                                            <li>Morbi ornare lectus quis justo gravida semper.</li>
                                                            <li>Pellentesque aliquet, sem eget laoreet ultrices</li>
                                                            <li>Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id
                                                                nulla</li>
                                                            <li>Donec a neque libero.</li>
                                                            <li>Pellentesque aliquet, sem eget laoreet ultrices</li>
                                                            <li>Morbi ornare lectus quis justo gravida semper.</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <p>Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida
                                                    vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant
                                                    morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                                                    Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat.
                                                    Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis,
                                                    a dapibus enim lorem nec augue. Nunc facilisis sagittis ullamcorper.</p>
                                                <p>Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed
                                                    et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et
                                                    ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus
                                                    adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada
                                                    tincidunt.</p> --}}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_two">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>color</td>
                                                        <td>black, blue, red</td>
                                                    </tr>
                                                    <tr>
                                                        <td>size</td>
                                                        <td>L, M, S</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab_three">
                                            <form action="#" class="review-form">
                                                <h5>1 review for Simple product 12</h5>
                                                <div class="total-reviews">
                                                    <div class="rev-avatar">
                                                        <img src="{!!asset('galio/assets/img/about/avatar.jpg')!!}" alt="">
                                                    </div>
                                                    <div class="review-box">
                                                        <div class="ratings">
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span class="good"><i class="fa fa-star"></i></span>
                                                            <span><i class="fa fa-star"></i></span>
                                                        </div>
                                                        <div class="post-author">
                                                            <p><span>admin -</span> 30 Nov, 2018</p>
                                                        </div>
                                                        <p>Aliquam fringilla euismod risus ac bibendum. Sed sit amet sem
                                                            varius ante feugiat lacinia. Nunc ipsum nulla, vulputate ut
                                                            venenatis vitae, malesuada ut mi. Quisque iaculis, dui congue
                                                            placerat pretium, augue erat accumsan lacus</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Your Name</label>
                                                        <input type="text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Your Email</label>
                                                        <input type="email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Your Review</label>
                                                        <textarea class="form-control" required></textarea>
                                                        <div class="help-block pt-10"><span class="text-danger">Note:</span>
                                                            HTML is not translated!</div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            Rating</label>
                                                        &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                        <input type="radio" value="1" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="2" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="3" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="4" name="rating">
                                                        &nbsp;
                                                        <input type="radio" value="5" name="rating" checked>
                                                        &nbsp;Good
                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <button class="sqr-btn" type="submit">Continue</button>
                                                </div>
                                            </form> <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->

                    <!-- related products area start -->

                    @include('web._related_products')

                    <!-- related products area end -->
                </div>

                <!-- sidebar start -->
                <div class="col-lg-3">
                    <div class="shop-sidebar-wrap fix mt-md-22 mt-sm-22">
                        <!-- featured category start -->
                        @include('web._sidebar_categorie')

                        @include('web._featured_category')

                        <!-- featured category end -->

                        <!-- manufacturer start -->

                        {{-- <div class="sidebar-widget mb-22">
                            <div class="sidebar-title mb-10">
                                <h3>Manufacturers</h3>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul>
                                    <li><i class="fa fa-angle-right"></i><a href="#">calvin klein</a><span>(10)</span></li>
                                    <li><i class="fa fa-angle-right"></i><a href="#">diesel</a><span>(12)</span></li>
                                    <li><i class="fa fa-angle-right"></i><a href="#">polo</a><span>(20)</span></li>
                                    <li><i class="fa fa-angle-right"></i><a href="#">Tommy Hilfiger</a><span>(12)</span>
                                    </li>
                                    <li><i class="fa fa-angle-right"></i><a href="#">Versace</a><span>(16)</span></li>
                                </ul>
                            </div>
                        </div> --}}

                        <!-- manufacturer end -->

                        <!-- product tag start -->

                        @include('web._product_tag')

                        <!-- product tag end -->

                        <!-- sidebar banner start -->
                        {{-- <div class="sidebar-widget mb-22">
                            <div class="img-container fix img-full mt-30">
                                <a href="#"><img src="{!!asset('galio/assets/img/banner/banner_shop.jpg')!!}" alt=""></a>
                            </div>
                        </div> --}}
                        <!-- sidebar banner end -->
                    </div>
                </div>
                <!-- sidebar end -->
            </div>
        </div>
    </div>
    <!-- product details wrapper end -->

    <!-- brand area start -->

    @include('web._brand_area')

@endsection


@section('scripts')

@endsection
