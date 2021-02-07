@extends('layouts.crud')

@section('content')
	{{-- Navbar --}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> User Details </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url()->previous() }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

	{{-- Show User Details --}}
    <div class="row">
		{{-- Full Name --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Full Name:</strong>
				<p>{{ $user->name }}</p>
            </div>
        </div>

		{{-- Mobile Number --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mobile Number:</strong>
				<p>{{ $user->phone }}</p>
            </div>
        </div>

		{{-- Gender --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender:</strong>
				<p>{{ $user->gender }}</p>
            </div>
        </div>

		{{-- Address --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
				<p>{{ $user->address }}</p>
            </div>
        </div>

		{{-- City --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City</strong>
				<p>{{ $user->city->name }}</p>
            </div>
        </div>

		{{-- Hobbies --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hobbies</strong>
				<ul>
					@foreach ($user->hobbies as $hobbies)
						<li>{{ $hobbies->name }}</li>
					@endforeach
				</ul>
            </div>
        </div>

		{{-- Date Created --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Created</strong>
				<p>{{ $user->created_at->format('d/m/Y') }} </p>
            </div>
        </div>
    </div>
@endsection