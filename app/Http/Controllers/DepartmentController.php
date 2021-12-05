<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class DepartmentController extends Controller
{
    public function department_1(){
        
        $department_1 = DB::table('uploads')->where('select_department', '=', 'human-resource-and-administration')->get();
        return view('norm.department_1', compact('department_1'));
    }

    public function download_1($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    }

    public function department_2(){
        
        $department_2 = DB::table('uploads')->where('select_department', '=', 'urban-planning-and-environment')->get();
        return view('norm.department_2', compact('department_2'));
    }
    public function download_2($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    }
    public function department_3(){

        $department_3 = DB::table('uploads')->where('select_department', '=', 'finance-and-trade')->get();
        return view('norm.department_3', compact('department_3'));
    }
    public function download_3($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    }
    public function department_4(){

        $department_4 = DB::table('uploads')->where('select_department', '=', 'environment-and-sanitation')->get();
        return view('norm.department_4', compact('department_4'));
    }

    public function download_4($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    }
    public function department_5(){

        $department_5 = DB::table('uploads')->where('select_department', '=', 'education')->get();
        return view('norm.department_5', compact('department_5'));
    }


    public function download_5($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    }

    
    public function department_6(){

        $department_6 = DB::table('uploads')->where('select_department', '=', 'community-and-welfare')->get();
        return view('norm.department_6', compact('department_6'));
    }

    public function download_6($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    }

    
    public function department_7(){

        $department_7 = DB::table('uploads')->where('select_department', '=', 'agricultre-and-cooperative')->get();
        return view('norm.department_7', compact('department_7'));
    }

    public function download_7($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    }
    
    public function department_8(){

        $department_8 = DB::table('uploads')->where('select_department', '=', 'livestock-and-fisheries')->get();
        return view('norm.department_8', compact('department_8'));
    }

    public function download_8($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    }

    public function department_9(){

        $department_9 = DB::table('uploads')->where('select_department', '=', 'works')->get();
        return view('norm.department_9', compact('department_9'));
    }

    public function download_9($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    } 

    public function department_10(){

        $department_10 = DB::table('uploads')->where('select_department', '=', 'health')->get();
        return view('norm.department_10', compact('department_10'));
    }

    public function download_10($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    }

    public function department_11(){

        $department_11 = DB::table('uploads')->where('select_department', '=', 'water')->get();
        return view('norm.department_11', compact('department_11'));
    }

    public function download_11($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    }

    public function department_12(){

        $department_12 = DB::table('uploads')->where('select_department', '=', 'planning-statistics-and-monitoring')->get();
        return view('norm.department_12', compact('department_12'));
    }

    public function download_12($id)
    {

        $entry = upload::findorfail($id);
        $pathToFile=storage_path()."/app/public/uploads/".$entry->file;
        return response()->download($pathToFile);  

    }
  
}
