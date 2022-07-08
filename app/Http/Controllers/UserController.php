<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Position;
use App\Models\Branch;
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
        
    //  $all_users = User::all();
    //  return response()->json($all_users);

    return view('user.index', [
        'all_users' => User::userxbranchxposition()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', [
            'positions' => Position::all(),
            'branches' => Branch::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'position_id' => 'required',
            'branch_id' => 'required'
            
        
        ]);
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->position_id = $request->position_id;
        $user->branch_id = $request->branch_id;
        $user->save();
        return redirect('users')->with('mssg','New User Successfully Created')->setStatusCode(201);
    }  catch (\Exception $e){
        $error_code = $e->errorInfo[1];
        if($error_code == 1062){
            return redirect('users/create')->with('mssg','Username is Already Registered')->setStatusCode(404);
        }
    };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('user.show',[
        'all_users' => User::finduserxbranchxposition($id)
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit', [
            'user' => User::find($id),
            'positions' => Position::all(),
            'branches' => Branch::all()
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'position_id' => 'required',
            'branch_id' => 'required'
            
        
        ]);
        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->position_id = $request->position_id;
        $user->branch_id = $request->branch_id;
        $user->save();
        return redirect('users')->with('mssg','User Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::find($id);
       $user->delete();
       return redirect('users')->with('mssg','User Successfully Deleted');

    }
}
