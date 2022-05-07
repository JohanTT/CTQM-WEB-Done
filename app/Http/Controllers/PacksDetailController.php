<?php

namespace App\Http\Controllers;

use App\Models\PacksDetail;
use App\Models\instructorRating;
use App\Models\Syllabus;
use App\Models\Users;
use App\Models\UserPack;
use App\Models\Comments;
use App\Models\Ratings;
use App\Models\Instructor;
use App\Models\VideoItem;
use Illuminate\Http\Request;

class PacksDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchPack()
    {
        if (request()->key == NULL) {
            return redirect('/home');
        }else {
            if ($key = request()->key) {
                $data = PacksDetail::where('packs_name', 'like', '%'.$key.'%')->paginate(5);
            }
            return view('viewmore.freeviewmore', compact('data'));
        }
    }


    public function viewmoreP()
    {
        $data = PacksDetail::where('price', '>', '0')->paginate(5);
        return view('viewmore.primeviewmore', compact('data'));
    }

    public function viewmoreF()
    {
        $data = PacksDetail::where('price', '=', '0')->paginate(5);
        return view('viewmore.freeviewmore', compact('data'));
    }

    public function packOpen($pack)
    {
        $data = PacksDetail::where('id', '=', $pack)->get();
        $videoTitle = Syllabus::where('pack_id', '=', $pack)->get()->sortBy([['pack_id', 'asc'], ['stt', 'asc']]);
        $comment = Comments::where('pack_id', '=', $pack)->get()->sortByDesc('vote');
        $instructor = Instructor::where('id', '=', $data->toArray()[0]['instructor_id'])->get();
        $star = Ratings::where('pack_id', '=', $pack)->get()->avg('star');
        if ($star == NULL) $star = 0;
        $instrucStar = instructorRating::where('instructor_id', '=', $instructor->toArray()[0]['id'])->get()->avg('star');
        if ($instrucStar == NULL) $instrucStar = 0;
        $commentTotal = count($comment);
        // Lấy khung nội dung đối với từng gói pack
        // thông qua các syllabus_id VD gói 1 là từ 1 - 4
        $firstID = $videoTitle->toArray()[0]['id'];
        $length = count($videoTitle->toArray());
        $video = videoItem::where('syllabus_id', '>=', $firstID)->where('syllabus_id', '<', $length + $firstID)->get()->sortBy([['syllabus_id', 'asc'], ['stt', 'asc']]);
        // dd($video);
        $user = new Users;
        $check = NULL;
        $userStar = -1;
        if (session()->has('username')) {
            $user = Users::where('nick_name', '=', session('username'))->get()->toArray();
            // Kiểm tra người dùng đã mua gói hay chưa
            $check = UserPack::where('pack_id', '=', $data->toArray()[0]['id'])->where('user_id', '=', $user[0]['id'])->get()->toArray();
            if (Ratings::where('user_id', '=', $user[0]['id'])->where('pack_id', '=', $pack)->get()->toArray() != NULL)
            $userStar = Ratings::where('user_id', '=', $user[0]['id'])->where('pack_id', '=', $pack)->get()->toArray()[0]['star'];
        }
        return view('videocourse.video', compact('data', 'videoTitle', 'check', 'video', 'comment', 'commentTotal', 'star', 'userStar', 'instructor', 'instrucStar'));
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
     * @param  \App\Models\PacksDetail  $packsDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PacksDetail $packsDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PacksDetail  $packsDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PacksDetail $packsDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PacksDetail  $packsDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacksDetail $packsDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PacksDetail  $packsDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PacksDetail $packsDetail)
    {
        //
    }
}
