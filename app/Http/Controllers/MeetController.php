<?php

namespace App\Http\Controllers;

use App\Meet;
use Illuminate\Http\Request;
use App\Mail;

class MeetController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $fechi = Meet::all();
        return view('admin.formA', compact('fechi'));
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form(){

        $fechi = Meet::all();
        return view('admin.formA', compact('fechi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'text' => 'required',
            'message' => 'required',
            'date_and_time' => 'required',
            'select_department' => 'required'
        ]);

        // save the data 

        $save = new Meet;
        $save -> text = request()->input('text');
        $save -> message = request()->input('message');
        $save -> date_and_time = request()->input('date_and_time');
        $save -> select_department = request()->input('select_department');
        $save -> save();

        // Mail::to($request->user())->send(new WelcomeMail);
        return redirect('/formulation')->with('success', 'Meeting created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function show(Meet $meet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Meet::findorfail($id);
        
        return view('admin.edit')->with('id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'text' => 'required',
            'message' => 'required',
            'date_and_time' => 'required',
            'select_department' => 'required'
        ]);

        // save the data 

        $save =  Meet::findorfail($id);
        $save -> text = request()->input('text');
        $save -> message = request()->input('message');
        $save -> date_and_time = request()->input('date_and_time');
        $save -> select_department = request()->input('select_department');
        $save -> save();

        return redirect('/formulation')->with('success', 'Meeting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Meet::findorfail($id);

        $id -> delete();

        return redirect('/formulation')->with('success', 'Meeting Deleted successfully');
    }
}
