<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
    public function index() {
        $users = User::all();
        $users_addresses = User::with('address')->get();
        $users_addresses_orders = User::with(['address', 'orders'])->get();
        $products_users = User::with(['products'])->get();
        // dd($products_users);
        return view('home')
        ->with('users', $users)
        ->with('users_addresses', $users_addresses)
        ->with('users_addresses_orders', $users_addresses_orders)
        ->with('products_users', $products_users);
    }
}
