@extends('web.my_account')
@section('content_tab')
    <div class="col-lg-9 col-md-8">
        <div class="myaccount-content">
            <h3>Detalles de la cuenta</h3>
            <div class="account-details-form">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="first-name" class="required">First Name</label>
                                <input type="text" id="first-name" placeholder="First Name" />
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
                            <input type="password" id="current-pwd" placeholder="Current Password" />
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="new-pwd" class="required">New
                                        Password</label>
                                    <input type="password" id="new-pwd" placeholder="New Password" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="confirm-pwd" class="required">Confirm
                                        Password</label>
                                    <input type="password" id="confirm-pwd" placeholder="Confirm Password" />
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
    </div>
@endsection
