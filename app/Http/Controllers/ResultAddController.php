<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;
use App\Models\result;
use App\Http\Requests\ResultAddRequest;
use Illuminate\Support\Facades\Auth;

class ResultAddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,string $id)
    {
        $song = song::find($id);
        $results = result::where('song_id',$id)->where('play_count', 0)->latest('updated_at')->paginate(10);    /*リザルト取得*/
        $play_count = result::where('song_id',$id)->count();                /*プレイ回数カウント*/
        $full_combo_count = result::where('song_id',$id)->where('full_combo',1)->count();     /*フルコンボ回数カウント*/
        $donda_full_combo_count = result::where('song_id',$id)->where('donda_full_combo',1)->count();     /*ドンだフルコンボ回数カウント*/
        $user = Auth::user();

        $order = $request->input('order');

        if(!empty($order)){
            if($order == 1){
                $results = result::where('song_id',$id)->where('play_count', 0)->latest('updated_at')->paginate(10);
            }

            if($order == 2){
                $results = result::where('song_id',$id)->where('play_count', 0)->oldest('updated_at')->paginate(10);
            }

            if($order == 3){
                $results = result::where('song_id',$id)->where('play_count', 0)->orderBy('good_count','desc')->paginate(10);
            }

            if($order == 4){
                $results = result::where('song_id',$id)->where('play_count', 0)->orderBy('ok_count','asc')->paginate(10);
            }

            if($order == 5){
                $results = result::where('song_id',$id)->where('play_count', 0)->orderBy('miss_count','asc')->paginate(10);
            }

            if($order == 6){
                $results = result::where('song_id',$id)->where('play_count', 0)->orderBy('roll_count','desc')->paginate(10);
            }

            if($order == 7){
                $results = result::where('song_id',$id)->where('play_count', 0)->where('full_combo',1)->where('donda_full_combo',0)->latest('updated_at')->paginate(10);
            }

            if($order == 8){
                $results = result::where('song_id',$id)->where('play_count', 0)->where('donda_full_combo',1)->latest('updated_at')->paginate(10);
            }

        }

        return view('detail',['song' => $song , 'results' => $results , 'play_count' => $play_count,
                              'full_combo_count' => $full_combo_count , 'donda_full_combo_count' => $donda_full_combo_count , 'user'=>$user , 'order'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResultAddRequest $request,string $id)
    {
        $result = new result($request->validated());
        $result->song_id = $id;
        $result->save();

        return to_route('song.result',['song' => $result->song_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = result::findOrFail($id);
        $song = song::with('genre','difficulty')->findOrFail($result->song_id);
        $user = Auth::user();

        return view('update_result',['result' => $result ,'song' => $song , 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResultAddRequest $request, string $id)
    {
        $result = result::findOrFail($id);
        $updateData = $request->validated();
        $result->update($updateData);

        return to_route('song.result',['song'=>$result->song_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = result::findOrFail($id);
        $songId = $result->song_id;
        $result->delete();

        return to_route('song.result',['song' => $songId]);
    }
}
