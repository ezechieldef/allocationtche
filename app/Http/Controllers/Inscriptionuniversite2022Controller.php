<?php

namespace App\Http\Controllers;

use App\Models\Inscriptionuniversite2022;
use Illuminate\Http\Request;

/**
 * Class Inscriptionuniversite2022Controller
 * @package App\Http\Controllers
 */
class Inscriptionuniversite2022Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Inscriptionuniversite2022s = Inscriptionuniversite2022::paginate();

        return view('Inscriptionuniversite2022.index', compact('Inscriptionuniversite2022s'))
            ->with('i', (request()->input('page', 1) - 1) * $Inscriptionuniversite2022s->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Inscriptionuniversite2022 = new Inscriptionuniversite2022();
        return view('Inscriptionuniversite2022.create', compact('Inscriptionuniversite2022'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Inscriptionuniversite2022::$rules);

        $Inscriptionuniversite2022 = Inscriptionuniversite2022::create($request->all());

        return redirect()->route('Inscriptionuniversite2022s.index')
            ->with('success', 'Inscriptionuniversite2022 created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Inscriptionuniversite2022 = Inscriptionuniversite2022::find($id);

        return view('Inscriptionuniversite2022.show', compact('Inscriptionuniversite2022'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Inscriptionuniversite2022 = Inscriptionuniversite2022::find($id);

        return view('Inscriptionuniversite2022.edit', compact('Inscriptionuniversite2022'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inscriptionuniversite2022 $Inscriptionuniversite2022
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscriptionuniversite2022 $Inscriptionuniversite2022)
    {
        request()->validate(Inscriptionuniversite2022::$rules);

        $Inscriptionuniversite2022->update($request->all());

        return redirect()->route('Inscriptionuniversite2022s.index')
            ->with('success', 'Inscriptionuniversite2022 updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $Inscriptionuniversite2022 = Inscriptionuniversite2022::find($id)->delete();

        return redirect()->route('Inscriptionuniversite2022s.index')
            ->with('success', 'Inscriptionuniversite2022 deleted successfully');
    }
}
