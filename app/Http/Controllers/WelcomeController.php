<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Trip;
class WelcomeController extends Controller
{
    public function home(){
        
        $trips=Trip::get();
        return view('pages.index')->with('trips',$trips);
    }
    public function page(){
        return view('pages.index');
    }
    public function service(){ 
        $trips=Trip::get();
        $users = DB::table('users')
                ->where('id', Auth::id())
                ->get();
       return view('pages.services')->with('trips',$trips)->with('users',$users);
    }
    public function show($id){ 
        $trip = DB::table('trips')
                    ->where('id', $id)
                    ->first();
                    $users = DB::table('users')
                    ->where('id', Auth::id())
                    ->get();
    
        return view('pages.show')->with('trip', $trip)->with('users', $users);
    }
    

    public function redirect(){
    if (Auth::id()) {
        if (Auth::user()->typeuser == '0') {
            $users = DB::table('users')
                ->where('id', Auth::id())
                ->get();
                
        $trips=Trip::get();
            return view('welcome')->with('users', $users)->with('trips', $trips);
        } else {
            return view('admin.pages.home');
        }
    } else {
        return redirect()->back();
    }
}

   
}
