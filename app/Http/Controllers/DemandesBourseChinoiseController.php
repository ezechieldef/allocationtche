<?php

namespace App\Http\Controllers;

//use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Support\Str;
use App\Models\AssocPJChine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DemandesBourseChinoise;
use Illuminate\Support\Facades\Storage;

/**
 * Class DemandesBourseChinoiseController
 * @package App\Http\Controllers
 */
class DemandesBourseChinoiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $demandesBourseChinoises = Auth::user()->demandesBourseChinoise();;

        return view('demandes-bourse-chinoise.index', compact('demandesBourseChinoises'))
            ->with('i',0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $demandesBourseChinoise = new DemandesBourseChinoise();
        return view('demandes-bourse-chinoise.create', compact('demandesBourseChinoise'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DemandesBourseChinoise::$rules);
        $a = $request->all();
        $str = Str::upper(Str::random(12));
        $i = 4;
        while ($i < strlen($str)) {
            $str = substr($str, 0, $i) . '-' . substr($str, $i);
            $i = $i + 5;
        }
        $a['code'] = $str;
        $a['nom']= strtoupper($a['nom']);
        $a['prenoms']= ucfirst($a['prenoms']);
        $demandesBourseChinoise = DemandesBourseChinoise::create($a);

        return redirect()->route('demandes-bourse-chinoise.index')
            ->with('success', 'Demandes Bourse Chinoise effectuée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demandesBourseChinoise = DemandesBourseChinoise::find($id);

        return view('demandes-bourse-chinoise.show', compact('demandesBourseChinoise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $demandesBourseChinoise = DemandesBourseChinoise::find($id);
        if ($demandesBourseChinoise->imprime) {
            return back()->with('error', "La modification de cette demande n'est plus possible");
        }
        return view('demandes-bourse-chinoise.edit', compact('demandesBourseChinoise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DemandesBourseChinoise $demandesBourseChinoise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandesBourseChinoise $demandesBourseChinoise)
    {
        if ($demandesBourseChinoise->imprime) {
            return back()->with('error', "La modification de cette demande n'est plus possible");
        }

        $a = $request->all();
        foreach ($request->allFiles() as  $fname => $v) {

            request()->validate([$fname => 'mimes:pdf|max:2048']);
            if (($a[$fname . '_id'] ?? '') == '') {
                return abort(403, 'Une erreur s\'est produite. l\'identificaion de la piece jointe n\'a pas été retrouvé');
            }
            $oldpj = (AssocPJChine::where('piece_jointe', $a[$fname . '_id'])->where('demande_id', $demandesBourseChinoise->id)->get()->first()) ?? null;
            if ($oldpj != null) {
                Storage::delete('public/' . $oldpj->url);

                $oldpj->delete();
            }
            $emp = $v->store('pieces_jointes', 'public');


            $rep = AssocPJChine::create([
                'piece_jointe' => $a[$fname . '_id'],
                'demande_id' => $demandesBourseChinoise->id,
                'url' => $emp
            ]);
        }


        if (($a['delete_pj'] ?? '') != '') {
            $oldpj = AssocPJChine::findOrFail($a['delete_pj']);
            // if ($oldpj->isConfirmed) {
            //     return redirect()->route('demandes-liste')
            //     ->with('error', 'Cette pièce jointe a déjà été confirmé. Supression impossible');
            // }
            if ($oldpj != null) {
                $v = Storage::delete('public/' . $oldpj->url);
                $oldpj->delete();
            }
        }
        request()->validate(DemandesBourseChinoise::$rules);
        $demandesBourseChinoise->update($request->all());

        return redirect()->route('demandes-bourse-chinoise.index')
            ->with('success', 'DemandesBourseChinoise mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dem= DemandesBourseChinoise::find($id);
        if (!is_null($dem) && $dem->imprime) {
            return back()->with('error', "La suppression de cette demande n'est plus possible");
        }
        if (!is_null($dem)) {
            $dem->delete();
        }
        return redirect()->route('demandes-bourse-chinoise.index')
            ->with('success', 'DemandesBourseChinoise supprimé avec succès');
    }

    public function imprimer_pdf(int $id)
    {

        $demandesBourseChinoise = \App\Models\DemandesBourseChinoise::findOrFail($id);
        if ($demandesBourseChinoise->user_id != Auth::user()->id) {
            //Alert::alert('Title', 'Message', 'danger');
            return abort(404, 'Page not found.');
        }
        // share data to view
        PDF::setOptions([
            "isHtml5ParserEnabled" => true,
            "isRemoteEnabled" => true,
            "defaultPaperSize" => "a4",
            "dpi" => 130
        ]);

        $pdf = PDF::loadView('demandes-bourse-chinoise.pdf', compact('demandesBourseChinoise'));
        $demandesBourseChinoise->update(['imprime' => true]);
        // return view('demandes-bourse-chinoise.pdf', compact('demandesBourseChinoise'));
        return $pdf->download('pdf_file.pdf');
    }
}
