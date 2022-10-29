<?php

namespace App\Http\Controllers;

use App\Models\Pv;
use App\Models\Lot;
use Illuminate\Http\Request;
use App\Models\AssocPvDemande;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class PvController
 * @package App\Http\Controllers
 */
class PvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pvs = Pv::all();
        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('error');
        }
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('success');
        }
        return view('pv.index', compact('pvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pv = new Pv();
        return view('pv.create', compact('pv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pv::$rules);

        $pv = Pv::create($request->all());

        return redirect()->route('pv.index')
            ->with('success', 'Pv Créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pv = Pv::find($id);

        return view('pv.show', compact('pv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pv = Pv::find($id);

        return view('pv.edit', compact('pv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pv $pv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pv $pv)
    {
        request()->validate(Pv::$rules);

        $pv->update($request->all());

        return redirect()->route('pv.index')
            ->with('success', 'Pv mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (Lot::where('CodePV', $id)->count() != 0) {
            return redirect()->route('pv.index')
                ->with('error', 'Impossible de supprimer ce PV, Un ou plusieurs lots y sont encore associé (même si ces lots sont vide) ');
        }
        $pv = Pv::find($id)->delete();

        return redirect()->route('pv.index')
            ->with('success', 'Pv supprimé avecc succes');
    }

    public function cloturerPV(int $codePV)
    {
        if (Lot::where('CodePV', $codePV)->where('status', 'OUVERT')->exists()) {
            return back()->with('error', 'Ce PV Contient encore des lots OUVERT');
        }
        if (AssocPvDemande::where('CodePV', $codePV)->count() < 1) {
            return back()->with('error', 'Ce PV ne contient aucun avis d\'aucun commissaire pour le moment, cloture impossible');
        }
        
        Lot::where('CodePV', $codePV)->delete();
        $pv = Pv::findOrFail($codePV);
        $pv->update(['statut' => 'cloturé']);
        return back()->with('success', 'PV :' . $pv->Refence_PV . ' Cloturé avec succès');
    }
}
