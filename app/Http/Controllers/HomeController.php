<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meet;
use App\employee;
use App\NormUser;
use App\upload;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $meet = Meet::count();
        $employee = employee::count();
        $NormUser = NormUser::count();
        $upload = upload::count();
        return view('admin.index', compact('meet', 'employee', 'NormUser', 'upload'));
    }
}
