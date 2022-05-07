<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\UserPack;
use App\Models\Syllabus;
use App\Models\VideoItem;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = Users::search()->paginate(15);
        return view('admin.users.index', compact('data'));
    }

    public function logIn()
    {
        return view('login.login');
    }

    public function dangnhap(Request $req){
        $username = $req->input('username');
        $password = $req->input('password');
        $check = Users::where('nick_name', '=', $username)->where('password', '=', $password)->get()->toArray();
        if($check != NULL) {
            $data = $req->input();
            $req->session()->put('username', $data['username']);
    
            return redirect('/home');
        }
        else {
            return redirect('log-in')->with('failed', "fail");
        }
    }

    public function logOut() {
        if (session()->has('username')) {
            session()->pull('username');
        }
        return redirect('/home');
    }

    public function signUp()
    {
        return view('login.signup');
    }

    public function proFile()
    {
        if (session()->has('username')) {
            $user = session('username');
            $data = Users::where('nick_name', '=', $user)->get();
            $pack = UserPack::where('user_id', '=', $data->toArray()[0]['id'])->get();
            return view('profile.profile', compact('data', 'pack'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->input('fname') != NULL && $request->input('username') != NULL && $request->input('password') != NULL) {
            try{
                Users::insert([
                    'user_name' => $request->input('fname'),
                    'nick_name' => $request->input('username'),
                    'password' => $request->input('password'),
                    'cash' => 0,
                    'score' => 0
                ]);
                return redirect('sign-up')->with('status',"Create account successfully");
            }
            catch(Exception $e){
                return redirect('sign-up')->with('failed',"Create account failed");
            }
        } else return redirect('sign-up')->with('failed',"Fill everything to create account");
    }

    public function updateProfile(Request $request) {
        if ($request->input('fname') != NULL || $request->input('username') != NULL || $request->input('password') != NULL) {
            $user = session('username');
            $data = Users::where('nick_name', '=', $user)->get()->toArray();
            if ($request->input('fname') != NULL) $username = $request->input('fname');
            else $username = $data[0]['user_name'];
            if ($request->input('username') != NULL) $nickname = $request->input('username');
            else $nickname = $data[0]['nick_name'];
            if ($request->input('password') != NULL) $password = $request->input('password');
            else $password = $data[0]['password'];
            try{
                Users::where('nick_name', '=', $user)->update([
                    'user_name' => $username,
                    'nick_name' => $nickname,
                    'password' => $password
                ]);
                return redirect('/profileUser')->with('status',"Update successfully");
            }
            catch(Exception $e){
                return redirect('/profileUser')->with('failed',"Operation failed");
            }
        }
        else return redirect('/profileUser')->with('failed',"Put something to Update");
    }

    public function updateCash(Request $request) {
        if ($request->input('cash') != NULL) {
            $user = session('username');
            $data = Users::where('nick_name', '=', $user)->get()->toArray();
            try{
                Users::where('nick_name', '=', $user)->update([
                    'cash' => $request->input('cash') + $data[0]['cash']
                ]);
                return redirect('/profileUser')->with('status',"Money had add to your packed");
            }
            catch(Exception $e){
                return redirect('/profileUser')->with('failed',"Operation failed");
            }
        }
        else return redirect('/profileUser')->with('failed',"Put something in your wallet");
    }

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
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}
