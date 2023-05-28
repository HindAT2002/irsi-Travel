<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trip;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.User.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trips = Trip::all(); // Assuming you have a `Trip` model and a corresponding trips table
        // Other code...
    
        return view('admin.User.create', compact('trips'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'nullable',
            'adress' => 'nullable',
            'email' => 'required',
            'password' => 'required',
        ]);
        

        $user = new User();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->adress = $request->input('adress');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $users = User::all();

        return view('admin.User.index')->with([
            'success' => 'User added successfully',
            'users' => $users
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.User.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.User.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'nullable',
            'adress' => 'nullable',
            'email' => 'required',
            'password' => 'required',
        ]);
        

        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->adress = $request->input('adress');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $users = User::all();

        return view('admin.User.index')->with([
            'success' => 'User updated successfully',
            'users' => $users
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $users = User::all();

        return view('admin.User.index')->with([
            'success' => 'User deleted successfully',
            'users' => $users
        ]);
    }
}
