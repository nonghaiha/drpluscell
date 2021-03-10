@extends('frontend.layout.master')
@section('title','Create Accout')
@section('main')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-last dashboard-content">
                <h2>Create New Account Information</h2>

                <form action="{{route('home.account')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group required-field">
                        <label for="acc-name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
                        @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('usename') }}</p>
                        @endif
                    </div>
                    <div class="form-group required-field">
                        <label for="acc-email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required value="{{old('email')}}"> 
                        @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('usename') }}</p>
                        @endif
                    </div><!-- End .form-group -->
                    <div class="form-group required-field">
                        <label for="acc-phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required value="{{old('phone')}}">
                        @if ($errors->has('phone'))
                        <p class="text-danger">{{ $errors->first('usename') }}</p>
                        @endif
                    </div>
                    <div class="form-group required-field">
                        <label for="acc-usename">User Name</label>
                        <input type="text" class="form-control" id="use_name" name="use_name" required value="{{old('use_name')}}">
                        @if ($errors->has('use_name'))
                        <p class="text-danger">{{ $errors->first('use_name') }}</p>
                        @endif
                    </div>
                    <div class="form-group required-field">
                        <label for="acc-address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required value="{{old('address')}}">
                        @if ($errors->has('address'))
                        <p class="text-danger">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                    <div class="form-group required-field">
                        <label for="acc-password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div><!-- End .form-group -->
                    <div class="form-group required-field">
                        <label for="acc-confirm">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        @if ($errors->has('confirm_password'))
                        <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
                        @endif
                    </div>
                    <div class="mb-2"></div><!-- margin -->

                    

                    <div class="required text-right">* Required Field</div>
                    <div class="form-footer">
                        <a href="{{route('frontend.layout')}}"><i class="icon-angle-double-left"></i>Back</a>

                        <div class="form-footer-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div><!-- End .form-footer -->
                </form>
            </div><!-- End .col-lg-9 -->

            <aside class="sidebar col-lg-3">
                <div class="widget widget-dashboard">
                    <h3 class="widget-title">My Account</h3>

                    <ul class="list">
                        <li class="active"><a href="#">Account Dashboard</a></li>
                        <li><a href="#">Account Information</a></li>
                    </ul>
                </div><!-- End .widget -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
</main><!-- End .main -->
@stop