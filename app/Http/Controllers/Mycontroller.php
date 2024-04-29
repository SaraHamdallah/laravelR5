<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mycontroller extends Controller
{
    public function showForm(){
        return view('form1');
    }

    public function receiveForm(Request $request){
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        return redirect()->route('showdata',['fname'=>$fname, 'lname'=>$lname]);
    }

    public function showData(Request $request){
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        return view('showdata', compact('fname', 'lname'));
    }

}
