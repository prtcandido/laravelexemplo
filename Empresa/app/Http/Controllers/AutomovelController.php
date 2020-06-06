<?php

namespace App\Http\Controllers;

use App\Automovel;
use Illuminate\Http\Request;

class AutomovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colecaoAuto = Automovel::all();
        return View('automovel.index')->with('autos',$colecaoAuto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('automovel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Automovel::create($request->all());
        return redirect('automovel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Automovel  $automovel
     * @return \Illuminate\Http\Response
     */
    public function show(Automovel $automovel)
    {
        return View('automovel.show')->with('auto',$automovel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Automovel  $automovel
     * @return \Illuminate\Http\Response
     */
    public function edit(Automovel $automovel)
    {
        return View('automovel.edit')->with('auto',$automovel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Automovel  $automovel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Automovel $automovel)
    {
        $automovel->update($request->all());
        return redirect('automovel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Automovel  $automovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Automovel $automovel)
    {
        $automovel->delete();
        return redirect('automovel');
    }
}
