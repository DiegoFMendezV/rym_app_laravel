<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Characters;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $characters = Characters::paginate(10);
        // log:info("$characters");
        return view('personajes', compact ('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $request->validate([
            'name' => "required",
            'status' => "required",
            'species' => "required",
            'gender' => "required",
        ]);

        $character = new Characters;
        $character->name = $request->name;
        $character->status = $request->status;
        $character->species = $request->species;
        $character->type = $request->type;
        $character->gender = $request->gender;
        $character->origin = $request->origin;
        $character->location = $request->location;
        $character->image = $request->image;
        $character->episode = $request->episode;
        $character->url = $request->url;
        $character->created = $request->created;
        $character->save();

        return redirect()->route('personajes_create')->with('success', 'Personaje creado exitosamente');
   
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $character = Characters::find($id);
        return view('personajes_edit', compact ('character'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $character = Characters::find($id);
        $character->name = $request->name;
        $character->status = $request->status;
        $character->species = $request->species;
        $character->type = $request->type;
        $character->gender = $request->gender;
        $character->origin = $request->origin;
        $character->location = $request->location;
        $character->image = $request->image;
        $character->episode = $request->episode;
        $character->url = $request->url;
        $character->created = $request->created;
        $character->save();
        // dd($character);
        return redirect()->route('personajes')->with('success', 'Personaje actualizado exitosamente');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $character = Characters::find($id);
        $character->delete();
        
        return redirect()->route('personajes')->with('success', 'Personaje eliminado exitosamente');
    }
}
