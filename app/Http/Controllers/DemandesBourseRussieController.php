<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AssocPJRussie;
use App\Models\DemandesBourseRussie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Class DemandesBourseRussieController
 * @package App\Http\Controllers
 */
class DemandesBourseRussieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandesBourseRussies = Auth::user()->demandesBourseRussie()->get();

        return view('demandes-bourse-russie.index', compact('demandesBourseRussies'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $demandesBourseRussie = new DemandesBourseRussie();
        return view('demandes-bourse-russie.create', compact('demandesBourseRussie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DemandesBourseRussie::$rules);
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
        $demandesBourseRussie = DemandesBourseRussie::create($a);

        return redirect()->route('demandes-bourse-russie.index')
            ->with('success', 'DemandesBourseRussie créé avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $demandesBourseRussie = DemandesBourseRussie::find($id);

        return view('demandes-bourse-russie.show', compact('demandesBourseRussie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $demandesBourseRussie = DemandesBourseRussie::find($id);
        if ($demandesBourseRussie->imprime) {
            return back()->with('error', "La modification de cette demande n'est plus possible");
        }
        return view('demandes-bourse-russie.edit', compact('demandesBourseRussie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DemandesBourseRussie $demandesBourseRussie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandesBourseRussie $demandesBourseRussie)
    {
        if ($demandesBourseRussie->imprime) {
            return back()->with('error', "La modification de cette demande n'est plus possible");
        }

        $a = $request->all();
        foreach ($request->allFiles() as  $fname => $v) {

            request()->validate([$fname => 'mimes:pdf|max:2048']);
            if (($a[$fname . '_id'] ?? '') == '') {
                return abort(403, 'Une erreur s\'est produite. l\'identificaion de la piece jointe n\'a pas été retrouvé');
            }
            $oldpj = (AssocPJRussie::where('piece_jointe', $a[$fname . '_id'])->where('demande_id', $demandesBourseRussie->id)->get()->first()) ?? null;
            if ($oldpj != null) {
                Storage::delete('public/' . $oldpj->url);

                $oldpj->delete();
            }
            $emp = $v->store('pieces_jointes', 'public');


            $rep = AssocPJRussie::create([
                'piece_jointe' => $a[$fname . '_id'],
                'demande_id' => $demandesBourseRussie->id,
                'url' => $emp
            ]);
        }


        if (($a['delete_pj'] ?? '') != '') {
            $oldpj = AssocPJRussie::findOrFail($a['delete_pj']);
            // if ($oldpj->isConfirmed) {
            //     return redirect()->route('demandes-liste')
            //     ->with('error', 'Cette pièce jointe a déjà été confirmé. Supression impossible');
            // }
            if ($oldpj != null) {
                $v = Storage::delete('public/' . $oldpj->url);
                $oldpj->delete();
            }
        }
        request()->validate(DemandesBourseRussie::$rules);

        $demandesBourseRussie->update($request->all());

        return redirect()->route('demandes-bourse-russie.index')
            ->with('success', 'DemandesBourseRussie mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $demandesBourseRussie = DemandesBourseRussie::find($id)->delete();

        return redirect()->route('demandes-bourse-russie.index')
            ->with('success', 'DemandesBourseRussie supprimé avec succès');
    }

    public function imprimer_pdf(int $id)
    {

        $demandesBourseRussie = \App\Models\DemandesBourseRussie::findOrFail($id);
        if ($demandesBourseRussie->user_id != Auth::user()->id) {
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

        $pdf = PDF::loadView('demandes-bourse-russie.pdf', compact('demandesBourseRussie'));
        $demandesBourseRussie->update(['imprime' => true]);
        // return view('demandes-bourse-chinoise.pdf', compact('demandesBourseRussie'));
        return $pdf->download('pdf_file.pdf');
    }
}
