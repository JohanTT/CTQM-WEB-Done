<?php

namespace App\Http\Controllers;

use App\Models\Ratings;
use App\Models\PacksDetail;
use App\Models\UserPack;
use App\Models\Users;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function ratingStar(Request $request, $pack)
    {
        if (session()->has('username')) {
            $user = Users::where('nick_name', '=', session('username'))->get()->toArray();
            // check kiểm tra người dùng có mua gói hay chưa
            $check = UserPack::where('pack_id', '=', $pack)->where('user_id', '=', $user[0]['id'])->get()->toArray();
            if ($check == NULL) {
                return redirect()->route('pack.open', $pack)->with('ratingFailed',"You have to buy to rating");
            }
            if ($check != NULL) {
                // Kiểm tra đã có đánh giá chưa, nếu rồi thì update lại thôi
                $ratingCheck = Ratings::where('user_id', '=', $user[0]['id'])->where('pack_id', '=', $pack)->get()->toArray();
                // dd($ratingCheck);
                if ($ratingCheck == NULL) {
                    try{
                        Ratings::insert([
                            'user_id' => $user[0]['id'],
                            'pack_id' => $pack,
                            'star' => (float)$request->input('rating'),
                        ]);
                        return redirect()->route('pack.open', $pack)->with('ratingSuccessed', "Thank's you");
                    }
                    catch(Exception $e){
                        return redirect()->route('pack.open', $pack)->with('ratingFailed', "Operation failed");
                    }
                }
                else {
                    $update = Ratings::where('user_id', '=', $user[0]['id'])->where('pack_id', '=', $pack)->update(['star' => (float)$request->input('rating')]);
                    return redirect()->route('pack.open', $pack)->with('ratingSuccessed', "We have update your Rating, Thank's you");
                }
            }
        } else return redirect()->route('pack.open', $pack)->with('ratingFailed',"You have to log in");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  \App\Models\Ratings  $ratings
     * @return \Illuminate\Http\Response
     */
    public function show(Ratings $ratings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ratings  $ratings
     * @return \Illuminate\Http\Response
     */
    public function edit(Ratings $ratings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ratings  $ratings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ratings $ratings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ratings  $ratings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ratings $ratings)
    {
        //
    }
}
