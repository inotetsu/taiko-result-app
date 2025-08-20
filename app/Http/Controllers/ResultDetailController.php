<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;
use App\Models\result;
use Illuminate\Support\Facades\Auth;

class ResultDetailController extends Controller
{

    public function index(string $id){
        $result = result::findOrFail($id);
        $song = song::findOrFail($result->song_id);
        $user = Auth::user();

        return view('result_detail',['song'=>$song , 'result'=>$result , 'user'=>$user]);
    }

}
