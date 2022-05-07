<?php

namespace App\Http\Controllers;

use App\Models\UserPack;
use App\Models\PacksDetail;
use App\Models\Syllabus;
use App\Models\VideoItem;
use App\Models\Users;
use Illuminate\Http\Request;

class UserPackController extends Controller
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
    public function create(Request $request, $pack)
    {
        $data = PacksDetail::where('id', '=', $pack)->get()->toArray();
        if (session()->has('username')) {
            $user = Users::where('nick_name', '=', session('username'))->get()->toArray();
            $check = UserPack::where('pack_id', '=', $data[0]['id'])->where('user_id', '=', $user[0]['id'])->get()->toArray();
        } else return redirect()->route('pack.open', $pack)->with('failed',"You have to log in");
        if ($check == NULL) {
            try{
                if ($user[0]['cash'] < $data[0]['price']) 
                    return redirect()->route('pack.open', $pack)->with('failed',"You don't have enough money");
                UserPack::insert([
                    'user_id' => $user[0]['id'],
                    'pack_id' => $data[0]['id'],
                    'pack_name' => $data[0]['packs_name'],
                    'process' => 1,
                    'at' => 1,
                    'price' => $data[0]['price']
                ]);
                return redirect()->route('pack.open', $pack)->with('status',"Add to you packs successfully");
            }
            catch(Exception $e){
                return redirect()->route('pack.open', $pack)->with('failed',"Operation failed");
            }
        }
        else return redirect()->route('pack.open', $pack)->with('failed',"You have to log in");
    }

    public function updateProcess(Request $request, UserPack $userPack, $id)
    {
        $video = videoItem::where('id', '=', $id)->get();
        $syllabus = Syllabus::where('id', '=', $video->toArray()[0]['syllabus_id'])->get();
        $pack = PacksDetail::where('id', '=', $syllabus->toArray()[0]['pack_id'])->get();
        $lengthVideo = videoItem::where('syllabus_id', '=', $video->toArray()[0]['syllabus_id'])->get();
        $lengthSyllabus = Syllabus::where('pack_id', '=', $syllabus->toArray()[0]['pack_id'])->get();
        if (session()->has('username')) {
            $user = Users::where('nick_name', '=', session('username'))->get()->toArray();
            // Kiểm tra người dùng đã có đăng ký gói chưa
            $userpack = UserPack::where('user_id', '=', $user[0]['id'])->where('pack_id', '=', $syllabus->toArray()[0]['pack_id'])->get()->toArray();
            if ($userpack != NULL) {
                $curVideo = $video[0]['stt'];
                $curSyllabus = $syllabus[0]['stt'];
                $process = $userpack[0]['process'];
                $at = $userpack[0]['at'];
                // Tăng process lên 1 khi bài gần nhất chưa học 
                // Gần nhất ở đây là độ chênh lệnh giữa dữ liệu được lưu và video được click là 1 
                if ($process == $curVideo && $at == $curSyllabus) {
                    $update = UserPack::where('user_id', '=', $user[0]['id'])->where('pack_id', '=', $syllabus->toArray()[0]['pack_id'])->update(['process' => $process + 1]);
                }
                if ($process == count($lengthVideo)) {
                    $update = UserPack::where('user_id', '=', $user[0]['id'])->where('pack_id', '=', $syllabus->toArray()[0]['pack_id'])->update(['at' => $at + 1]);
                    $update = UserPack::where('user_id', '=', $user[0]['id'])->where('pack_id', '=', $syllabus->toArray()[0]['pack_id'])->update(['process' => 1]);
                }
                return redirect()->route('pack.open', $pack->toArray()[0]['id']);
            } else return redirect()->route('pack.open', $pack->toArray()[0]['id']);
        }
        return redirect()->route('pack.open', $pack->toArray()[0]['id']);
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
     * @param  \App\Models\UserPack  $userPack
     * @return \Illuminate\Http\Response
     */
    public function show(UserPack $userPack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPack  $userPack
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPack $userPack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPack  $userPack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPack $userPack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPack  $userPack
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPack $userPack)
    {
        //
    }
}
