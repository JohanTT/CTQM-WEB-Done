<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Users;
use App\Models\UserPack;
use App\Models\PacksDetail;
use Illuminate\Http\Request;

class CommentsController extends Controller
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
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newComment(Request $request, $id)
    {
        if ($request->input('content') != NULL) {
            if (session()->has('username')) {
                $user = Users::where('nick_name', '=', session('username'))->get()->toArray();
                // check kiểm tra người dùng có mua gói hay chưa
                $check = UserPack::where('pack_id', '=', $id)->where('user_id', '=', $user[0]['id'])->get()->toArray();
                if ($check == NULL) {
                    return redirect()->route('pack.open', $id)->with('commentFailed',"You have to buy to leave a comment");
                }
                if ($check != NULL) {
                    try{
                        Comments::insert([
                            'pack_id' => $id,
                            'user_id' => $user[0]['id'],
                            'nick_name' =>  session('username'),
                            'content' => $request->input('content'),
                            'vote' => 0
                        ]);
                        return redirect()->route('pack.open', $id)->with('commentSuccessed', "New comment create");
                    }
                    catch(Exception $e){
                        return redirect()->route('pack.open', $id)->with('commentFailed', "Operation failed");
                    }
                }
            } else return redirect()->route('pack.open', $id)->with('commentFailed',"You have to log in");
        } return redirect()->route('pack.open', $id);
    }

    public function increaseVote(Request $request, Comments $comments, $id)
    {
        if (session()->has('username')) {
            // Lấy vote hiện tại ra
            $vote = Comments::where('id', '=', $id)->get()->toArray();
            $update = Comments::where('id', '=', $id)->update(['vote' => $vote[0]['vote'] + 1]);
            return redirect()->route('pack.open', $vote[0]['pack_id']);
        } else return redirect()->route('pack.open', $vote[0]['pack_id']);
    }

    public function decreaseVote(Request $request, Comments $comments, $id)
    {
        if (session()->has('username')) {
            // Lấy vote hiện tại ra
            $vote = Comments::where('id', '=', $id)->get()->toArray();
            $update = Comments::where('id', '=', $id)->update(['vote' => $vote[0]['vote'] - 1]);
            return redirect()->route('pack.open', $vote[0]['pack_id']);
        } else return redirect()->route('pack.open', $vote[0]['pack_id']);
    }

    public function deleteComment(Comments $comments, $id)
    {
        $comments = Comments::find($id);
        $comments->delete();
        $vote = Comments::where('id', '=', $id)->get()->toArray();
        return redirect()->route('pack.open', $vote[0]['pack_id']);
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
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comments)
    {
        //
    }
}
