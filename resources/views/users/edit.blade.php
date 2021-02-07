@extends('layouts.crud')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
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

    <form action="{{ route('users.update', $user) }}" method="POST" >
        @csrf
		@method('PUT')
        <div class="row">

			<div class="col-xs-12 col-sm-12 col-md-12">
				{{-- Full Name --}}
				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

					<div class="col-md-6">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? '' }}" required autocomplete="name" autofocus>
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
						<input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone ?? '' }}" required autocomplete="phone">
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
						<textarea id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address">{{ $user->address ?? '' }}</textarea>
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
								@if ($city->id === $user->city->id)
									<option value="{{ $city->id }}" selected>{{ $city->name }}</option>
								@else
									<option value="{{ $city->id }}" >{{ $city->name }}</option>
								@endif
							@endforeach
						</select>
					</div>
				</div>

				{{-- Gender --}}
				<div class="form-group row">
					<label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

					<div class="col-md-6">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="male" value="male" @if ($user->gender == "male") checked @endif>
							<label class="form-check-label" for="male">Male</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="female" value="female" @if ($user->gender == "female") checked @endif>
							<label class="form-check-label" for="female">Female</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="gender" id="other" value="other" @if ($user->gender == "other") checked @endif>
							<label class="form-check-label" for="other">Other</label>
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
							@if ( in_array($hobby->id, $user->hobbies->pluck('id')->toArray()) )
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" name="hobbies[]" id="hobbies" value="{{ $hobby->id }}" checked>
									<label class="form-check-label" for="hobbies">{{ $hobby->name }}</label>
								</div>
							@else
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" name="hobbies[]" id="hobbies" value="{{ $hobby->id }}">
									<label class="form-check-label" for="hobbies">{{ $hobby->name }}</label>
								</div>
							@endif
						@endforeach

						@error('hobbies')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
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