<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apocalypse;
use Illuminate\Support\Str;

class ApocalypseController extends Controller
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
    public function create()
    {
        return view('apocalypse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'stats' => 'required|string',
            'luck' => 'required|integer',
            'harm' => 'required|integer',
            'unstable' => 'required|integer',
            'experience' => 'required|integer',
        ]);

        Apocalypse::create([
            'slug' => Str::slug($request->name . '-' . Str::random(8), '-'),
            'name' => $request->name,
            'stats' => json_encode(explode(',', Str::slug($request->stats, '-'))),
            'defaults' => json_encode([
                'luck' => $request->luck,
                'harm' => $request->harm,
                'unstable' => $request->unstable,
                'experience' => $request->experience,
            ]),
        ]);

        return redirect(route('dashboard'))->with('success', 'Apocalypse created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
