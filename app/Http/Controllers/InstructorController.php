<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\PacksDetail;
use App\Models\Users;
use App\Models\instructorRating;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showInstructor($id)
    {
        $star = 0;
        $data = Instructor::where('id', '=', $id)->get();
        $pack = PacksDetail::where('instructor_id', '=', $id)->get();
        $total = count($pack);
        $star = instructorRating::where('instructor_id', '=', $id)->get()->avg('star');
        $userStar = -1;
        if ($star == NULL) $star = 0;
        if (session()->has('username')) {
            $user = Users::where('nick_name', '=', session('username'))->get()->toArray();
            // Kiểm tra người dùng đã đánh giá hay chưa
            if (instructorRating::where('user_id', '=', $user[0]['id'])->where('instructor_id', '=', $id)->get()->toArray() != NULL)
            $userStar = instructorRating::where('user_id', '=', $user[0]['id'])->where('instructor_id', '=', $id)->get()->toArray()[0]['star'];
        }
        return view('instructor.instructor', compact('data', 'pack', 'total', 'star', 'userStar'));
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
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}
