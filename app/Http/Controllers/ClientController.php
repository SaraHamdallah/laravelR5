<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class ClientController extends Controller
{
    private $columns =['clientName', 'phone', 'email','website'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = DB::table('clients')->get();
        // $clients = Client::get();
         return view('clients', compact('clients')); #return view('name of view', compact('name of variable'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addClient'); #name of the form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        #to insert data
        // $client = new Client();
        // $client->clientName = $request->clientName;
        // $client->phone = $request->phone;
        // $client->email = $request->email;
        // $client->website = $request->website;
        // $client->save();
        // return 'Inserted succ3essfully';
        //return dd($request->all());  #to check data done array
       $messages = $this->errMsg();
    
        $data = $request->validate([
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rcf',
            'website' => 'required',
            'city' => 'required|max:30',
            'image' => 'required',

        ],$messages);
        #method is used to check if a file upload exists in the request
        //if ($request->hasFile('image')) {
        $imgExt = $request->image->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        $path = 'assets/images';
        $request->image->move($path, $fileName);

        $data['image'] = $fileName;
    //}else {
    # Handle the case where no file was uploaded
    # For example, you might want to set a default image or return an error response
    //}
        $data['active'] = isset($request->active); #laravel wiil transfer if is set check boxx =1 and non = 0
        Client::create($data);
        return redirect('clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$client = DB::select('select * from clients where id = ?',[$id]);
        $client = Client::findOrFail($id); #search for data id
        return view('showClient', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) 
    {
        #to show the form and the data of id
        $client = Client::findOrFail($id);
        return view('editClient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->errMsg();
        $data = $request->validate([
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rcf',
            'website' => 'required',
            'city' => 'required|max:30',
        ],$messages);
        Client::where('id', $id)->update($data);
        return redirect('clients');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Client::where('id', $id)->delete();
        return redirect('clients');
    }
    /**
     * trash
     */
    public function trash()
    {
        $trashed = Client::onlyTrashed()->get();
        return view('trashClient', compact('trashed'));
    }
    /**
     * Restore
     */
    public function restore(string $id)
    {
        Client::where('id', $id)->restore();
        return redirect('clients');
    }
    /**
     * Force Delete
     */
    public function forceDelete(Request $request)
    {
        $id = $request->id;
        Client::where('id', $id)->forceDelete();
        return redirect('trashClient');
    }
    /**
     * error custom message
     */
    public function errMsg(){
        return [
            'clientName.required' => 'name is missed',
            'clientName.min' => 'the length is less than 5',
            'phone.min' => 'the length is less than 11',
            'email.email:rcf' => 'please insert a valid email',
            'city.required' => 'please select a city',            

        ];
    }
}