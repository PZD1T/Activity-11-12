<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes =Note::todas_las_notas();
        //dd($notes);
        return view('notes.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);

        Note::create([
         'title'=> $request->title,
         'content'=> $request->content
        ]);

        //return to_route('notes.index');
        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view ('notes.show')
        ->with('note', Note::nota_por_id($id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view ('notes.edit')
        ->with('note', Note::nota_por_id($id));
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
        //
    }
}
