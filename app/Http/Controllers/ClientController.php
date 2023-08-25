<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function register(){
        return view('register_client');
    }

    public function store(Request $request)    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
        ]);

        $client = Client::create([
            'name' => $request->name,
            'address' => $request->address,
            'neighborhood' =>  $request->neighborhood,
            'zip_code' =>  $request->zip_code,
            'city' =>  $request->city,
            'state' =>  $request->state,
        ]);

        return redirect()->route('client.list')->with('client-create-success', '');
    }

    public function listClient(){
        $clients = Client::get();
        return view('list_client', ['clients' => $clients]);
    }

    public function delete($id){
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('client.list')->with('client-delete-success', '');
    }

    public function edit($id){
        $client = Client::find($id);
        return view('edit_client', ['client' => $client]);
    }

    public function update(Request $request)    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
        ]);

        $client = Client::find($request->id);

        $client->update([
            'name' => $request->name,
            'address' => $request->address,
            'neighborhood' =>  $request->neighborhood,
            'zip_code' =>  $request->zip_code,
            'city' =>  $request->city,
            'state' =>  $request->state,
        ]);

        return redirect()->route('client.list')->with('client-edit-success', '');
    }
}
