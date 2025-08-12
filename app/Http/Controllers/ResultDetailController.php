<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;
use App\Models\result;

class ResultDetailController extends Controller
{

    public function index(string $id){
        $result = result::findOrFail($id);
        $song = song::findOrFail($result->song_id);

        return view('result_detail',['song'=>$song , 'result'=>$result]);
    }

}
