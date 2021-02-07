<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\City;
use App\Models\Hobby;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('city', 'hobbies')->latest()->paginate(10);

        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$cities = City::orderBy('name')->get();
		$hobbies = Hobby::orderBy('created_at')->get();

        return view('users.create', compact('cities', 'hobbies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
            'name' => 'required|string',
            'phone' => 'required|digits_between:7,15',
			'gender' => 'required|string',
            'address' => 'required|string',
            'city' => 'required',
            'hobbies' => 'required|array',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;
		$user->city()->associate($request->city);
        $user->password = Hash::make($request->password);
        $user->save();
        $user->hobbies()->sync($request->hobbies);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {	
		$cities = City::orderBy('name')->get();
		$hobbies = Hobby::orderBy('created_at')->get();

		return view('users.edit', compact('user', 'cities', 'hobbies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|digits_between:7,15',
			'gender' => 'required|string',
            'address' => 'required|string',
            'city' => 'required',
            'hobbies' => 'required|array'
		]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;
		$user->city()->associate($request->city);
        $user->save();
        $user->hobbies()->sync($request->hobbies);

        // $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $success = $user->delete();

		$response = [
			"success" => $success,
			"message" => "User deleted successfully."
		];

		return response()->json($response);
    }
}
