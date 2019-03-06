@extends('master')
@section('title','Đăng ký')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">

			<form action="signup" method="post" class="beta-form-checkout">
				{{csrf_field()}}
				<div class="row">
					<div class="col-sm-3"></div>
					@if ($errors->any())
    				<div class="alert alert-danger">
        			<ul>
            		@foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            		@endforeach
        			</ul>
    				</div>
					@endif
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>


						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" value="{{old('email')}}required>
						</div>

						<div class="form-block">
							<label for="fullname">Fullname*</label>
							<input type="text" name="fullname" value="{{old('fullname')}}"required>
						</div>

						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="address" value="{{old('address')}}required>
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" value="{{old('phone')}}required>
						</div>
						<div class="form-block">
							<label for="password">Password*</label>
							<input type="password" name="password" placeholder="Password ít nhất 6 ký tự"required>
						</div>
						<div class="form-block">
							<label for="re_password">Re password*</label>
							<input type="password" name="re_password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
