<?php

namespace App\Http\Controllers;

use App\Models\instructorRating;
use App\Models\PacksDetail;
use App\Models\UserPack;
use App\Models\Users;
use Illuminate\Http\Request;

class instructorRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function ratingInsStar(Request $request, $id)
    {
        if (session()->has('username')) {
            $user = Users::where('nick_name', '=', session('username'))->get()->toArray();
            // check kiểm tra người dùng có mua gói hay chưa
            $pack = PacksDetail::where('instructor_id', '=', '1')->get();
            $userCheck = UserPack::where('pack_id', '=', $pack->toArray()[0]['id'])->where('user_id', '=', $user[0]['id'])->get()->toArray();
            $check = FALSE;
            // Cho biến true false để kiểm tra chỉ cần trong tài khoản người đó chỉ cần 1 pack đã được đăng ký
            if ($userCheck == NULL) {
                for ($i = 1; $i < count($pack); $i++) {
                    if(array_push($userCheck, UserPack::where('pack_id', '=', $pack->toArray()[$i]['id'])->where('user_id', '=', $user[0]['id'])->get()->toArray()) != 0) {
                        $check = TRUE;
                        break;
                    } 
                }
            }
            if ($check == FALSE) {
                return redirect()->route('instructor.open', $id)->with('ratingFailed',"You have to buy instructor packs to rating");
            }
            if ($check == TRUE) {
                // Kiểm tra đã có đánh giá chưa, nếu rồi thì update lại thôi
                $ratingCheck = instructorRating::where('user_id', '=', $user[0]['id'])->where('instructor_id', '=', $id)->get()->toArray();
                // dd($ratingCheck);
                if ($ratingCheck == NULL) {
                    try{
                        instructorRating::insert([
                            'instructor_id' => $id,
                            'user_id' => $user[0]['id'],
                            'star' => (float)$request->input('rating'),
                        ]);
                        return redirect()->route('instructor.open', $id)->with('ratingSuccessed', "Thank's you");
                    }
                    catch(Exception $e){
                        return redirect()->route('instructor.open', $id)->with('ratingFailed', "Operation failed");
                    }
                }
                else {
                    $update = instructorRating::where('user_id', '=', $user[0]['id'])->where('instructor_id', '=', $id)->update(['star' => (float)$request->input('rating')]);
                    return redirect()->route('instructor.open', $id)->with('ratingSuccessed', "We have update your Rating, Thank's you");
                }
            }
        } else return redirect()->route('instructor.open', $id)->with('ratingFailed',"You have to log in");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\instructorRating  $instructorRating
     * @return \Illuminate\Http\Response
     */
    public function show(instructorRating $instructorRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\instructorRating  $instructorRating
     * @return \Illuminate\Http\Response
     */
    public function edit(instructorRating $instructorRating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\instructorRating  $instructorRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, instructorRating $instructorRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\instructorRating  $instructorRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(instructorRating $instructorRating)
    {
        //
    }
}
