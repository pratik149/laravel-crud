@extends('layouts.crud')

@section('content')
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
    <form action="{{ route('users.store') }}" method="POST" >
        @csrf
        <div class="row">

			{{-- OLD FORM --}}
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Full Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:50px" name="introduction"
                        placeholder="description"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" name="price" class="form-control" placeholder="Put the price">
                </div>
            </div> --}}

			{{-- NEW FORM --}}
			<div class="col-xs-12 col-sm-12 col-md-12">
				{{-- Full Name --}}
				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

					<div class="col-md-6">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

						@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>
				
				{{-- Mobile Number --}}
				<div class="form-group row">
					<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

					<div class="col-md-6">
						<input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

						@error('phone')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>

				{{-- Address --}}
				<div class="form-group row">
					<label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

					<div class="col-md-6">
						<textarea id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"></textarea>

						@error('address')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
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
						{{-- <input id="gender" type="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required autocomplete="new-gender"> --}}
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
							<label class="form-check-label" for="inlineRadio1">Male</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
							<label class="form-check-label" for="inlineRadio2">Female</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="inlineRadio3" value="other">
							<label class="form-check-label" for="inlineRadio3">Other</label>
						</div>
						@error('gender')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
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

						@error('hobbies')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>

				{{-- Password --}}
				<div class="form-group row">
					<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

					<div class="col-md-6">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
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