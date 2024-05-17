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
        $data = $request->validate([
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rcf',
            'website' => 'required',
        ]);
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
        $data = $request->validate([
            'clientName' => 'required|max:100|min:5',
            'phone' => 'required|min:11',
            'email' => 'required|email:rcf',
            'website' => 'required',
        ]);
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
}
