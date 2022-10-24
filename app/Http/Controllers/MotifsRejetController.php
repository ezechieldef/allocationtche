<?php

namespace App\Http\Controllers;

use App\Models\MotifsRejet;
use Illuminate\Http\Request;

/**
 * Class MotifsRejetController
 * @package App\Http\Controllers
 */
class MotifsRejetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motifsRejets = MotifsRejet::paginate();

        return view('motifs-rejet.index', compact('motifsRejets'))
            ->with('i', (request()->input('page', 1) - 1) * $motifsRejets->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motifsRejet = new MotifsRejet();
        return view('motifs-rejet.create', compact('motifsRejet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MotifsRejet::$rules);

        $motifsRejet = MotifsRejet::create($request->all());

        return redirect()->route('motifs_rejets.index')
            ->with('success', 'MotifsRejet créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motifsRejet = MotifsRejet::find($id);

        return view('motifs-rejet.show', compact('motifsRejet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motifsRejet = MotifsRejet::find($id);

        return view('motifs-rejet.edit', compact('motifsRejet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MotifsRejet $motifsRejet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MotifsRejet $motifsRejet)
    {
        request()->validate(MotifsRejet::$rules);

        $motifsRejet->update($request->all());

        return redirect()->route('motifs_rejets.index')
            ->with('success', 'MotifsRejet mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $motifsRejet = MotifsRejet::find($id)->delete();

        return redirect()->route('motifs_rejets.index')
            ->with('success', 'MotifsRejet supprimé avec succès');
    }
}
