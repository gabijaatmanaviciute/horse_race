<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horse;
use Validator;

class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horses = Horse::all();
        return view('horse.index', ['horses' => $horses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'horse_name' => ['required', 'min:3', 'max:30'],
            'horse_runs' => ['required'],
            'horse_wins' => ['required'],
            'horse_about' => ['required', 'max:1000']
        ],
        []
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $horse = new Horse;
        $horse->name = $request->horse_name;
        $horse->runs = $request->horse_runs;
        $horse->wins = $request->horse_wins;
        $horse->about = $request->horse_about;
        $horse->save();
        return redirect()->route('horse.index')->with('success_message', 'Sėkmingai irasytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horse $horse)
    {
        return view('horse.edit', ['horse' => $horse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horse $horse)
    {
        $validator = Validator::make($request->all(),
        [
            'horse_name' => ['required', 'min:3', 'max:30'],
            'horse_runs' => ['required'],
            'horse_wins' => ['required'],
            'horse_about' => ['required', 'max:1000']
        ],
        []
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $horse->name = $request->horse_name;
        $horse->runs = $request->horse_runs;
        $horse->wins = $request->horse_wins;
        $horse->about = $request->horse_about;
        $horse->save();
        return redirect()->route('horse.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        if($horse->hasBetters->count()){
            return redirect()->route('horse.index')->with('info_message', 'Horse cannot be deleted since it is betted on.');
        } 
        $horse->delete();
        return redirect()->route('horse.index')->with('success_message', 'Sėkmingai istrintas.');
    }
}
