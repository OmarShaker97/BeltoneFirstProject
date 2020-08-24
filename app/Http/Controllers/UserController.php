<?php

namespace App\Http\Controllers;
;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Users;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function getUsers(){
        $users = Users::all();
        return view('user_test', compact('users'));
    }

    public function insert(Request $request) {

        $result = Users::create(request()->all());
        
        // $name = $request->input('name');
        // $email = $request->input('email');
        // $phone = $request->input('phone');
        // DB::insert('insert into users (name,email,phone) values(?,?,?)',[$name,$email,$phone]);
         $users = Users::all();

        return view('user_test', compact('users'));
     }

     public function destroy($id) {
         Users::findOrFail($id)->delete();
        // DB::delete('delete from users where id = ?',[$id]);
         $users = Users::all();
        return view('user_test', compact('users'));
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
