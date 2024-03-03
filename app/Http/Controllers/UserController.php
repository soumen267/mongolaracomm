<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\UserNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getUsers = User::sortable()->where('_id', '!=', Auth::user()->id)->get();
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
            'phone' => 'required',
            'images' => 'nullable'
        ]);
        $createData = new User();
        $createData->name = $request->name;
        $createData->email = $request->email;
        $createData->phone = $request->phone;
        $createData->password = \bcrypt($request->password);
        if($request->file('image')){
            $file=$request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required'
        ]);
        $savedata = User::findOrFail($request->userid);
        $savedata->name = $request->name;
        $savedata->email = $request->email;
        $savedata->phone = $request->phone;
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
            $getUsersData = User::all();
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

    public function getData(Request $request){
        $getUsername = User::where('_id', '=', $request->userID)->pluck('email');
        $fromEmail = Auth::user()->email;
        if($getUsername){
            return response()->json([
                'fromEmail' => $fromEmail,
                'getUsername' => $getUsername,
                'status'=> 200,
                'message'=>'User received!',
            ]);
        }else{
            return response()->json([
                'status'=> 400,
                'message'=>'Something went wrong!',
            ]);
        }

    }

    public function sendMail(Request $request){
        $request->validate([
            'toname' => 'required',
            'form' => 'required',
            'subject' => 'nullable',
            'body' => 'required'
        ]);
        $getname = User::where('_id', '=', $request->emailuserid)->pluck('name');
        $data = array(
            'name'=> $getname,
            'subject' => $request->subject,
            'body' => $request->body
        );
        Mail::to($request->toname)
        ->cc($request->form)
        ->send(new UserNotify($data));
    }
    public function userOnlineStatus()
    {
        $users = User::all();
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
            else
                echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        }
    }
}
