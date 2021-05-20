@extends('web.my_account')
@section('content_tab')
    <div class="col-lg-9 col-md-8">

        {{-- <div class="tab-content" id="myaccountContent">
        <!-- Single Tab Content Start -->
        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
            <div class="myaccount-content">
                <h3>Dashboard</h3>
                <div class="welcome">
                    <p>Hello, <strong>Alex Tuntuni</strong> (If Not <strong>Tuntuni !</strong><a
                            href="login-register.html" class="logout"> Logout</a>)</p>
                </div>
                <p class="mb-0">From your account dashboard. you can easily check & view your
                    recent orders, manage your shipping and billing addresses and edit your
                    password and account details.</p>
            </div>
        </div>
        <!-- Single Tab Content End -->

        <!-- Single Tab Content Start -->
        <div class="tab-pane fade" id="orders" role="tabpanel"> --}}
        <div class="myaccount-content">
            <h3>Pedidos</h3>
            <div class="myaccount-table table-responsive text-center">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Pedido</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Total</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $orders as $key=> $order )
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->shipping_status }}</td>
                                <td>{{ $order->total() }}</td>
                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5"> No hay pedidos...</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{-- </div> --}}
        <!-- Single Tab Content End -->

        <!-- Single Tab Content Start -->
        {{-- <div class="tab-pane fade" id="download" role="tabpanel">
            <div class="myaccount-content">
                <h3>Downloads</h3>
                <div class="myaccount-table table-responsive text-center">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Expire</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Haven - Free Real Estate PSD Template</td>
                                <td>Aug 22, 2018</td>
                                <td>Yes</td>
                                <td><a href="#" class="check-btn sqr-btn "><i
                                            class="fa fa-cloud-download"></i> Download File</a>
                                </td>
                            </tr>
                            <tr>
                                <td>HasTech - Profolio Business Template</td>
                                <td>Sep 12, 2018</td>
                                <td>Never</td>
                                <td><a href="#" class="check-btn sqr-btn "><i
                                            class="fa fa-cloud-download"></i> Download File</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Single Tab Content End -->

        <!-- Single Tab Content Start -->
        <div class="tab-pane fade" id="payment-method" role="tabpanel">
            <div class="myaccount-content">
                <h3>Payment Method</h3>
                <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
            </div>
        </div>
        <!-- Single Tab Content End -->

        <!-- Single Tab Content Start -->
        <div class="tab-pane fade" id="address-edit" role="tabpanel">
            <div class="myaccount-content">
                <h3>Billing Address</h3>
                <address>
                    <p><strong>Alex Tuntuni</strong></p>
                    <p>1355 Market St, Suite 900 <br>
                        San Francisco, CA 94103</p>
                    <p>Mobile: (123) 456-7890</p>
                </address>
                <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Edit
                    Address</a>
            </div>
        </div>
        <!-- Single Tab Content End -->

        <!-- Single Tab Content Start -->
        <div class="tab-pane fade" id="account-info" role="tabpanel">
            <div class="myaccount-content">
                <h3>Detalles de la cuenta</h3>
                <div class="account-details-form">
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="first-name" class="required">First Name</label>
                                    <input type="text" id="first-name"
                                        placeholder="First Name" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="last-name" class="required">Last Name</label>
                                    <input type="text" id="last-name" placeholder="Last Name" />
                                </div>
                            </div>
                        </div>
                        <div class="single-input-item">
                            <label for="display-name" class="required">Display Name</label>
                            <input type="text" id="display-name" placeholder="Display Name" />
                        </div>
                        <div class="single-input-item">
                            <label for="email" class="required">Email Addres</label>
                            <input type="email" id="email" placeholder="Email Address" />
                        </div>
                        <fieldset>
                            <legend>Password change</legend>
                            <div class="single-input-item">
                                <label for="current-pwd" class="required">Current
                                    Password</label>
                                <input type="password" id="current-pwd"
                                    placeholder="Current Password" />
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <label for="new-pwd" class="required">New
                                            Password</label>
                                        <input type="password" id="new-pwd"
                                            placeholder="New Password" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single-input-item">
                                        <label for="confirm-pwd" class="required">Confirm
                                            Password</label>
                                        <input type="password" id="confirm-pwd"
                                            placeholder="Confirm Password" />
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="single-input-item">
                            <button class="check-btn sqr-btn ">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- Single Tab Content End --> --}}
        {{-- </div> --}}
    </div>
@endsection
