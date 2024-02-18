<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getUsers = User::all();
        return view("users.index", compact("getUsers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'images' => 'nullable'
        ]);
        $createData = new User();
        $createData->name = $request->name;
        $createData->email = $request->email;
        $createData->password = \bcrypt($request->password);
        if($request->file('image')){
            $file=$request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            //$file->move(public_path('public/images/users'), $filename);
            $file->storeAs('public/images/users', $filename);
            $createData->images = $filename;
        }
        $createData->save();
        $getUsersData = User::all();
        return response()->json([
            'getUsersData' => $getUsersData,
            'status'=> 200,
            'message'=>'User created successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editUser = User::findOrFail($id);
        return response()->json($editUser);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $savedata = User::findOrFail($request->userid);
        $savedata->name = $request->name;
        $savedata->email = $request->email;
        if($request->file('image')){
            $file=$request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->storeAs('public/images/users', $filename);
            $savedata->image = $filename;
        }
        $savedata->update();
        $getUsersData = User::all();
        return response()->json([
            'getUsersData' => $getUsersData,
            'status'=> 200,
            'message'=>'User updated successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUser = User::findOrFail($id);
        if($deleteUser){
            $deleteUser->delete();
            return redirect(route('users.index'))->with('success', 'User deleted successfully.');
        }else{
            return redirect(route('users.index'))->with('error', 'Something went wrong.');
        }
    }
}
