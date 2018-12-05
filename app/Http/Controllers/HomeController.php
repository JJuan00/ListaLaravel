<?php

namespace App\Http\Controllers;

use App\UsersNota;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!isset(Auth::user()->email)){
            return Redirect::to('/');
        }
        $notas = UsersNota::all()->where('user', Auth::user()->email);
        // return view('home');
        return \View::make('home', compact('notas'));
    }

    public function log()
    {
        Auth::logout();
        // Cierra todas las sesiones activas
    }
}
