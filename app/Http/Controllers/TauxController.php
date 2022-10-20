<?php

namespace App\Http\Controllers;

use App\Models\Taux;
use Illuminate\Http\Request;

/**
 * Class TauxController
 * @package App\Http\Controllers
 */
class TauxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tauxes = Taux::all();

        return view('taux.index', compact('tauxes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taux = new Taux();
        return view('taux.create', compact('taux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Taux::$rules);

        $taux = Taux::create($request->all());

        return redirect()->route('taux.index')
            ->with('success', 'Taux created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taux = Taux::find($id);

        return view('taux.show', compact('taux'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taux = Taux::find($id);

        return view('taux.edit', compact('taux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Taux $taux
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taux $taux)
    {
        request()->validate(Taux::$rules);

        $taux->update($request->all());

        return redirect()->route('taux.index')
            ->with('success', 'Taux updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $taux = Taux::find($id)->delete();

        return redirect()->route('taux.index')
            ->with('success', 'Taux deleted successfully');
    }
}
