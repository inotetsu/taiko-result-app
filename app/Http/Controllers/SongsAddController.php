<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;
use App\Http\Requests\SongsAddRequest;
use Illuminate\Support\Facades\Auth;

class SongsAddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = song::where('user_id',Auth::user()->id)->latest('updated_at')->paginate(5);
        $user = Auth::user();
        return view('index',['songs' => $songs,'user' => $user]);
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
    public function store(SongsAddRequest $request)
    {
        $song = new song($request->validated());
        $song->user_id = Auth::user()->id;
        $song->save();

        return to_route('home');
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
        $song = song::findOrFail($id);
        $user = Auth::user();

        return view('update',['song'=>$song,'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SongsAddRequest $request, string $id)
    {
        $song = song::findOrFail($id);
        $updateData = $request->validated();
        
        $song->update($updateData);
        return to_route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $song = song::findOrFail($id);
        $song->delete();
        
        return to_route('home');
    }
}
