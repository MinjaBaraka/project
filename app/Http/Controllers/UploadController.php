<?php

namespace App\Http\Controllers;

use App\upload;
use Illuminate\Http\Request;

class UploadController extends Controller
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
        $file = Upload::all();
        return view('admin.upload', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.upload');
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
            'discription' => 'required',
            'select_department' => 'required',
            'file' => 'required|mimes:pdf,txt|max:2048'
        ]);

        // dd($$request->file);
        $file = time().'.'.$request->file->extension();  
        $request->file->move(storage_path('app/public/uploads/'), $file);

      
        // save the data 

        $save = new Upload;
        $save -> discription = request()->input('discription');
        $save -> select_department = request()->input('select_department');
        $save -> file = $file;
        $save -> save();

        return redirect('upload')->with('success', 'File document uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show(upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function uploadEdit($id)
    {
        $id = Upload::findorfail($id);
        // dd($id);
        return view('admin.uploadEdit')->with('id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request, [
            'discription' => 'required',
            'select_department' => 'required',
            'file' => 'required|mimes:pdf,txt|max:2048'
        ]);

        $file = time().'.'.$request->file->extension();  
        // dd($file);
        $request->file->move(storage_path('app/storage/public/'), $file);
            
            
        // save the data 

        $save = Upload::findorfail($id);
        $save -> discription = request()->input('discription');
        $save -> select_department = request()->input('select_department');
        $save -> file = $file;
        $save -> save();

        return redirect('upload')->with('success', 'File updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = upload::findorfail($id);

        $id -> delete();

        return redirect('/upload')->with('success', 'Uploaded Files are Deleted successfully');
    }
}
