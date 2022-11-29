<?php

namespace App\Http\Controllers;

use App\Models\CorrespondanceUniversite;
use Illuminate\Http\Request;

/**
 * Class CorrespondanceUniversiteController
 * @package App\Http\Controllers
 */
class CorrespondanceUniversiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $correspondanceUniversites = CorrespondanceUniversite::distinct('champ1')->get();

        return view('correspondance-universite.index', compact('correspondanceUniversites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $correspondanceUniversite = new CorrespondanceUniversite();
        return view('correspondance-universite.create', compact('correspondanceUniversite'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CorrespondanceUniversite::$rules);

        $correspondanceUniversite = CorrespondanceUniversite::create($request->all());

        return redirect()->route('correspondance-universite.index')
            ->with('success', 'CorrespondanceUniversite created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $correspondanceUniversite = CorrespondanceUniversite::find($id);

        return view('correspondance-universite.show', compact('correspondanceUniversite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $correspondanceUniversite = CorrespondanceUniversite::find($id);

        return view('correspondance-universite.edit', compact('correspondanceUniversite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CorrespondanceUniversite $correspondanceUniversite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CorrespondanceUniversite $correspondanceUniversite)
    {
        request()->validate(CorrespondanceUniversite::$rules);

        $correspondanceUniversite->update($request->all());

        return redirect()->route('correspondance-universite.index')
            ->with('success', 'CorrespondanceUniversite updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $correspondanceUniversite = CorrespondanceUniversite::find($id)->delete();

        return redirect()->route('correspondance-universite.index')
            ->with('success', 'CorrespondanceUniversite deleted successfully');
    }
}
