<?php

namespace App\Http\Controllers;

use App\Models\CorrespondanceEtablissement;
use Illuminate\Http\Request;

/**
 * Class CorrespondanceEtablissementController
 * @package App\Http\Controllers
 */
class CorrespondanceEtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correspondanceEtablissements = CorrespondanceEtablissement::all();

        return view('correspondance-etablissement.index', compact('correspondanceEtablissements'))
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $correspondanceEtablissement = new CorrespondanceEtablissement();
        return view('correspondance-etablissement.create', compact('correspondanceEtablissement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CorrespondanceEtablissement::$rules);

        $correspondanceEtablissement = CorrespondanceEtablissement::create($request->all());

        return redirect()->route('correspondance-etablissement.index')
            ->with('success', 'CorrespondanceEtablissement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $correspondanceEtablissement = CorrespondanceEtablissement::find($id);

        return view('correspondance-etablissement.show', compact('correspondanceEtablissement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $correspondanceEtablissement = CorrespondanceEtablissement::find($id);

        return view('correspondance-etablissement.edit', compact('correspondanceEtablissement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CorrespondanceEtablissement $correspondanceEtablissement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CorrespondanceEtablissement $correspondanceEtablissement)
    {
        request()->validate(CorrespondanceEtablissement::$rules);

        $correspondanceEtablissement->update($request->all());

        return redirect()->route('correspondance-etablissement.index')
            ->with('success', 'CorrespondanceEtablissement updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $correspondanceEtablissement = CorrespondanceEtablissement::find($id)->delete();

        return redirect()->route('correspondance-etablissement.index')
            ->with('success', 'CorrespondanceEtablissement deleted successfully');
    }
}
