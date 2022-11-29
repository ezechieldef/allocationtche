<?php

namespace App\Http\Controllers;

use App\Models\CorrespondanceFiliere;
use Illuminate\Http\Request;

/**
 * Class CorrespondanceFiliereController
 * @package App\Http\Controllers
 */
class CorrespondanceFiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $correspondanceFilieres = CorrespondanceFiliere::all();

        return view('correspondance-filiere.index', compact('correspondanceFilieres'))
            ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ini_set("memory_limit","3000M");

        $correspondanceFiliere = new CorrespondanceFiliere();
        return view('correspondance-filiere.create', compact('correspondanceFiliere'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CorrespondanceFiliere::$rules);

        $correspondanceFiliere = CorrespondanceFiliere::create($request->all());

        return redirect()->route('correspondance-filiere.index')
            ->with('success', 'CorrespondanceFiliere created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $correspondanceFiliere = CorrespondanceFiliere::find($id);

        return view('correspondance-filiere.show', compact('correspondanceFiliere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $correspondanceFiliere = CorrespondanceFiliere::find($id);

        return view('correspondance-filiere.edit', compact('correspondanceFiliere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CorrespondanceFiliere $correspondanceFiliere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CorrespondanceFiliere $correspondanceFiliere)
    {
        request()->validate(CorrespondanceFiliere::$rules);

        $correspondanceFiliere->update($request->all());

        return redirect()->route('correspondance-filiere.index')
            ->with('success', 'CorrespondanceFiliere updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $correspondanceFiliere = CorrespondanceFiliere::find($id)->delete();

        return redirect()->route('correspondance-filiere.index')
            ->with('success', 'CorrespondanceFiliere deleted successfully');
    }
}
