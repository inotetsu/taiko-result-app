<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;
use App\Http\Requests\SongsAddRequest;

class SongsAddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = song::latest('updated_at')->paginate(5);
        return view('index',['songs' => $songs]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
