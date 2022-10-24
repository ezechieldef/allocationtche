<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use Illuminate\Http\Request;
use App\Models\AssocLotsDemande;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class LotController
 * @package App\Http\Controllers
 */
class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lots = Lot::paginate();

        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('error');
        }
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('success');
        }

        return view('lot.index', compact('lots'))
            ->with('i', (request()->input('page', 1) - 1) * $lots->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lot = new Lot();
        return view('lot.create', compact('lot'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lot::$rules);

        $lot = Lot::create($request->all());

        return redirect()->route('lots.index')
            ->with('success', 'Lot créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lot = Lot::find($id);
        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('error');
        }
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
            Session::remove('success');
        }
        return view('lot.show', compact('lot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lot = Lot::find($id);

        return view('lot.edit', compact('lot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lot $lot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lot $lot)
    {
        request()->validate(Lot::$rules);

        $lot->update($request->all());

        return redirect()->route('lots.index')
            ->with('success', 'Lot mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lot = Lot::find($id)->delete();

        return redirect()->route('lots.index')
            ->with('success', 'Lot supprimé avec succès');
    }

    public function ajouterAuLot(int $lot_id)
    {

        $lot = Lot::findOrFail($lot_id);

        $all = request()->all();
        request()->validate([
            'CodeFiliere' => 'required',
            'CodeAnneeEtude' => 'required',
            'CodeNatureAllocation' => 'required',
            'effectif' => 'required'
        ]);
        //dd($all);

        $list_dem = DB::select("SELECT D.CodeDemandeAllocation from
        demande_allocation D , etudiant E WHERE D.CodeEtudiant= E.CodeEtudiant
        AND E.CodeFiliere = ? AND D.CodeAnneeEtude = ? AND D.CodeNatureAllocation= ?
        AND D.idtransaction!='' AND D.CodeDemandeAllocation not in

            (SELECT A.CodeDemandeAllocation from assoc_lots_demande A )
         LIMIT ? ", [
            $all['CodeFiliere'],
            $all['CodeAnneeEtude'],
            $all['CodeNatureAllocation'],
            $all['effectif']
        ]);

        if (count($list_dem) == 0) {
            return redirect('/lots')->with('error', "Aucune demande correspondance n'a été identifé");
        }
        //dd($list_dem);
        $n=0;
        foreach ($list_dem as $v) {

            if (!AssocLotsDemande::where('CodeLot', $lot->CodeLot)
                ->where('CodeDemandeAllocation', $v->CodeDemandeAllocation)->exists()) {

                AssocLotsDemande::create([
                    'CodeLot' => $lot->CodeLot,
                    'CodeDemandeAllocation' => $v->CodeDemandeAllocation
                ]);
                $n++;
            }
        }
        return redirect('/lots')->with('success', $n." demande(s) ont été ajouté au lot N° ".$lot->Numero);

    }
}
