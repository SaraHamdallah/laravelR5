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
/*sessions
*/
    public function val(){
        session()->put('test', 'First session');  //for many
        return 'session created';
    }

    public function fval(){
        session()->flash('test1', 'First session1');  //for onetime
        return 'session created';
    }

    public function restval(){
        return 'my session is: ' . session('test1') ;
    }

    public function delval(){
        session()->forget('test');  //for one
        return 'my session is removed';
    }

    // public function delaval(){
    //     session()->flush();  //for all
    //     return 'All sessions is removed';
    // }

}
