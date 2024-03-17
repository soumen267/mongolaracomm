<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $getClients = Client::all();
        return view('clients.index', compact('getClients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'owner' => 'required',
            'pending_project' => 'required',
            'invoices' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'status' => 'required'
        ]);
        $createClient = new Client();
        $createClient->company = $request->company;
        $createClient->owner = $request->owner;
        $createClient->pending_project = $request->pending_project;
        $createClient->invoices = $request->invoices;
        $createClient->tags = $request->tags;
        $createClient->category = $request->category;
        $createClient->status = $request->status;
        $createClient->save();
        $getClientsData = Client::all();
        return response()->json([
            'getClientsData' => $getClientsData,
            'status'=> 200,
            'message'=>'Client added successfully!',
        ]);
    }

    public function edit($id)
    {
        $editClient = Client::findOrFail($id);
        return response()->json(['getClientsData'=> $editClient]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'owner' => 'required',
            'pending_project' => 'required',
            'invoices' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'status' => 'required'
        ]);
        $createClient = Client::findOrFail($request->userid);
        $createClient->company = $request->company;
        $createClient->owner = $request->owner;
        $createClient->pending_project = $request->pending_project;
        $createClient->invoices = $request->invoices;
        $createClient->tags = $request->tags;
        $createClient->category = $request->category;
        $createClient->status = $request->status;
        $createClient->update();
        $getClientsData = Client::all();
        return response()->json([
            'getClientsData' => $getClientsData,
            'status'=> 200,
            'message'=>'Client updated successfully!',
        ]);
    }

    public function destroy($id)
    {
        $deleteUser = Client::findOrFail($id);
        if($deleteUser){
            $deleteUser->delete();
            $getUsersData = Client::all();
            return response()->json([
                'getUsersData' => $getUsersData,
                'status'=> 200,
                'message'=>'User deleted successfully!',
            ]);
        }else{
            return response()->json([
                'status'=> 400,
                'message'=>'Something went wrong!',
            ]);
        }
    }

}
