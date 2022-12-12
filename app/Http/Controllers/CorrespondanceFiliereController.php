<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\SelectionNouveau;
use App\Models\CorrespTemporaire;
use App\Models\CorrespondanceCode;
use App\Models\CorrespEtsSelection;
use App\Models\CorrespFilSelection;
use App\Models\CorrespTemporaireSel;
use App\Models\CorrespondanceFiliere;
use App\Models\CorrespondanceEtablissement;

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

        return view('correspondance-filiere.index', compact('correspondanceFilieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ini_set("memory_limit", "3000M");

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

    public function corresp_temp()
    {
        $all = request()->all();

        //dd($all);



        if (!is_null($all['valider'] ?? null)) {
            foreach ($all['valider'] as $id) {
                $t = CorrespTemporaire::find($id);
                $filancien = Filiere::find($t->ancien);
                $filnouveau = Filiere::find($t->nouveau);
                if (
                    !Etablissement::correspondre($filnouveau->etablissement()->first()->CodeEtablissement, $filancien->etablissement()->first()->CodeEtablissement)
                ) {
                    CorrespondanceEtablissement::create([
                        'champ1' => $filnouveau->etablissement()->first()->CodeEtablissement,
                        "champ2" => $filancien->etablissement()->first()->CodeEtablissement
                    ]);
                }
                if (!Filiere::correspondre($filnouveau->CodeFiliere, $filancien->CodeFiliere)) {
                    CorrespondanceFiliere::create(['champ1' => $filnouveau->CodeFiliere, "champ2" => $filancien->CodeFiliere]);
                }
                $t->delete();
            }
        }
        if (!is_null($all['rejeter'] ?? null)) {
            foreach ($all['rejeter'] as $id) {
                CorrespTemporaire::find($id)->delete();
            }
        }
        $prop_list = CorrespTemporaire::all();
        return view('correspondance-filiere.corresp_temp', compact("prop_list"));
    }

    public function corresp_temp_sel()
    {
        $all = request()->all();

        //dd($all);

        if (!is_null($all['valider'] ?? null)) {
            foreach ($all['valider'] as $id) {
                $t = CorrespTemporaireSel::find($id);
                $ets_sel = SelectionNouveau::where('libfiliere', $t->nouveau)->get()->first()->etablissementSelection;
                $filancien = Filiere::find($t->ancien);

                //   Etablissement::correspondreSelection($map['CodeEtablissement'], $selection->etablissementSelection) &&
                //     Filiere::correspondreSelection($map['CodeFiliere'], $selection->libfiliere)
                // $filnouveau = Filiere::find($t->nouveau);
                if (
                    $filancien->etablissement()->first()->CodeEtablissement != $ets_sel &&
                    !Etablissement::correspondreSelection($filancien->etablissement()->first()->CodeEtablissement, $ets_sel)

                ) {
                    CorrespEtsSelection::create([
                        'CodeEtablissement1' => $filancien->etablissement()->first()->CodeEtablissement,
                        'etablissementSelection' => $ets_sel
                    ]);
                }
                if (!Filiere::correspondreSelection($filancien->CodeFiliere, $t->nouveau)) {

                    //CorrespFilSelection::create(["CodeFiliere" => $filancien->CodeFiliere, "filiereSelection" => $t->nouveau]);
                    CorrespFilSelection::create(['CodeFiliere' => $t->ancien, "filiereSelection" => $t->nouveau]);
                }
                $t->delete();
            }
        }
        if (!is_null($all['rejeter'] ?? null)) {
            foreach ($all['rejeter'] as $id) {
                CorrespTemporaireSel::find($id)->delete();
            }
        }
        $prop_list = CorrespTemporaireSel::all();
        return view('correspondance-filiere.corresp_temp_sel', compact("prop_list"));
    }
}
