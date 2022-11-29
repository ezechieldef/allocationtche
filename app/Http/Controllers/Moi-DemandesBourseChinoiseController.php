<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DemandesBourseChinoise;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use RealRashid\SweetAlert\Facades\Alert;
/**
 * Class DemandesBourseChinoiseController
 * @package App\Http\Controllers
 */
class MoiDemandesBourseChinoiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $DemandesBourseChinoises = DemandesBourseChinoise::paginate();

        return view('commun.voir_mes_demandes', compact('DemandesBourseChinoises'))
            ->with('i', (request()->input('page', 1) - 1) * $DemandesBourseChinoises->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $DemandesBourseChinoise = new DemandesBourseChinoise();



        return view('demandes-bourse-chinoise.create', compact('DemandesBourseChinoise'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DemandesBourseChinoise::$rules, DemandesBourseChinoise::$message);

        $DemandesBourseChinoise = DemandesBourseChinoise::create($request->all());

        // return redirect()->route('voir-demandes')
        //     ->with('success', 'Demandes de Bourse ISSI enregistré avec success');
        return redirect()->route('demandes-bourse-chinoise.show', $DemandesBourseChinoise->id)
        ->with('success', 'Demandes de Bourse Algérienne enregistré avec success. Completer maintenant les pièces');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $DemandesBourseChinoise = DemandesBourseChinoise::findOrFail($id);
        if ($DemandesBourseChinoise->user_id!=Auth::user()->id) {
            //Alert::alert('Title', 'Message', 'danger');
            return abort(404, 'Page not found.');
        }

        if ($mes = Session::get('success')) {
            toast($mes,'success')->autoClose(5000);
        }
        return view('demandes-bourse-chinoise.show', compact('DemandesBourseChinoise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $DemandesBourseChinoise = DemandesBourseChinoise::findOrFail($id);

        return view('demandes-bourse-chinoise.edit', compact('DemandesBourseChinoise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DemandesBourseChinoise $DemandesBourseChinoise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandesBourseChinoise $DemandesBourseChinoise)
    {
        if ($DemandesBourseChinoise->imprime) {
            return redirect()->route('voir-demandes')
            ->with('error', 'Vous ne pouvez plus modifier ou corriger cette demande');
        }
        foreach($request->allFiles() as  $fname=>$v){

            request()->validate([$fname=>'mimes:pdf|max:2048']);
            if ($DemandesBourseChinoise->$fname!='') {
                Storage::delete('public/'.$DemandesBourseChinoise->$fname);
            }
            $emp = $v->store('pieces_jointes','public');
            $DemandesBourseChinoise->update([$fname=>$emp]);
            request()->validate(DemandesBourseChinoise::$rulesUp);

        }

        if ( ($request->all()['delete']?? null)=='oui' && $request->all()['delete_val']!='' ) {
            $champs=$request->all()['delete_val'];

            $v = Storage::delete('public/'.$DemandesBourseChinoise->$champs);

            $DemandesBourseChinoise->update([ $champs => null]);
            request()->validate(DemandesBourseChinoise::$rulesUp);

        }


        request()->validate(DemandesBourseChinoise::$rulesUp);

        $DemandesBourseChinoise->update($request->all());

        return redirect()->route('voir-demandes')
            ->with('success', 'Demandes de Bourse ISSI modifié avec success');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $DemandesBourseChinoise = DemandesBourseChinoise::findOrFail($id);

        if ($DemandesBourseChinoise->imprime) {
            return redirect()->route('voir-demandes')
            ->with('error', 'Vous ne pouvez plus supprimer cette demande');
        }
        $DemandesBourseChinoise->delete();

        return redirect()->route('voir-demandes')
            ->with('success', 'Demandes de Bourse ISSI supprimé avec success');
    }
    public function upload_file( int $demande_id)
    {
        return 'ok';
    }
}
