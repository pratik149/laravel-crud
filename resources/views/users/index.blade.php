@extends('layouts.crud')

@section('content')
	{{-- Navbar --}}
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Users</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}" title="Create a User">
					<i class="fas fa-plus-circle"></i>
				</a>
            </div>
        </div>
    </div>

	{{-- Display Success Messages If Any --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

	{{-- Table of List of Users --}}
    <table class="table table-bordered table-responsive-lg">

		{{-- Table Headings --}}
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Address</th>
            <th>City</th>
            <th>Hobbies</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>

		{{-- User Table Records --}}
        @foreach ($users as $user)
            <tr id="user-{{$user->id}}">

                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->city->name }}</td>
                <td>{{ $user->hobbies->pluck('name') }}</td>
                <td>{{ $user->created_at->format('d/m/Y') }}</td>

				{{-- Actions --}}
                <td>
					{{-- Show User Button --}}
					<a href="/users/{{$user->id}}" title="show">
						<i class="fas fa-eye text-success  fa-lg"></i>
					</a>
					{{-- Edit User Button --}}
					<a href="/users/{{$user->id}}/edit">
						<i class="fas fa-edit  fa-lg"></i>
					</a>

					{{-- Delete User Button (AJAX) --}}
					<button type="submit" title="delete" style="border: none; background-color:transparent;" onclick="deleteUser({!! $user->id !!})">
						<i class="fas fa-trash fa-lg text-danger"></i>
					</button>
                </td>
            </tr>
        @endforeach
    </table>

	{{-- Pagination Links --}}
    {!! $users->links() !!}

@endsection

<script>
	// AJAX method to Delete User
	function deleteUser($id) {
        axios.delete('/users/'+$id)
            .then((response) => {               
				let userTableRecord = document.getElementById("user-" + $id);
				userTableRecord.parentNode.removeChild(userTableRecord);
				console.log(response)
            } catch(error) => {
				console.log(error)
            });
       }
</script>