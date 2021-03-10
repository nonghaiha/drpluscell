@extends('frontend.layout.master')
@section('title','Checkout')
@section('main')
<div id="new-checkout-address" class="show text-center">
	<form action="{{route('checkout')}}" method="POST" role="form">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group required-field">
			<label> Name </label>
			<input type="text" class="form-control" id="name" name="name" required style="margin: 0 auto">
		</div>
		<div class="form-group required-field">
			<label> Email </label>
			<input type="email" class="form-control" id="email" name="email" style="margin: 0 auto">
		</div>
		<div class="form-group required-field">
			<label> Phone </label>
			<input type="text" class="form-control" id="phone" name="phone" required style="margin: 0 auto">
		</div>
		<div class="form-group required-field">
			<label> Address </label>
			<input type="text" class="form-control" id="address" name="address" required style="margin: 0 auto">
		</div>
		<div class="clearfix text-center">
			<button type="submit" class="btn btn-primary" href="#">Place Order</button>
		</div
	</form>
</div><!-- End .clearfix -->
<br>
</div><!-- End .checkout-payment -->                                
@stop