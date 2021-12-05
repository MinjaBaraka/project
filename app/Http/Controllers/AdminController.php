<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\NormUser;

class AdminController extends Controller
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
 
    public function invoice(){
        $file = NormUser::all();
        return view('admin.invoiceA', compact('file'));
    }

    
}
