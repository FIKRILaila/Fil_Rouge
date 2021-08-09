<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plat;
use Illuminate\Support\Facades\auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allPost = Plat::with("user")->orderBy('plats.created_at','DESC')->get() ;
        // $role = Auth::user()->role;
        // if ($role == 'normal') {
        //     return view('chef.home',['allPost'=>$allPost]);
        //     // return view('home_client');
        // }elseif( $role == 'admin'){
        //     return view('admin_dashboard');
        // }else{
        //     return view('home_chef',['allPost'=>$allPost]);
        // }
        return view('home',['allPost'=>$allPost]);
    }
}
