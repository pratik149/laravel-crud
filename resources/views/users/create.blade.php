@extends('layouts.crud')

@section('content')
	{{-- Navbar --}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url()->previous() }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

	{{-- Display Errors If Any--}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

	{{-- Create User Form --}}
    <form action="{{ route('users.store') }}" method="POST" >
        @csrf
        <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				{{-- Full Name --}}
				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
					<div class="col-md-6">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
					</div>
				</div>
				
				{{-- Mobile Number --}}
				<div class="form-group row">
					<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>
					<div class="col-md-6">
						<input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
					</div>
				</div>

				{{-- Address --}}
				<div class="form-group row">
					<label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
					<div class="col-md-6">
						<textarea id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"></textarea>
					</div>
				</div>

				{{-- City --}}
				<div class="form-group row">
					<label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
					<div class="col-md-6">
						<select class="form-control" id="city" name="city" required>
							@foreach ($cities as $city)
								<option value="{{ $city->id }}">{{ $city->name }}</option>
							@endforeach
						</select>
					</div>
				</div>

				{{-- Gender --}}
				<div class="form-group row">
					<label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
					<div class="col-md-6">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="maleRadio" value="male">
							<label class="form-check-label" for="maleRadio">Male</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="femaleRadio" value="female">
							<label class="form-check-label" for="femaleRadio">Female</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="otherRadio" value="other">
							<label class="form-check-label" for="otherRadio">Other</label>
						</div>
					</div>
				</div>

				{{-- Hobbies --}}
				<div class="form-group row">
					<label for="hobbies" class="col-md-4 col-form-label text-md-right">{{ __('Hobbies') }}</label>
					<div class="col-md-6">
						@foreach ($hobbies as $hobby)
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="hobbies[]" id="hobbies" value="{{ $hobby->id }}">
								<label class="form-check-label" for="hobbies">{{ $hobby->name }}</label>
							</div>
						@endforeach
					</div>
				</div>

				{{-- Password --}}
				<div class="form-group row">
					<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
					<div class="col-md-6">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
					</div>
				</div>

				{{-- Password Confirmation --}}
				<div class="form-group row">
					<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
					<div class="col-md-6">
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
					</div>
				</div>

				{{-- Submit Button --}}
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
        </div>

    </form>
@endsection